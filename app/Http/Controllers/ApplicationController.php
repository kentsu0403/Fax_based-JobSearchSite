<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Application;
use App\Models\PreferredDate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  // ここを追加
use Carbon\Carbon;  // Carbon も使っているのでこれも追加

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect()->route('register');
            }
            return $next($request);
        });
    }

    public function create($jobId)
    {
        return view('application.create', compact('jobId'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'preferred_date_1' => 'required|date|after_or_equal:today',
            'preferred_date_2' => 'nullable|date',
            'preferred_date_3' => 'nullable|date',
        ]);
    
        $validator->after(function ($validator) use ($request) {
            $dates = [
                $request->preferred_date_1,
                $request->preferred_date_2,
                $request->preferred_date_3
            ];
    
            // 入力された日付をフィルタリングして、重複チェックを行う
            $filteredDates = array_filter($dates); // null値を除去
            if (count($filteredDates) !== count(array_unique($filteredDates))) {
                $validator->errors()->add('preferred_dates', '希望日程が重複しています。異なる日付を選んでください。');
            }
        });
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // 応募情報をapplicationsテーブルに保存
        $applicationId = DB::table('applications')->insertGetId([
            'project_id' => $request->jobId,  // 応募する案件のIDを取得
            'applicant_name' => 'Relic 太郎',  // 実際にはログイン中のユーザーの情報を使用
            'applicant_email' => 'taro.relic@example.com', // 実際にはログイン中のユーザーの情報を使用
            'applicant_phone' => '080-8765-4321',  // 実際にはログイン中のユーザーの情報を使用
            'applicant_birthdate' => '1995-05-05',  // 実際にはログイン中のユーザーの情報を使用
            'notes' => $request->notes,
            'application_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
        // 応募完了後のリダイレクト
        return redirect()->route('application.index'); // 応募一覧ページにリダイレクト
        //return redirect()->route('application.success'); // 適切なルートに変更してください
    }
    

    
    // 応募一覧ページの表示メソッド
    public function index()
    {
        $applications = Application::with('project')
            ->where('applicant_email', Auth::user()->email)
            ->get();
    
        return view('application.index', compact('applications'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        // バリデーション成功後の処理をここに追加します
        // 例えば、データベースに応募データを保存するなどの処理です

        // 応募完了メッセージやリダイレクトを設定
        return redirect()->route('application.success'); // ここは適切なルートに変更してください
    }
}

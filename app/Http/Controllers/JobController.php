<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Projectモデルをインポート

class JobController extends Controller
{
    public function index()
    {
        // 全ての案件をデータベースから取得
        $jobs = Project::all();

        // 取得したデータをビューに渡す
        return view('welcome', compact('jobs'));
    }
    
    public function show($id)
    {
        // Projectモデルを使用してデータベースから該当する案件を取得
        $jobDetail = Project::find($id);

        // 該当するIDがない場合は404エラーを返す
        if (!$jobDetail) {
            abort(404); 
        }

        // Bladeテンプレートに$jobDetailと$idを渡す
        return view('jobs.show', compact('jobDetail', 'id'));
    }
}

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
        $jobDetail = Project::with('companies')->find($id);
    
        if (!$jobDetail) {
            abort(404); 
        }
    
        return view('jobs.show', compact('jobDetail', 'id'));
    }
    
}

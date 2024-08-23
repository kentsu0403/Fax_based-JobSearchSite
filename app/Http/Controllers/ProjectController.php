<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB; // DBファサードのインポート

class ProjectController extends Controller
{
    public function show($id)
    {
        // 案件情報と応募者情報を取得
        $project = Project::with('companies', 'applications')->findOrFail($id);
    
        // ビューにデータを渡す
        return view('admin.project-show', [
            'project' => $project,
            'companies' => $project->companies,
            'applications' => $project->applications,
        ]);
    }

    public function create()
    {
        // 会社のリストを取得
        $companies = Company::all();

        // ビューにデータを渡す
        return view('admin.add-job', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_details' => 'required|string',
            'company_id' => 'required|exists:companies,company_id',
        ]);

        // 案件情報を保存
        $project = Project::create([
            'project_name' => $request->input('project_name'),
            'project_details' => $request->input('project_details'),
        ]);

        // company_project テーブルに関連データを保存
        DB::table('company_project')->insert([
            'company_id' => $request->input('company_id'),
            'project_id' => $project->project_id,
        ]);

        // 保存後のリダイレクト
        return redirect()->route('admin.confirm-company')->with('success', '案件が追加されました');
    }
}

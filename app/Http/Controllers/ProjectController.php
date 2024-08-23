<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
}


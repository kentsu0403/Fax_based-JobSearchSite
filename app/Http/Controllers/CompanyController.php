<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        //dd($companies); // デバッグ用
        return view('admin.confirm-company', ['companies' => $companies]);
    }
    
    public function show($id)
    {
        // IDに基づいて会社情報を取得
        $company = Company::findOrFail($id);
        return view('admin.show-company', ['company' => $company]);
    }

    public function showProjects($id)
    {
        $company = Company::with('projects')->findOrFail($id);
        return view('admin.company-projects', ['company' => $company, 'projects' => $company->projects]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:15',
        ]);

        // 会社情報を保存
        Company::create([
            'company_name' => $request->input('company_name'),
            'contact_person' => $request->input('contact_person'),
            'contact_phone' => $request->input('contact_phone'),
        ]);

        // 保存後のリダイレクト
        return redirect()->route('admin.confirm-company')->with('success', '会社情報が追加されました');
    }
}

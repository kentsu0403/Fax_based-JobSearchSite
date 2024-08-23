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
    
    
}

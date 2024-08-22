<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function show($id)
    {
        // 現在はデータベースからではなく、サンプルデータを使うと仮定します。
        $jobs = [
            1 => 'サンプル案件 1 の詳細情報',
            2 => 'サンプル案件 2 の詳細情報',
            3 => 'サンプル案件 3 の詳細情報',
        ];

        // IDに対応する案件詳細が存在する場合、その詳細を表示します
        if (array_key_exists($id, $jobs)) {
            $jobDetail = $jobs[$id];
        } else {
            abort(404); // 該当するIDがない場合は404エラー
        }

        return view('jobs.show', compact('jobDetail'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function show($id)
    {
        // サンプルの求人データ
        $jobs = [
            1 => [
                'title' => 'ウェブサイト運営アシスタント',
                'company' => 'アナログ株式会社',
                'location' => '東京都千代田区',
                'salary' => '月給20万円～25万円',
                'description' => '当社ウェブサイトの運営をお手伝いいただきます。ウェブページの更新作業や、お客様からの問い合わせ対応などを担当します。ITスキルは不要です。',
                'requirements' => 'パソコンの基本操作ができる方（メール送信、インターネット検索）。年齢不問。',
            ],
            2 => [
                'title' => 'データ入力スタッフ',
                'company' => 'ペーパーワークス株式会社',
                'location' => '大阪府大阪市',
                'salary' => '時給1,000円～1,200円',
                'description' => '紙の書類からデータを入力する業務を担当します。専門知識は不要です。',
                'requirements' => 'タイピングができる方。基本的なパソコン操作ができる方。',
            ],
            3 => [
                'title' => 'オフィスサポートスタッフ',
                'company' => 'トラディショナル株式会社',
                'location' => '福岡県福岡市',
                'salary' => '月給18万円～22万円',
                'description' => 'オフィス内での簡単なサポート業務を担当します。書類整理や来客対応など、ITスキルは不要です。',
                'requirements' => '丁寧な対応ができる方。基本的な電話対応ができる方。',
            ],
        ];

        // IDに対応する求人データを取得
        if (array_key_exists($id, $jobs)) {
            $jobDetail = $jobs[$id];
        } else {
            abort(404); // 該当するIDがない場合は404エラー
        }

        return view('jobs.show', compact('jobDetail'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Request data:', $request->all()); // リクエストデータをログに出力
        
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'user_age' => 'required|integer',
            'user_location' => 'required|string|max:255',
            'vote' => 'required|boolean',
            'gender' => 'required|in:male,female',
        ]);

        Vote::create([
            'news_id' => $request->news_id,
            'user_age' => $request->user_age,
            'user_location' => $request->user_location,
            'vote' => $request->vote,
            'gender' => $request->gender, // 性別を保存
        ]);

        // 結果ページへリダイレクト
        return redirect()->route('news.results', ['news_id' => $request->news_id])
            ->with('success', '投票が成功しました。');
    }

    // 投票結果を集計して表示するメソッド
    public function index($news_id)
    {
        // 特定のニュースに関連する投票を取得
        $votes = Vote::where('news_id', $news_id)->get();

        // 全体の肯定と否定の集計
        $totalStatistics = [
            '肯定' => $votes->where('vote', 1)->count(),
            '否定' => $votes->where('vote', 0)->count(),
        ];

        // 地域別の集計
        $locationStatistics = [];
        foreach ($votes as $vote) {
            $location = $vote->user_location;
            if (!isset($locationStatistics[$location])) {
                $locationStatistics[$location] = ['肯定' => 0, '否定' => 0];
            }
            $locationStatistics[$location][$vote->vote ? '肯定' : '否定']++;
        }

        // 年齢別の集計
        $ageStatistics = [];
        foreach ($votes as $vote) {
            $age = $vote->user_age;
            if (!isset($ageStatistics[$age])) {
                $ageStatistics[$age] = ['肯定' => 0, '否定' => 0];
            }
            $ageStatistics[$age][$vote->vote ? '肯定' : '否定']++;
        }

        // 性別別の集計
        $genderStatistics = [
            'male' => ['肯定' => 0, '否定' => 0],
            'female' => ['肯定' => 0, '否定' => 0],
        ];
        
        foreach ($votes as $vote) {
            $gender = $vote->gender;
            $genderStatistics[$gender][$vote->vote ? '肯定' : '否定']++;
        }

        // 地域・年齢別の集計
        $locationAgeStatistics = [];
        foreach ($votes as $vote) {
            $location = $vote->user_location;
            $age = $vote->user_age;

            if (!isset($locationAgeStatistics[$location][$age])) {
                $locationAgeStatistics[$location][$age] = ['肯定' => 0, '否定' => 0];
            }
            $locationAgeStatistics[$location][$age][$vote->vote ? '肯定' : '否定']++;
        }

        // 性別・年齢別の統計
        $genderAgeStatistics = [];
        foreach ($votes as $vote) {
            $age = $vote->user_age;
            $gender = $vote->gender;

            if (!isset($genderAgeStatistics[$age])) {
                $genderAgeStatistics[$age] = ['male' => ['肯定' => 0, '否定' => 0], 'female' => ['肯定' => 0, '否定' => 0]];
            }
            $genderAgeStatistics[$age][$gender][$vote->vote ? '肯定' : '否定']++;
        }

        return view('news.results', compact(
            'totalStatistics',
            'locationStatistics',
            'ageStatistics',
            'genderStatistics',
            'locationAgeStatistics',
            'genderAgeStatistics' ,
            'news_id' // ここでビューに news_id を渡す
        ));
    }

    public function chat(Request $request, $news_id)
    {
        // チャットメッセージの処理などをここで実行
        $messages = [
            ['user' => 'Alice', 'message' => 'こんにちは！'],
            ['user' => 'Bob', 'message' => 'どうも！'],
        ];

        // JSONとしてレスポンスを返す
        return response()->json($messages);
    }




}

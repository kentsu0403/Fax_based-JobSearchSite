<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    // チャットメッセージの取得
    public function index($news_id)
    {
        $chats = Chat::where('news_id', $news_id)->orderBy('created_at', 'asc')->get();
        return response()->json($chats);
    }

    // チャットメッセージの保存
    public function store(Request $request, $news_id)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string',
            'location' => 'required|string',
            'gender' => 'required|string',
            'age_category' => 'required|string',
        ]);

        Chat::create([
            'news_id' => $news_id,
            'username' => $validated['username'],
            'message' => $validated['message'],
            'location' => $validated['location'],
            'gender' => $validated['gender'],
            'age_category' => $validated['age_category'],
        ]);

        return response()->json(['message' => 'Chat saved successfully']);
    }
}

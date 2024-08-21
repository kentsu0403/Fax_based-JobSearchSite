<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    // 登録フォームを表示するメソッド
    public function create(): View
    {
        return view('auth.register');
    }

    // ユーザー登録を処理するメソッド
    public function store(Request $request): RedirectResponse
    {
        // バリデーションルール
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],  // 任意フィールド
            'date_of_birth' => ['nullable', 'date'],  // 任意フィールド
        ]);

        // ユーザー作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,  // 任意フィールド
            'date_of_birth' => $request->date_of_birth,  // 任意フィールド
        ]);

        // イベント発火とログイン処理
        event(new Registered($user));
        Auth::login($user);

        // 成功メッセージのフラッシュ
        session()->flash('success', '会員登録に成功しました。');

        // リダイレクト
        return redirect(RouteServiceProvider::HOME);
    }
}

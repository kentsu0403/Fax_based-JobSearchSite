<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募した案件一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 10px 20px;
            color: white;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .buttons {
            display: flex;
        }
        .header .buttons a {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .header .buttons a:hover {
            background-color: #003f7f;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 5px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        li:last-child {
            border-bottom: none;
        }
        .user-name {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .user-name:hover {
            background-color: #003f7f;
        }
    </style>
</head>
<body> 
<div class="header">
    <h1><a href="{{ url('/') }}" style="color: white; text-decoration: none;">紙とネットを繋ぐ求人</a></h1>

        <div class="buttons">
            <!-- 非ログイン時の表示 -->
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary">会員登録</a>
                <a href="{{ route('login') }}" class="btn btn-primary">ログイン</a>
            @endguest

            <!-- ログイン時の表示 -->
            @auth
                <!-- 名前をボタン風に表示してクリック可能に -->
                <a href="#" class="user-name">{{ Auth::user()->name }}</a>

                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="btn btn-primary">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </div>
    </div>
    <div class="container">
        <h1>応募した案件一覧</h1>

        @if($applications->isEmpty())
            <p>まだ応募していません。</p>
        @else
            <ul>
                @foreach($applications as $application)
                    <li>
                        <h2>{{ $application->project->project_name }}</h2>
                        <p>{{ $application->notes }}</p>
                        <p>{{ $application->application_date }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>

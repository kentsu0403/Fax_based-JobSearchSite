<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>紙とネットを繋ぐ求人 - 就活サイト</title>
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
            text-align: center;
            padding: 20px;
            margin: 50px auto;
            max-width: 800px;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        .search-box-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }
        .search-box {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .search-box input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        .search-box button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .search-box button:hover {
            background-color: #0056b3;
        }
        .job-list-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .job-card {
            background-color: #eee;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: left;
        }
        .job-card:hover {
            background-color: #ddd;
        }
        .job-card h3 {
            margin: 0;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>紙とネットを繋ぐ求人</h1>
        <div class="buttons">
            <a href="#">会員登録</a>
            <a href="#">ログイン</a>
        </div>
    </div>

    <div class="container">
        <p>ネットでの求人を出せておらず、求人が集まらないという課題を解決する！</p>

        <div class="search-box-container">
            <div class="search-box">
                <input type="text" placeholder="求人を検索">
                <button>検索</button>
            </div>
        </div>

        <div class="job-list-container">
            <div class="job-card">
                <h3>サンプル案件 1</h3>
            </div>
            <div class="job-card">
                <h3>サンプル案件 2</h3>
            </div>
            <div class="job-card">
                <h3>サンプル案件 3</h3>
            </div>
        </div>
    </div>
</body>
</html>
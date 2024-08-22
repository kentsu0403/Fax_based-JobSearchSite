<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jobDetail['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
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
        .job-info {
            margin-bottom: 30px;
        }
        .job-info p {
            font-size: 18px;
            margin: 5px 0;
        }
        .apply-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .apply-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $jobDetail['title'] }}</h1>
        
        <div class="job-info">
            <p><strong>求人タイトル:</strong> {{ $jobDetail['title'] }}</p>
            <p><strong>会社名:</strong> {{ $jobDetail['company'] }}</p>
            <p><strong>勤務地:</strong> {{ $jobDetail['location'] }}</p>
            <p><strong>給与:</strong> {{ $jobDetail['salary'] }}</p>
            <p><strong>仕事内容:</strong> {{ $jobDetail['description'] }}</p>
            <p><strong>応募資格:</strong> {{ $jobDetail['requirements'] }}</p>
        </div>

        <a href="#" class="apply-button">応募する</a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jobDetail->project_name }}</title>
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
        <h1>{{ $jobDetail->project_name }}</h1>
        
        <div class="job-info">
            <!-- 会社名の取得 -->
            @if($jobDetail->companies->isNotEmpty())
                <p><strong>会社名:</strong> {{ $jobDetail->companies->first()->company_name }}</p>
            @else
                <p><strong>会社名:</strong> 会社情報が見つかりません</p>
            @endif
            
            <p><strong>案件名:</strong> {{ $jobDetail->project_name }}</p>
            <p><strong>案件の詳細情報:</strong> {{ $jobDetail->project_details }}</p>
        </div>

        <a href="{{ route('applications.create', ['jobId' => $id]) }}" class="apply-button">応募する</a>
    </div>
</body>
</html>

<!-- resources/views/admin/application-show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募情報 - {{ $application->applicant_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>応募情報</h1>
        <h2>{{ $application->applicant_name }}</h2>
        <p><strong>メールアドレス:</strong> {{ $application->applicant_email }}</p>
        <p><strong>電話番号:</strong> {{ $application->applicant_phone }}</p>
        <p><strong>生年月日:</strong> {{ $application->applicant_birthdate }}</p>

        <!-- 希望日程の表示 -->
        <h3>希望日程:</h3>
        <ul>
            <li>第1希望日程: {{ $preferred_dates->preferred_date_1 }}</li>
            <li>第2希望日程: {{ $preferred_dates->preferred_date_2 }}</li>
            <li>第3希望日程: {{ $preferred_dates->preferred_date_3 }}</li>
        </ul>

        <h3>備考欄:</h3>
        <p>{{ $application->notes }}</p>
    </div>
</body>
</html>

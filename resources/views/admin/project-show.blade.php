<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->project_name }} - 案件管理</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .company-list, .applicant-list {
            list-style-type: none;
            padding: 0;
        }
        .company-list li, .applicant-list li {
            background-color: #e9e9e9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .company-list li {
            font-weight: bold;
        }
        .applicant-list li {
            display: flex;
            justify-content: space-between;
        }
        .applicant-list li span {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>案件管理ページ</h1>

        <!-- 案件情報ブロック -->
        <div class="card">
            <h2>案件情報</h2>
            <h3>会社名:</h3>
            <ul class="company-list">
                @foreach($companies as $company)
                    <li>{{ $company->company_name }}</li>
                @endforeach
            </ul>
            <h3>案件名: {{ $project->project_name }}</h3>
            <p>案件詳細: {{ $project->project_details }}</p>
        </div>

        <!-- 応募者一覧ブロック -->
        <div class="card">
            <h2>応募者一覧</h2>
            <ul class="applicant-list">
                @foreach($applications as $application)
                    <li>
                        <a href="{{ route('admin.application.show', ['id' => $application->application_id]) }}">
                            <span>{{ $application->applicant_name }}</span>
                        </a>
                        <span>{{ $application->applicant_email }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>

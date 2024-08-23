<!-- resources/views/admin/project-show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->project_name }} - 案件管理</title>
</head>
<body>
    <h1>案件管理ページ</h1>
    <h2>会社名:</h2>
    <ul>
        @foreach($companies as $company)
            <li>{{ $company->company_name }}</li>
        @endforeach
    </ul>
    <h3>案件名: {{ $project->project_name }}</h3>
    <p>案件詳細: {{ $project->project_details }}</p>
</body>
</html>

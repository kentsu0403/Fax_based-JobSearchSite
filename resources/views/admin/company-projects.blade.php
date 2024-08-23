<!-- resources/views/admin/company-projects.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->company_name }} の案件一覧</title>
</head>
<body>
    <h1>{{ $company->company_name }} の案件一覧</h1>
    <ul>
        @foreach($projects as $project)
            <li>
                <a href="{{ route('admin.project.show', ['id' => $project->project_id]) }}">
                    {{ $project->project_name }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>

<!-- resources/views/admin/show-company.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }} - 会社詳細</title>
</head>
<body>
    <h1>{{ $company->name }}</h1>
    <p>所在地: {{ $company->location }}</p>
    <p>その他の情報...</p>
</body>
</html>

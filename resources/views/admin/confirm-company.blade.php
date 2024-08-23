<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会社検索結果</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
        }
        h1 {
            font-size: 28px;
            margin: 0;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .table-container {
            margin-top: 80px;
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .details-link {
            color: #007bff;
            text-decoration: none;
        }
        .details-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>会社検索結果</h1>
    <div class="table-container">
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>会社名</th>
            <th>連絡担当者</th>
            <th>連絡先電話番号</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->company_id }}</td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->contact_person }}</td>
                <td>{{ $company->contact_phone }}</td>
                <td><a href="{{ route('admin.company.show', ['id' => $company->company_id]) }}" class="details-link">詳細を見る</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</body>
</html>

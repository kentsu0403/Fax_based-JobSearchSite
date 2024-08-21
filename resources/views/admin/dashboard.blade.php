<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者用トップページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            width: 100%;
        }
        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 32px;
        }
        .button-container {
            margin-top: 100px; /* Adjust this to position the buttons */
        }
        .button {
            display: block;
            width: 250px;
            padding: 15px;
            margin: 10px auto;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">管理者用トップページ</div>
        <div class="button-container">
            <a href="/admin/companies/create" class="button">会社の追加</a>
            <a href="/admin/projects/create" class="button">案件追加</a>
        </div>
    </div>
</body>
</html>

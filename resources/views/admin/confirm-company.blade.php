<!-- resources/views/admin/confirm-company.blade.php -->
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
            min-height: 100vh; /* Ensure the body takes full viewport height */
        }
        h1 {
            font-size: 28px;
            margin: 0;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* Adjust height to center the buttons */
            margin-top: 60px; /* Adjust top margin to account for title */
        }
        .button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>会社検索結果</h1>
    <div class="button-container">
        <a href="#" class="button">ダミーデータセット 1</a>
        <a href="#" class="button">ダミーデータセット 2</a>
        <a href="#" class="button">ダミーデータセット 3</a>
        <a href="#" class="button">ダミーデータセット 4</a>
        <a href="#" class="button">ダミーデータセット 5</a>
    </div>
</body>
</html>

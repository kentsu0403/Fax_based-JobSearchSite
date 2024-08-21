<!-- resources/views/admin/add-company.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会社の追加</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
            background-color: #f4f4f4;
            position: relative;
            justify-content: center; /* 縦方向の中央揃え */
        }
        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 36px; /* 大きなフォントサイズ */
            font-weight: bold;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 600px; /* 最大幅を設定 */
        }
        .input-group {
            margin: 10px 0;
            width: 100%;
        }
        .input-label {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .complete-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: auto;
            padding: 10px 20px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .complete-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="header">会社の追加</div>
    <div class="form-container">
        <div class="input-group">
            <label for="company_name" class="input-label">会社名</label>
            <input type="text" id="company_name" class="input-field" placeholder="会社名を入力">
        </div>
        <div class="input-group">
            <label for="contact_person" class="input-label">担当者</label>
            <input type="text" id="contact_person" class="input-field" placeholder="担当者名を入力">
        </div>
        <div class="input-group">
            <label for="phone_number" class="input-label">電話番号</label>
            <input type="text" id="phone_number" class="input-field" placeholder="電話番号を入力">
        </div>
    </div>
    <a href="/admin/completed" class="complete-button">完了</a>
</body>
</html>

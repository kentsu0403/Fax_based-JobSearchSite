<!-- resources/views/admin/add-job.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>案件の追加</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            box-sizing: border-box;
            position: relative;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: left;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* Adjust height to center the form */
            padding-bottom: 60px; /* Space for the button */
        }
        form {
            display: inline-block;
            text-align: left;
            width: 400px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 16px;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        input[type="text"]#description {
            height: 100px; /* Increase the height of the "公開情報の記載" field */
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>案件の追加</h1>
    <div class="form-container">
        <form action="#" method="post">
            <label for="company_name">会社名:</label>
            <select id="company_name" name="company_name" required>
                <option value="" disabled selected>会社を選択してください</option>
                <option value="Company A">Company A</option>
                <option value="Company B">Company B</option>
                <option value="Company C">Company C</option>
            </select>

            <label for="project_name">案件名:</label>
            <input type="text" id="project_name" name="project_name" required>

            <label for="description">公開情報の記載:</label>
            <input type="text" id="description" name="description" required>

            <input type="submit" value="案件を公開する">
        </form>
    </div>
</body>
</html>

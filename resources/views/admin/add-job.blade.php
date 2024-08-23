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
            height: calc(100vh - 60px);
            padding-bottom: 60px;
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
        select, input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        textarea {
            height: 100px;
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
        <form action="{{ route('admin.project.store') }}" method="POST">
            @csrf
            <label for="company_id">会社名:</label>
            <select id="company_id" name="company_id" required>
                <option value="" disabled selected>会社を選択してください</option>
                <!-- 会社リストを動的に表示する -->
                @foreach($companies as $company)
                    <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

            <label for="project_name">案件名:</label>
            <input type="text" id="project_name" name="project_name" required>

            <label for="project_details">公開情報の記載:</label>
            <textarea id="project_details" name="project_details" required></textarea>

            <input type="submit" value="案件を公開する">
        </form>
    </div>
</body>
</html>

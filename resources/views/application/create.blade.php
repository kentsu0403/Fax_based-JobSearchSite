<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募情報入力</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 30px;
        }
        .info p {
            font-size: 18px;
            margin: 5px 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .apply-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .apply-button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const preferredDate1 = document.getElementById('preferred_date_1');
            const preferredDate2 = document.getElementById('preferred_date_2');
            const preferredDate3 = document.getElementById('preferred_date_3');

            // 第二希望と第三希望を無効化
            preferredDate2.disabled = true;
            preferredDate3.disabled = true;

            preferredDate1.addEventListener('change', function () {
                if (preferredDate1.value) {
                    preferredDate2.disabled = false;
                    preferredDate2.min = preferredDate1.value;
                } else {
                    preferredDate2.value = '';
                    preferredDate2.disabled = true;
                    preferredDate3.value = '';
                    preferredDate3.disabled = true;
                }
            });

            preferredDate2.addEventListener('change', function () {
                if (preferredDate2.value) {
                    preferredDate3.disabled = false;
                    preferredDate3.min = preferredDate2.value;
                } else {
                    preferredDate3.value = '';
                    preferredDate3.disabled = true;
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>応募情報入力</h1>

        <div class="info">
            <p><strong>メールアドレス:</strong> {{ Auth::user()->email }}</p>
            <p><strong>名前:</strong> {{ Auth::user()->name }}</p>
            <p><strong>電話番号:</strong> {{ Auth::user()->phone }}</p>
            <p><strong>生年月日:</strong> {{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('Y年m月d日') }}</p>
        </div>

        <form action="{{ route('applications.store') }}" method="POST">
            @csrf

            <!-- jobIdをhiddenフィールドとして追加 -->
            <input type="hidden" name="jobId" value="{{ $jobId }}">

            <!-- 希望日程 -->
            <div class="form-group">
                <label for="preferred_date_1">第1希望日程:</label>
                <input type="date" id="preferred_date_1" name="preferred_date_1" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="preferred_date_2">第2希望日程:</label>
                <input type="date" id="preferred_date_2" name="preferred_date_2">
            </div>

            <div class="form-group">
                <label for="preferred_date_3">第3希望日程:</label>
                <input type="date" id="preferred_date_3" name="preferred_date_3">
            </div>

            <!-- 備考欄 -->
            <div class="form-group">
                <label for="remarks">備考欄:</label>
                <textarea id="remarks" name="remarks" rows="5" placeholder="自由にご記入ください"></textarea>
            </div>

            <!-- 応募ボタン -->
            <div class="form-group">
                <button type="submit" class="apply-button">応募する</button>
            </div>
        </form>
    </div>
</body>
</html>

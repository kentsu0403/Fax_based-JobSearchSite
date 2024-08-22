<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>応募した案件一覧</title>
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
        p {
            font-size: 18px;
            margin: 5px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>応募した案件一覧</h1>

        @if($applications->isEmpty())
            <p>まだ応募していません。</p>
        @else
            <ul>
                @foreach($applications as $application)
                    <li>
                        <h2>{{ $application->project->project_name }}</h2>
                        <p>{{ $application->notes }}</p>
                        <p>{{ $application->application_date }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>

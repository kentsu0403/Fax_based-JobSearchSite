<!DOCTYPE html>
<html>
<head>
    <title>ニュースサイト</title>
</head>
<body>
    <header>
        <h1>ニュースサイト</h1>
    </header>

    
    <img src="{{ asset('images/takinoko.jpg') }}" alt="News Image" style="max-width: 100%; height: auto;">
    <img src="{{ asset('images/takenoko.jpg') }}" alt="News Image" style="max-width: 21%; height: auto;">

    <div class="content">
        @yield('content')  <!-- 各ビューの内容がここに挿入される -->
    </div>

    <footer>
        <p>&copy; 2024 ニュースサイト</p>
    </footer>
</body>
</html>

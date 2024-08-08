<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>商品管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        @include('side')
        <div class="content">
            <div class="header">
                <div class="header-buttons">
                    <a href="{{ url('/register') }}">アカウント登録画面</a>
                    <a href="{{ url('/login') }}">ログイン画面</a>
                    <a href="{{ url('/logout') }}">ログアウト</a>
                </div>
            </div>
            <div class="main-content">
                <h2>ホーム画面へようこそ(team004)</h2>
            </div>
        </div>
    </div>
</body>
</html>

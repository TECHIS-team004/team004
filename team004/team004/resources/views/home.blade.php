<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理システム</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
            height: 100vh;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .header {
            width: 100%;
            background-color: #ccc;
            padding: 10px;
            text-align: right;
        }
        .header button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>商品管理システム</h2>
        <ul>
            <li><a href="{{ url('item_list') }}">商品一覧</a></li>
            <li><a href="{{ url('login') }}">ログイン画面</a></li>
            <li><a href="{{ url('register_account') }}">アカウント登録画面</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</button>
        </div>
        <h1>ホーム画面へようこそ(team004)</h1>
    </div>
</body>
</html>

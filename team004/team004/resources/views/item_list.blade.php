<!DOCTYPE html>
<html>
<head>
    <title>商品管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 10px;
            word-wrap: break-word;
            word-break: break-all;
        }
        .table th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <!-- サイドバー -->
    <div class="sidebar">
        <h1>商品管理システム</h1>
        <ul>
            <li><a href="{{ url('/item_list') }}">商品一覧</a></li>
        </ul>
    </div>

        <div class="content">
        <div class="header">
            <div class="header-buttons">
                @auth
                <a href="{{ url('/register_account') }}">アカウント登録画面</a>
                <a href="{{ url('/login') }}">ログイン画面</a>
                <a href="{{ url('/logout') }}">ログアウト</a>
                @endauth
            </div>
        </div>
        <div class="main-content">
            <h1>商品一覧</h1>

            <!-- 検索フォーム -->
            <form action="{{ route('items.search') }}" method="GET">
                <input type="text" name="query" placeholder="商品を検索">
                <button type="submit">検索</button>
            </form>

            <!-- 管理者ユーザーの場合、商品登録画面へのリンクを表示 -->
            @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ url('item_register') }}" class="btn btn-primary">商品登録</a>
            @endif

            <!-- 商品一覧表示 -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>タイプ</th>
                        <th>詳細</th>
                        @if(auth()->check() && auth()->user()->is_admin)
                            <th>編集</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->detail }}</td>
                            @if(auth()->check() && auth()->user()->is_admin)
                                <td><a href="{{ route('items.edit', $item->id) }}">編集</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</body>
</html>

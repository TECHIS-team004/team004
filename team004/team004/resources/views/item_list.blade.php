<!DOCTYPE html>
<html>
<head>
    <title>商品管理システム - 商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* テーブルスタイル */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            position: relative; /* 編集ボタンの絶対位置指定のために追加 */
        }

        th {
            background-color: #f9f9f9;
            border-bottom: 2px solid #ccc; /* ヘッダーの下の線 */
        }

        /* 奇数行と偶数行で色を分ける */
        tbody tr:nth-child(odd) {
            background-color: #ecf3f7; /* 偶数行の背景色 */
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff; /* 奇数行の背景色 */
        }

        /* 商品登録ボタンを右寄せに配置 */
        .button-container {
            display: flex;
            justify-content: flex-end;
            margin: 10px 0;
        }

        /* 商品登録ボタンスタイル */
        .button {
            background-color: #2720ae;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
    border: 2px solid #0056b3; /* 外側の枠線 */
            cursor: pointer;
        }

        .button:hover {
            background-color: #2f1048;
        }

        /* 編集ボタンのスタイル */
        .edit-button {
            background-color: #2720ae;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s, color 0.3s;
            position: absolute;
            right: 10px; /* 商品詳細の右側に表示 */
            top: 50%;
            transform: translateY(-50%);
    border: 2px solid #2f1048; /* 外側の枠線 */
            cursor: pointer;
        }

        /* 編集ボタンのホバー時のスタイル */
        .edit-button:hover {
            background-color: #2f1048; /* ホバー時の背景色 */
            color: #f1f1f1; /* ホバー時の文字色 */
        }

        /* 検索フォームと絞り込み検索フォームの統一スタイル */
        .form-container {
            display: flex;
            gap: 10px; /* フォーム間のスペース */
            margin-bottom: 20px;
            border-color: #1f0838; /* ホバー時の枠線 */
        }

        .form-container form {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-container input[type="text"],
        .form-container input[type="date"] {
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            flex-grow: 1;
        }

        .form-container button {
            padding: 5px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('side')

        <div class="content">
        <div class="header">
            <div class="header-buttons">
                    <!-- ログアウトボタンのみ表示 -->
                <a href="{{ url('/logout') }}">ログアウト</a>
                </div>
            </div>
        <div class="main-content">
            <h1>商品一覧</h1>

                <!-- フォームコンテナ -->
                <div class="form-container">
            <!-- 検索フォーム -->
            <form action="{{ route('items.search') }}" method="GET">
                <input type="text" name="query" placeholder="商品を検索" value="{{ request('query') }}">
                <button type="submit">検索</button>
            </form>

                <!-- 絞り込み検索フォーム -->
                    <form action="{{ route('items.search') }}" method="GET">
                        <label for="date" style="margin-right: 10px;">登録・編集日</label>
                    <input type="date" name="date" id="date" value="{{ request('date') }}">
                    <button type="submit">絞り込み</button>
                </form>
                </div>

            <!-- 管理者ユーザーの場合、商品登録画面へのリンクを表示 -->
            @if(auth()->check() && auth()->user()->is_admin)
                    <div class="button-container">
                    <a href="{{ url('item_register') }}" class="button">商品登録</a>
                    </div>
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

                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                                <td>
                                    {{ $item->detail }}
                            @if(auth()->check() && auth()->user()->is_admin)
                                        <!-- 編集ボタンを商品詳細の右に表示 -->
                                        <a href="{{ route('items.edit', $item->id) }}" class="edit-button">編集</a>
                            @endif
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $items->links() }}
            </div>
        </div>
    </div>
</body>
</html>

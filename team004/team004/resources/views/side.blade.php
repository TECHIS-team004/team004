<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <h3>商品管理システム</h3>
            <ul>
                <li><a href="{{ url('/item_list') }}">商品一覧</a></li>
            </ul>
        </div>
        <div class="sidebar-logo">
            <img src="{{ asset('images/team004.png') }}" alt="ロゴ画像">
        </div>
    </div>
</body>
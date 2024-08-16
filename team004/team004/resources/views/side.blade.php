    <div class="sidebar">
        <div class="sidebar-content">
            <h4>商品管理システム</h4>
            <ul>
                <li><a href="{{ url('/item_list') }}">商品一覧</a></li>

            @if(auth()->check() && auth()->user()->is_admin)
                <li><a href="{{ url('/users') }}">ユーザー一覧</a></li>
            @endif
            </ul>
        </div>
        <div class="sidebar-logo">
            <img src="{{ asset('images/team004.png') }}" alt="ロゴ画像">
        </div>
    </div>

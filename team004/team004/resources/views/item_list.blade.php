@extends('layouts.app')

@section('content')
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
@endsection

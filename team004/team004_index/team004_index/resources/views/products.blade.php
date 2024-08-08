@extends('layouts.app')

@section('content')
<h1>商品登録画面</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>名前</th>
      <th>種別</th>
      <th>詳細</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $item)
    <tr>
      <td>{{ $item->item_id }}</td>
      <td>{{ $item->item_name }}</td>
      <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ route('products.create') }}">登録</a>
@endsection
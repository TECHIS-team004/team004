@extends('layouts.app')

@section('content')
      <h3>商品編集</h3>
      <form action="{{ url('item_edit/'. $item->id) }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">名前</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$item->name) }}" required>
        </div>
        <div class="form-group">
          <label for="type">種別</label>
          <input type="text" class="form-control" id="type" name="type" value="{{ old('type',$item->type) }}" required>
        </div>
        <div class="form-group">
          <label for="detail">詳細</label>
          <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail',$item->detail) }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">編集</button>
        <a href="{{ url('item_delete/'. $item->id) }}">削除</a>
      </form>
@endsection
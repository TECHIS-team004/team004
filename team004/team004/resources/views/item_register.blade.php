@extends('layouts.app')

@section('content')
      <h3>商品登録</h3>
      <form action="{{ url('item_register') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">名前</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="type">種別</label>
          <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
          <label for="detail">詳細</label>
          <input type="text" class="form-control" id="detail" name="detail" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">登録</button>
      </form>
@endsection
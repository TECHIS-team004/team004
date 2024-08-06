@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
    body {
        background-color: #FFFFF0; /* 薄い黄色 */
    }
    h1, h2 {
        font-family: 'Sacramento', cursive;
        font-size: 60px;
    }
    .card-body {
        background-color: #FFFFF0;
    }
</style> 

<h1>Welcome!!</h1>
<h2>Member registration</h2>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('お名前') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード確認') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('アカウント登録') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<svg viewBox="0 0 3387 1270">
    <path id="planePath" class="planePath" d="M-226 626c439,4 636,-213 934,-225 755,-31 602,769 1334,658 562,-86 668,-698 266,-908 -401,-210 -893,189 -632,630 260,441 747,121 1051,91 360,-36 889,179 889,179" />
    <g id="plane">
        <polygon class="fil1" points="-141,-10 199,0 -198,-72 -188,-61 -171,-57 -184,-57 " />
        <polygon class="fil2" points="199,0 -141,-10 -163,63 -123,9 " />
        <polygon class="fil3" points="-95,39 -113,32 -123,9 -163,63 -105,53 -108,45 -87,48 -90,45 -103,41 -94,41 " />
        <path class="fil4" d="M-87 48l-21 -3 3 8 19 -4 -1 -1zm-26 -16l18 7 -2 -1 32 -7 -29 1 11 -4 -24 -1 -16 -18 10 23zm10 9l13 4 -4 -4 -9 0z" />
        <polygon class="fil1" points="-83,28 -94,32 -65,31 -97,38 -86,49 -67,70 199,0 -123,9 -107,27 " />
    </g>
    <animateMotion xlink:href="#plane" dur="5s" repeatCount="indefinite" rotate="auto">
        <mpath xlink:href="#planePath" />
    </animateMotion> 
</svg>

<style>
    .planePath {
        stroke: #D9DADA;
        stroke-width: 0.5%;
        stroke-dasharray: 1% 2%;
        stroke-linecap: round;
        fill: none;
    }
    .fil1 {
        fill: #D9DADA;
    }
    .fil2 {
        fill: #C5C6C6;
    }
    .fil4 {
        fill: #9D9E9E;
    }
    .fil3 {
        fill: #AEAFB0;
    }
</style>
@endsection

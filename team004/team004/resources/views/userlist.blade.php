<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        @include('side')
        <div class="content">
            <h1>ユーザー一覧</h1>
            <table class="userlist">
                <tr>
                    <th>ユーザー名</th>
                    <th>email</th>
                    <th>ユーザー区分</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_admin ? '管理者' : '一般ユーザ'}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
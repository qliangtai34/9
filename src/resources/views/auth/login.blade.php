<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
<h2>ログイン</h2>

<form method="POST" action="/login">
    @csrf
    <label>メールアドレス</label>
    <input type="email" name="email" required>

    <label>パスワード</label>
    <input type="password" name="password" required>

    <button type="submit">ログイン</button>
</form>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
</body>
</html>

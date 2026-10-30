<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Вход</title>
</head>
<body>
    <form method="POST" action="/login">
        <p>Login</p>
        @if ($error)
            <div class="error">{{ $error }}</div>
        @endif

        <input type="hidden" name="_token" value="{{ $csrf }}">
        <label>Email</label>
        <input type="email" name="email" value="{{ $old }}" required autofocus>

        <label>Pass</label>
        <input type="password" name="password" required>

        <label><input type="checkbox" name="remember" value="1">Remember me</label>

        <button type="submit">Login</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - Rese</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" >
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="login-header">
                Login
            </div>
            <form action="{{ route('login') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">ログイン</button>
            </form>
        </div>
    </div>
</body>
</html>

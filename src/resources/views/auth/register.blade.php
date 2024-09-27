<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録 - 飲食店予約サービス</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="register-card">
            <div class="register-header">
                Registration
            </div>
            <form class="form" action="/register" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <svg class="input-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Username
                    </label>
                    <input id="name" type="text" name="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">
                        <svg class="input-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Email
                    </label>
                    <input id="email" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">
                        <svg class="input-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Password
                    </label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="register-button">登録</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
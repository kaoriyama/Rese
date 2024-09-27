<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese - 飲食店予約サービス</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <input type="checkbox" id="hamburger-menu" class="hamburger-menu__input">
            <label for="hamburger-menu" class="hamburger-menu__button">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <a class="header__logo" href="/">
                Rese
            </a>
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="/register" class="nav__link">Registration</a></li>
                    <li class="nav__item"><a href="/login" class="nav__link">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('search-bar')

    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>
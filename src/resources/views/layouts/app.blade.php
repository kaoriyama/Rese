<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese - 飲食店予約サービス</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <button class="nav-toggle" onclick="toggleMenu()">☰</button>
                <a class="header__logo" href="/">
                    Rese
                </a>
            </div>
        </div>
    </header>


    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        <p class="footer__text">Rese, inc.</p>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }

        function closeMenu() {
            var menu = document.getElementById('navMenu');
            menu.classList.remove('active');
        }
    </script>
    @yield('scripts')
</body>

</html>
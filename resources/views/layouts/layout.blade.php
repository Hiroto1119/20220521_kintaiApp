<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
        integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous" /> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Atte</title>
</head>
<body>
    {{-- <header>
        <h1 class="headline">
            <a>Atte</a>
        </h1>
    </header> --}}

    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="#" class="brand">Atte</a>
            <nav class="nav">
                <button class="nav__toggle" aria-expanded="false" type="button">menu</button>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#">ホーム</a></li>
                    <li class="nav__item"><a href="#">日付一覧</a></li>
                    <li class="nav__item"><a href="#">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Atte, inc.</p>
    </footer>

</body>
</html>

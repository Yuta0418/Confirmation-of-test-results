<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')｜Web検査結果確認</title>
    <meta name="description" content="" />

    <link rel="canonical" href="" />
    <!-- <link rel="icon" href="" sizes="96x96" type="image/png" />
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="192x192" href=""> -->

    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache,no-store" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Expires" content=“Thu, 01 Jan 1970 00:00:00 GMT” />

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/js/main.js') }}" charset="utf-8"></script>
</head>
<body class ="ai">
@yield('content')
@yield('footer')
</body>
</html>
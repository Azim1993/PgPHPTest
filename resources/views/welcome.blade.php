<!DOCTYPE HTML>
<html>
<head>
    <title>User Card - {{ $user->name ?? '' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">
<div id="wrapper">
    <section id="main">
        @if(session()->has('warning'))
            <h3>{{ session()->get('warning') }}</h3>
        @else
        <header>
            <span class="avatar"><img src="{{asset("images/users/". optional($user)->avater )}}" alt="" /></span>
            <h1>{{ optional($user)->name }}</h1>
            <p> {!! optional($user)->comments !!}</p>
        </header>
        @endif
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>

</div>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token //クロスサイトスクリプティング回避のためのトークンを宣言？ -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- タイトルの表示
     子のphpに＠section('title', 'hogehoge')があった場合それをページタイトルとし、
     なければ指定のもの、（それもなければ.env指定のモノ） -->
    @hasSection('title')
        <title>FW演習 - @yield('title')</title>
    @else
        <title>{{ config('app.name', 'フレームワーク演習 会員登録') }}</title>
    @endif

    <!-- Fonts //不要か？uiに付いてきたやつ？-->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https:fonts.bunny.net/css?family=Nunito">
    <!-- テキストの解答例のヤツ
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     -->

    <!-- Script //不要か？JavaScriptを使う時のやつっぽい？ -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <main class="">
            <div class="container py-4" style="max-width: 50%;">
                <!-- <h1 class="text-center p-5">@yield('title')</h1> -->
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
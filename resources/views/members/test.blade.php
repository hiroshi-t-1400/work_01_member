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
    <div class="p-4 d-flex justify-content-end">表示のテストしてるよ</div>
<div >
    <form action="{{ url('memberRegister') }}" method="post" class="" style="width:600px;">
        {{ csrf_field() }}
            <!-- <div> -->
                <input type="text" name="name" class="" placeholder="名前" value=""><br>
                <input type="tel" name="phone" class="" placeholder="電話番号" value=""><br>
                <input type="email" name="email" class="" placeholder="メールアドレス" value=""><br>
                <button type="submit" class="">
                    <i class="fa fa-plus"></i> 登録
                </button>
            <!-- </div> -->
                <!-- キャンセルして、何の処理もせずtopに戻る -->
                <a href="{{ route('top') }}">キャンセル</a>

        </form>
</div>
</body>
</html>
@extends('layouts.app')

@section('title', '会員登録')
@section('content')

    <h1>会員登録</h1>

    <!-- 登録内容のバリデーションエラー処理 -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 新規登録フォーム -->
    <div>
        <form action="{{ url('memberRegister') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
            <input type="text" name="name" class="" placeholder="名前" value="テックたろ">
            <input type="tel" name="phone" class="" placeholder="電話番号" value="08012340123">
            <input type="email" name="email" class="" placeholder="メールアドレス" value="techis@example.com">
            <button type="submit" class="">
                <i class="fa fa-plus"></i> 登録
            </button>

            <!-- キャンセルして、何の処理もせずtopに戻る -->
            <a href="{{ route('top') }}">キャンセル</a>
        </form>
    </div>

@endsection
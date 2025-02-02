@extends('layouts.app')

@section('title', '会員登録')
@section('content')

    <h1 class="text-center">会員登録</h1>

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
    <div class="mb-4 container">
        <form action="{{ url('memberRegister') }}" method="post" class="m-auto w-75">
        {{ csrf_field() }}
            <div class="row d-flex flex-column">
                <input type="text" name="name" class="my-2 py-2" placeholder="名前" value="">
                <input type="tel" name="phone" class="my-2 py-2" placeholder="電話番号" value="">
                <input type="email" name="email" class="my-2 py-2" placeholder="メールアドレス" value="">
                <button type="submit" class="w-75 m-auto my-2 py-2">
                    登録
                </button>
            
                <!-- キャンセルして、何の処理もせずtopに戻る -->
                <div class="my-2 py-2 text-center">
                    <a href="{{ route('top') }}">キャンセル</a>
                </div>
            </div>
                
        </form>
    </div>  

@endsection
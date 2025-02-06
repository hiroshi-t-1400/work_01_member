@extends('layouts.app')

@section('title', '会員編集')
@section('content')

    <h1 class="text-center">会員編集 会員ID{{ $members->id }}</h1>

    
    
    <div class="mb-4 w-75 container">
        
        <!-- バリデーションエラーが起きた時のメッセージ -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- 編集するためのフォーム -->
        <form action="{{ url('update', $members->id) }}" method="post">
        @method('PUT')
        {{ csrf_field() }}
            <div class="d-flex flex-column">
                <input type="text" name="name" class="my-2 py-2" placeholder="名前" value="{{ $members->name }}" >
                <input type="tel" name="phone" class="my-2 py-2" placeholder="電話番号" value="{{ $members->phone }}">
                <input type="email" name="email" class="my-2 py-2" placeholder="メールアドレス" value="{{ $members->email }}">
                <!-- <button type="submit" class="w-75 m-auto"> -->
                <button type="submit" class="w-75 my-2 py-2 mx-auto">
                    編集
                </button>
            </div>
        </form>

        <!-- 削除するためのフォーム -->
        <form action="{{ url('destroy', $members->id) }}" method="get">
        @method('DELETE')

            <!-- 削除用のフォームボタンのサイズを親ブロックの75%にするため、なぜかボタンの要素で指定できない -->
            <div class="w-75 m-auto">
                <!--  -->
                <button type="submit" class="my-2 py-2 w-100">
                        削除
                </button>
            </div>
        </form>
        <div class="my-2 py-2 text-center">
            <a href="{{ route('top') }}" class="text-center">キャンセル</a>
        </div>
    </div>

@endsection
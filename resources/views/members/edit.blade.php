@extends('layouts.app')

@section('title', '会員編集')
@section('content')

    <h1>会員編集 会員ID{{ $members->id }}</h1>

    <div>
        <!-- 編集するためのフォーム -->
        <form action="{{ url('update', $members->id) }}" method="post" class="form-horizontal">
        @method('PUT')
        {{ csrf_field() }}
            <input type="text" name="name" class="" placeholder="名前" value="{{ $members->name }}" >
            <input type="tel" name="phone" class="" placeholder="電話番号" value="{{ $members->phone }}">
            <input type="email" name="email" class="" placeholder="メールアドレス" value="{{ $members->email }}">
            <button type="submit" class="">
                <i class="fa fa-plus"></i> 編集
            </button>
        </form>

        <!-- 削除するためのフォーム -->
        <form action="{{ url('destroy', $members->id) }}" method="get" class="form-horizontal">
        @method('DELETE')
            <button type="submit" class="">
                <i class="fa fa-plus"></i> 削除
            </button>
        </form>
            <a href="{{ route('top') }}">キャンセル</a>
    </div>

@endsection
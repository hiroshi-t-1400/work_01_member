@extends('layouts.app')

@section('title', '会員一覧')

@section('content')

    <!-- 会員一覧表示 -->
    <h1>会員一覧</h1>

    <div class="">
        <a href="{{ route('register') }}">＞＞登録</a>
    </div>

    <!-- テーブル -->
    <table border>
        <tbody>
            <tr>
                <th>
                    名前
                </th>
                <th>
                    電話番号
                </th>
                <th>
                    メールアドレス
                </th>
                <th>
                    （編集）
                </th>
            </tr>
            @if ($members->isNotEmpty())
                @foreach ($members as $member)
                    <tr>
                        <!-- 会員名簿 -->
                        <td>
                            <div>{{ $member->name }}</div>
                        </td>
                        <td>
                            <div>{{ $member->phone }}</div>
                        </td>
                        <td>
                            <div>{{ $member->email }}</div>
                        </td>
                        <td>
                            <div>
                                <a href="{{ url('edit', $member->id) }}">＞＞編集</a>
                                <!-- 訓練のサルマネ、URLの/以下に欲しい情報をくっつけてrouteへ。routeで引数として受け取りコントロールへ。 -->
                                <!-- route('edit', ['id' => 1]) でも可、ただし今回のようにrouteの名前を付けていること！ -->
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class MemberController extends Controller
{
    //

    /**
     * トップ画面＝会員一覧画面を表示
     * (todo参考:menberテーブルに入っているレコードを全て取得・表示する（top.blade.phpの役目）)
     *  ともかくtop画面が呼び出されたらデータベースからデータを全て取ってくる
     * 
     * @return void
     */
    public function top()
    {
        // membersテーブルの情報を全て取得、view関数でtopに遷移し、テーブルの内容を渡す
        $members = Member::all();

        return view('members.top', [
            'members' => $members,
        ]);
    }

    /**
     * 会員登録画面を表示
     *
     * @return void
     */
    public function register()
    {
        return view('members.register');
    }

    /**
     * 会員登録操作
     * フォームの内容をデータベースのレコードに追加
     *
     * @param Request $request
     * @return void
     */
    public function memberRegister(Request $request)
    {

        // バリデーション
        $this->validate($request, [
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:254',
        ]);

        // Memberオブジェクトクラスを操作して、DBに1行のレコードを追加する
        Member::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('top')->with('success', 'POST Store is success');
    }

    /**
     * 登録情報の編集
     * フォームの内容をデータベースのレコードに追加
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request, $id)
    {
        // 受け取った変更部分$requestの中身だけバリデーションチェック
        $request->validate([
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:254',
        ]);

        // Memberモデルの$membersオブジェクトを宣言し、引数で取ってきた
        // 今回編集を行う『元の』レコードを格納する
        $members = Member::find($id);
        // Memberモデルのオブジェクトを、updateメソッドを使って、$requestの中身で上書きする。
        // laravelが自動的に添え字（title等）を判別して、正しいレコードで上書きしてくれる
        $members->update($request->all());

        return redirect('top')->with('success', 'POST Update is success');
    }


    /**
     * 会員編集画面を表示
     * topから会員idを取得し、編集画面へ送る
     *
     * @param Request $request
     * @param interger $id
     * @return view|false
     */
    public function edit(Request $request, Member $id)
    {
        // routeで　｛｝で受け取った引数を、Memberモデルクラスとして受け取り、自動で？idとして扱ってもらえるので、該当のデータベースのデータを取得する

        return view('members.edit', [
            'members' => $id,
        ]);
    }

    /**
     * 会員レコードの削除
     *
     * @param Request $request
     * @param Member $members
     * @return void
     */
    public function destroy($id)
    {
        // dd($members);
        // 関数内でオブジェクトを作成して削除する、練習のため
        // Member::destroy($id);
        Member::destroy($id);

        return redirect('top');
    }

}

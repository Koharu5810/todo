<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;   // モックオブジェクトのメソッドが返す方を定義するためのノード
use Psr\Http\Message\RequestInterface;   // コードの互換性や互換性を向上させるためのガイドラインを提供

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }
    // public function store(Request $request)
    // {
    //     $todo = $request->only('content');
    //     return view('/');
    // }
    public function store(TodoRequest $request)    // TodoRequestを使用
    {
        $todo = $request->only(['content']);   // データを受け取る
        Todo::create($todo);                   // Todoをデータべースに保存

        return redirect('/')->with('success', 'Todoを作成しました');      // リダイレクト時にメッセージを表示する
    }
    // public function update(Request $request)
    // {
    //     $todo = Todo::find($request->id);
    //     $todo->content = $request->content;
    //     $todo->save();

    //     return redirect('/')->with('success', 'Todoを更新しました');
    // }
    public function update(TodoRequest $request)     // 以下のコードの方が読みやすく一般的に推奨されているコード
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('success', 'Todoを更新しました');
    }
    // public function destroy(Request $request)
    // {
    //     $todo = Todo::findOrFail($request->id);
    //     $todo->delete();

    //     return redirect('/')->with('success', 'Todoを削除しました');
    // }
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('success', 'Todoを削除しました');
    }
}

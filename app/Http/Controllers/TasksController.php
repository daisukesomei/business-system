<?php

namespace App\Http\Controllers;

use App\Models\Task;    //追加
use App\Models\User;    //追加
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //ログイン後のユーザーのタスク一覧ページを表示
    public function index(){
        $data = [];
        //ログイン済みの場合以下を$data配列に入れてビューに引き渡す
        if(\Auth::check()) {
            $user = \Auth::user();  //ログインをしたuserテーブルの情報を$userに代入
            
            $tasks = $user->tasks()->orderBy('id', 'DESC')->paginate(5);   //タスクをidの新しい順にページネーションにて表示
            
            $data = ['user' => $user, 'tasks' => $tasks];
        }
            //dashboardビューで上記を表示
            return view('dashboard', $data);
    }
    
    //ログインしたユーザーの詳細ページ（案件一覧とタスク一覧）を表示
    public function show($id){
        $data = [];
        //ログイン済みの場合$data配列に入れてビューに引き渡す
        if(\Auth::check()){
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('id', 'DESC')->paginate(5);   //タスクをidの新しい順にページネーションにて表示
            $salesprojects = $user->salesprojects()->orderBy('id', 'DESC')->paginate(5); //案件一覧をidの新しい順にページネーションにて表示;
            
            $data = ['user' => $user, 'tasks' => $tasks, 'salesprojects' => $salesprojects];
        }
        
        //ログインユーザー詳細で上記を表示
        return view('tasks.show', $data);
    }
    
    //タスクの登録
    public function store(Request $request){
        //バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ],
        [ 'content.required' => 'タスク入力は必須です。',
        ]);
            
        //認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->tasks()->create(['content' => $request->content ]);
        //投稿終了後前のページにバック
        return back();
    }
    
    //タスクの削除
    public function destroy(int $id){
        //取得したidのタスクを検索して取得
        $task = Task::findOrFail($id);
        
        //認証済みのユーザー（閲覧者）か確認。認証済みの場合削除
        if(\Auth::id() === $task->user_id){
            $task->delete();
            return back();
        }
        //前のURLへリダイレクトさせる
        return back();
    }
    
}

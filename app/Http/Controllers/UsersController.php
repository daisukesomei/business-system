<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    //追加

class UsersController extends Controller
{
    //ユーザー一覧を表示する
    public function index(){
        //ユーザー登録者すべてを取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        //上記ユーザーの情報をすべてビュー画面に表示
        return view('users.index', ['users' => $users]);
    }
    
    //ユーザー詳細を表示する
    public function show($id){
        //idの値でユーザーを取得する
        $user = User::findOrFail($id);
        
        //案件一覧を取得
        $salesprojects = $user->salesprojects()->paginate(10);
        //ユーザー詳細ビューで上記を表示
        return view('users.show', ["user" => $user, 'salesprojects' => $salesprojects ]);
        
    }
}

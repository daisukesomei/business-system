<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;   //追記
use App\Models\Salesproject;   //追記

class SalesprojectsController extends Controller
{
    // getでsalesprojects/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //salesprojectテーブルのすべてをwithでuserメソッドでUserテーブルを紐づけてpaginateで表示
        $salesprojects = Salesproject::with('user')->paginate(10);

        $data = ['salesprojects' => $salesprojects];

        //上記取得情報をビューにて表示
        return view('salesprojects.index', $data);
    }

    //getでsalesprojects/create/にアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        return view('salesprojects.create');
    }

    //postでsalesprojectにアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $user = $request->user();
        //認証済みのユーザーの場合新規案件の登録ができる
        if(\Auth::id() === $user->id){
            $user->salesprojects()->create(['customername' => $request->customername, 'price' => $request->price, 'comment' => $request->comment]);
        }
        return redirect()->route('users.show', $user->id);
    }

    //getでsalesprojects/editにアクセスされた場合の「更新画面処理」
    public function edit(string $id)
    {
        //idに紐づくsalesproject情報を取得
        $salesproject = Salesproject::findOrfail($id);
        
        //上記の情報をビューに渡す
        return view('salesprojects.edit', ['salesproject' => $salesproject]);
        
    }

    //putでsalesprojects/(任意のid)にアクセスされた場合の「更新処理」
    public function update(Request $request, string $id)
    {
        $salesproject = Salesproject::findOrfail($id);
        
        //認証済みのユーザーの時のみ、アップデートを行える。
        if(\Auth::id() === $request->user()->id){
            $salesproject->update(['customername' => $request->customername, 'price' => $request->price, 'comment' => $request->comment]);
        }
        return redirect()->route('users.show', $salesproject->user_id);
    }

    //deleteでsalesprojects/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy(string $id)
    {
        $salesproject = Salesproject::findOrfail($id);
        
        //認証済みのユーザーの時のみ、削除を行える。
         if(\Auth::id() === $salesproject->user_id){
            $salesproject->delete();
        }
        return redirect()->route('users.show', $salesproject->user_id);
    }
}

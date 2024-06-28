<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;   //追記
use App\Models\Salesproject;   //追記
use App\Models\Customer;   //追記

class SalesprojectsController extends Controller
{
    // getでsalesprojects/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //salesprojectテーブルのすべてをwithでuserメソッドでUserテーブルを紐づけてpaginateで表示
        $salesprojects = Salesproject::paginate(10);

        $data = ['salesprojects' => $salesprojects];

        //上記取得情報をビューにて表示
        return view('salesprojects.index', $data);
    }

    //getでsalesprojects/create/にアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //お客様情報を全て取得
        $customers = Customer::all();
        
        //お客様情報をビューに渡す
        return view('salesprojects.create', ['customers' => $customers]);
    }

    //postでsalesprojectにアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $user = $request->user();

        //認証済みのユーザーの場合新規案件の登録ができる
        if(\Auth::id() === $user->id){
            //セレクトボックスでお客様が選ばれた場合
            if(isset($request->customer_id)){
                //バリデーション
                $request->validate([
                    'price' => 'numeric|between:0,1000000000',
                    'comment' => 'required|max:255',
                ],[
                    'price' => '収入は必須です。0～の数字で入力してください。',
                    'comment' => 'コメントは必須です',
                ]);
                
                //選ばれたお客様idをもとにidに紐づくカスタマーテーブル情報を取得
                $customer = Customer::findOrfail($request->customer_id);
                //フォームで入力された値とcustomername・customer_idは$customerの情報を保存
                $user->salesprojects()->create(['customername' => $customer->customername, 'customer_id' => $request->customer_id, 'price' => $request->price, 'comment' => $request->comment]);
            }else{
                //バリデーション
                $request->validate([
                    'customername' => 'required|max:255',
                    'postalcode' => 'required|max:10',
                    'address' => 'required|max:255',
                    'tel' => 'required|max:20',
                    'email' => 'email|max:20',
                    'price' => 'numeric|between:0,1000000000',
                    'comment' => 'required|max:255',
                ],
                [ 'customername.required' => 'お客様名は必須です',
                  'postalcode.required' => '郵便番号は必須です。',
                  'address.required' => '住所は必須です',
                  'tel.required' => '電話番号は必須です',
                  'email.email' => 'Emailは必須です。Email形式で入力してください。',
                  'price' => '収入は必須です。0～の数字で入力してください。',
                  'comment' => 'コメントは必須です',
                ]);
                
                $customer = Customer::create(['customername' => $request->customername, 'postalcode' => $request->postalcode, 'address' => $request->address, 'tel' => $request->tel, 'email' => $request->email]);
                $user->salesprojects()->create(['customername' => $request->customername, 'customer_id' => $customer->id, 'price' => $request->price, 'comment' => $request->comment]);
            }
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
        //バリデーション
        $request->validate([
            'customername' => 'required|max:255',
            'price' => 'numeric|between:0,1000000000',
            'comment' => 'required|max:255',
        ],
        [ 'customername.required' => 'お客様名は必須です',
          'price' => '収入は必須です。0～の数字で入力してください。',
          'comment' => 'コメントは必須です',
        ]);
        
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;    //追記
use App\Models\Salesproject;    //追記
use App\Models\User;    //追記

class CustomersController extends Controller
{
    public function index(){
        //customersテーブルの情報を全て取得してページネートで表示
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        
        //上記をビューに渡して表示
        return view('customers.index', ['customers' => $customers]);
    }
    
    public function show(int $id){
        //customerのidを取得し取得したidからcustomerテーブルから取得し$customerに代入
        $customer = Customer::findOrFail($id);
        
        //Salesprojectモデルのuser情報をリレーションしてcustomer_idと引数の$idが一致する情報のみ取得
        $salesprojects = Salesproject::with('user')->where('customer_id', $id)->get();
        $users = $salesprojects->map(function($salesproject){
            return $salesproject->user;
        })->unique('id');

        
        //上記をビューに渡して表示
        return view('customers.show', ['customer' => $customer, 'users' => $users]);
    }
    
    public function edit(int $id){
        //任意のidのカスタマー情報を取得
        $customer = Customer::findOrFail($id);
        
        //上記で所得した情報をビューにて表示
        return view('customers.edit', ['customer' => $customer]);
    }
    
    public function update(Request $request,int $id){
        //バリデーション
        $request->validate([
            'customername' => 'required|max:255',
            'postalcode' => 'required|max:10',
            'address' => 'required|max:255',
            'tel' => 'required|max:20',
            'email' => 'email|max:20',
        ],[ 
            'customername.required' => 'お客様名は必須です',
            'postalcode.required' => '郵便番号は必須です。',
            'address.required' => '住所は必須です',
            'tel.required' => '電話番号は必須です',
            'email.email' => 'Emailは必須です。Email形式で入力してください。',
        ]);
        
        //アップデートを行うカスタマーidをモデルから取得
        $customer = Customer::findOrFail($id);
        
        //上記で取得したidを$requestで取得した情報に更新
        $customer->update(['customername' => $request->customername, 'postalcode' => $request->postalcode, 'address' => $request->address, 'tel' => $request->tel, 'email' => $request->email]);
        //更新後お客様詳細画面にリダイレクト
        return redirect( route('customers.show',$customer->id));
    }
}

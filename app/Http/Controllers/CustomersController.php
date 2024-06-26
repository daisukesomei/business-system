<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;    //追記

class CustomersController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        
        return view('customers.index', ['customers' => $customers]);
    }
    
    public function show(int $id){
        
    }
    
    public function edit(int $id){
        
    }
    
    public function update(Request $request,int $id){
        
    }
    
    public function destroy(int $id){
        
    }
}

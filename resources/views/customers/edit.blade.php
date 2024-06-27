@extends('layouts.app')

@section('content')
    <div class="prose mx-auto text-center">
        <h2>お客様情報編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('customers.update',$customer->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control my-4">
                <label for="customername" class="label">
                    <span class="label-text">お客様名</span>
                </label>
                <input type="text" name="customername" value="{{ $customer->customername }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="postalcode" class="label">
                    <span class="label-text">郵便番号</span>
                </label>
                <input type="text" name="postalcode" value="{{ $customer->postalcode }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="address" class="label">
                    <span class="label-text">住所</span>
                </label>
                <input type="text" name="address" value="{{ $customer->address }}" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="tel" class="label">
                    <span class="label-text">TEL</span>
                </label>
                <input type="text" name="tel" value="{{ $customer->tel }}" class="input input-bordered w-full">
            </div>
            
            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" name="email" value="{{ $customer->email }}" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">お客様を更新する</button>
        </form>
    </div>
@endsection
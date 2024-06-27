@extends('layouts.app')

@section('content')
    <div class="prose mx-auto text-center">
        <h2>案件登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('salesprojects.store') }}" class="w-2/3">
            @csrf
            <div class="sm:grid sm:grid-cols-2 sm:gap-20">
                {{--左側のフォームタグ--}}
                <aside class="sm:col-span-1">
                    <div class="card card-bordered full">
                        <figure class="bg-sky-100 p-2">
                            <h1 class="text-center text-2xl">案件入力フォーム</h1>
                        </figure>
                        <div class="card-body">
                            <div class="form-control">
                                <label for="customername" class="label">
                                    <span class="label-text">お客様名（選択してください）</span>
                                </label>
                        
                                <select name="customer_id" class="select select-bordered w-full">
                                        <option></option>   {{--候補が無い場合空白にする空optionを入れる--}}
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{ $customer->customername}}</option>
                                    @endforeach
                                </select>
                        
                                <p class="text-rose-600">※お客様がセレクトの中から無い場合は右側のフォームも入力してください</p>
                            </div>
                    
                            <div class="form-control my-4">
                                <label for="price" class="label">
                                    <span class="label-text">収入</span>
                                </label>
                                <input type="text" name="price" class="input input-bordered w-full">
                            </div>
        
                            <div class="form-control my-4">
                                <label for="comment" class="label">
                                    <span class="label-text">コメント</span>
                                </label>
                                <textarea class="textarea textarea-bordered w-full" id="comment" name="comment" placeholder="状況を入力してください"></textarea>
                            </div>
                        </div>
                    </div>
                </aside>
                {{--右側のフォームタグ--}}
                <div>
                    <div class="card card-bordered full">
                        <figure class="bg-sky-100 p-2">
                            <h1 class="text-center text-2xl">お客様情報入力フォーム</h1>
                        </figure>
                        <div class="card-body">
                            <div class="form-control">
                                <label for="customername" class="label">
                                    <span class="label-text">お客様名</span>
                                </label>
                                <input type="text" name="customername" class="input input-bordered w-full">
                            </div>
                            <div class="form-control my-4">
                                <label for="postalcode" class="label">
                                    <span class="label-text">郵便番号</span>
                                </label>
                                <input type="text" name="postalcode" class="input input-bordered w-full">
                            </div>
                            <div class="form-control my-4">
                                <label for="address" class="label">
                                    <span class="label-text">住所</span>
                                </label>
                                <input type="text" name="address" class="input input-bordered w-full">
                            </div>
                            <div class="form-control my-4">
                                <label for="tel" class="label">
                                    <span class="label-text">ＴＥＬ</span>
                                </label>
                                <input type="text" name="tel" class="input input-bordered w-full">
                            </div>
                            <div class="form-control my-4">
                                <label for="email" class="label">
                                    <span class="label-text">email</span>
                                </label>
                                <input type="text" name="email" class="input input-bordered w-full">
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block normal-case">案件を登録する</button>
        </form>
    </div>
@endsection
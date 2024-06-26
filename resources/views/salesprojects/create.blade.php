@extends('layouts.app')

@section('content')
    <div class="prose mx-auto text-center">
        <h2>案件登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('salesprojects.store') }}" class="w-1/2">
            @csrf
            <div class="sm:grid sm:grid-cols-2 sm:gap-20">
                {{--左側のフォームタグ--}}
                <aside class="sm:col-span-1">
                    <h1 class="text-center text-2xl">案件入力フォーム</h1>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">お客様名（選択してください）</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                        <p>※お客様がセレクトの中から無い場合は右側のフォームも入力してください</p>
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
                </aside>
                {{--右側のフォームタグ--}}
                <div>
                    <h1 class="text-center text-2xl">お客様情報入力フォーム</h1>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">お客様名</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                    </div>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">郵便番号</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                    </div>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">住所</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                    </div>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">ＴＥＬ</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                    </div>
                    <div class="form-control my-4">
                        <label for="customername" class="label">
                            <span class="label-text">email</span>
                        </label>
                        <input type="text" name="customername" class="input input-bordered w-full">
                    </div>                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block normal-case">案件を登録する</button>
        </form>
    </div>
@endsection
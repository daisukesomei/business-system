@extends('layouts.app')

@section('content')
    <div class="prose hero bg-emerald-100 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                <h2>営業管理システムへようこそ！！</h2>
                {{--ユーザー登録ページへのリンク--}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register')}}">登録はこちら！！</a>
            </div>
        </div>
    </div>
@endsection
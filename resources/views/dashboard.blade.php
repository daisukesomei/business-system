@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <asaide class="mt-4">
                {{--ユーザー情報--}}
                @include('users.card');
            </asaide>
            <div class="sm:col-span-2">
                {{--タスク入力フォーム--}}
                @include('tasks.form')
                {{--タスク一覧--}}
                @include('tasks.tasks')
            </div>
        </div>
    @endif
@endsection
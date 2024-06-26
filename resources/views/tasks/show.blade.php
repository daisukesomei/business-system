@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <aside class="sm:col-span-2">
                {{--案件一覧情報--}}
                @include('salesprojects.show')
            </aside>
            <div class="sm:col-span-1">
                {{--タスク一覧--}}
                @include('tasks.tasks')
            </div>
        </div>
    @endif
@endsection
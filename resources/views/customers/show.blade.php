@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-2 sm:gap-10">
            <aside class="sm:col-span-1">
                {{--お客様情報--}}
                @include('customers.customer')
            </aside>
            <div class="sm:col-span-1">
                {{--担当しているuser一覧--}}
            </div>
        </div>
    @endif
@endsection
@extends('layouts.app')

@section('content')
    <div class="prose mx-auto text-center">
        <h2>案件更新</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('salesprojects.update',$salesproject->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control my-4">
                <label for="customername" class="label">
                    <span class="label-text">お客様名</span>
                </label>
                <input type="text" name="customername" value="{{ $salesproject->customername }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="price" class="label">
                    <span class="label-text">収入</span>
                </label>
                <input type="text" name="price" value="{{ number_format($salesproject->price) }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="comment" class="label">
                    <span class="label-text">コメント</span>
                </label>
                <textarea class="textarea textarea-bordered w-full" id="comment" name="comment">{{ $salesproject->comment }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">案件を更新する</button>
        </form>
    </div>
@endsection
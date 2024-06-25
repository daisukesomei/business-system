@if (Auth::id() == $user->id)
    <div class="mt-4">
        <form method="POST" action="{{ route('tasks.store')}}">
            @csrf
            <label class="form-control w-full">
                <textarea row=5 name="content" class="input input-bordered input-accent w-full"></textarea>
            </label>
            <div class="mt-2 text-left">
                <button type="submit" class="btn btn-primary ">タスク追加</button>
            </div>
        </form>
    </div>
@endif
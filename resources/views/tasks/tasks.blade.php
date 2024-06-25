<div class="mt-4">
    @if(isset($tasks))
    <h2>タスク一覧</h2>
    <table class="table table-zebra w-full border border-gray-300">
        <thead>
            <tr>
                <th class="text-center bg-neutral text-neutral-content normal-case">id</th>
                <th class="text-center bg-neutral text-neutral-content">タスク</th>
                <th class="text-center bg-neutral text-neutral-content">削除</th>
            </tr>
        </thead>
        <tbody>
            @if(count($tasks) == 0)
            <tr>
                <td colspan="3" class="border-t border-b border-gray-300">表示するタスクはありません</td>
            </tr>
            @else
            @foreach($tasks as $task)
            <tr>
                <th class="text-center border-t border-b border-gray-300">{{ $task->id }}</th>
                <td class="text-center border-t border-b border-gray-300">{{ $task->content }}</td>
                <td class="text-center border-t border-b border-gray-300">
                    <form method="post" action="{{ route('tasks.destroy',$task->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-sm normal-case" onclick="return confirm('Delete id = {{ $task->id }} ?')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {{--ページネーションのリンク--}}
    {{ $tasks->links() }}
    @endif
</div>
<div class="mt-4">
    @if(isset($salesprojects))
    <h2>{{ $user->name }}案件一覧</h2>
    <table class="table table-zebra w-full border border-gray-300">
        <thead>
            <tr>
                <th class="text-center bg-neutral text-neutral-content normal-case">id</th>
                <th class="text-center bg-neutral text-neutral-content">お客様名</th>
                <th class="text-center bg-neutral text-neutral-content">収入</th>
                <th class="text-center bg-neutral text-neutral-content">コメント</th>
                <th class="text-center bg-neutral text-neutral-content">編集</th>
                <th class="text-center bg-neutral text-neutral-content">削除</th>
            </tr>
        </thead>
        @if(count($salesprojects) == 0)
        <tr>
            <td colspan="6" class="text-left border-t border-gray-300">表示する案件がありません</td>
        </tr>
        @else
        @foreach($salesprojects as $salesproject)
        <tbody>
            <tr>
                <th class="text-center border-t border-gray-300">{{ $salesproject->id }}</th>
                <td class="text-center border-t border-gray-300">{{ $salesproject->customername }}</td>
                <td class="text-center border-t border-gray-300">{{ number_format($salesproject->price) }}</td>
                <td class="text-center border-t border-gray-300">{{ $salesproject->comment }}</td>
                @if(\Auth::id() === $salesproject->user_id)
                <td class="text-center border-t border-gray-300">
                    <a class="btn btn-active btn-accent" href="{{ route('salesprojects.edit', $salesproject->id) }}">編集</a>
                </td>
                <td class="text-center border-t border-gray-300">
                    <form method="POST" action="{{ route('salesprojects.destroy', $salesproject->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error">削除</button>
                    </form>
                </td>
                @else
                <td class="text-center border-t border-gray-300"></td>
                <td class="text-center border-t border-gray-300"></td>
                @endif
            </tr>
        </tbody>
        @endforeach
        @endif
    </table>
    {{--ページネーションのリンク--}}
    {{ $salesprojects->links() }}
    @endif
</div>
<h2>案件一覧ページ</h2>
@if(isset($salesprojects))
    <div class="mt-4">
    <table class="table table-zebra w-full border border-gray-300">
        <thead>
            <tr>
                <th class="text-center bg-neutral text-neutral-content normal-case">id</th>
                <th class="text-center bg-neutral text-neutral-content">ユーザー名</th>
                <th class="text-center bg-neutral text-neutral-content">お客様名</th>
                <th class="text-center bg-neutral text-neutral-content">収入</th>
                <th class="text-center bg-neutral text-neutral-content">コメント</th>
            </tr>
        </thead>
        @foreach($salesprojects as $salesproject)
        <tbody>
            <tr>
                <th class="text-center border-t border-gray-300">{{ $salesproject->id }}</th>
                <td class="text-center border-t border-gray-300">{{ $salesproject->user->name }}</td>
                <td class="text-center border-t border-gray-300"><a href="{{ route('customers.show' ,$salesproject->customer_id)}}" class="text-blue-600/100 underline">{{ $salesproject->customername }}</a></td>
                <td class="text-center border-t border-gray-300">{{ $salesproject->price }}</td>
                <td class="text-center border-t border-gray-300">{{ $salesproject->comment }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{--ページネーションのリンク--}}
    {{ $salesprojects->links() }}
</div>
@endif
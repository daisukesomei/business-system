@if (isset($customers))
<h2 class="mb-4">お客様一覧</h2>
    <ul>
        @foreach($customers as $customer)
            <li class="flex items-center gap-x-2 mb-4">
                <div>
                    {{--ユーザー詳細ページへのリンク--}}
                    <a class="link link-hover text-info" href="{{ route('customers.show', $customer->id)}}">{{ $customer->customername }}</a>
                </div>
            </li>
        @endforeach
    </ul>
    {{--ページネーションのリンク--}}
    {{ $customers->links() }}
@endif
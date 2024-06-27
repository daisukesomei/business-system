@if(isset($customer))
    <h2 class="text-center">お客様情報</h2>
    <div class="overflow-x-auto">
        <table class="table">
            <tr class="border-t border-b py-4">
                <th class="bg-teal-300 text-white">お客様名</th>
                <td>{{ $customer->customername }}</td>
            </tr>
            <tr class="border-b py-4">
                <th class="bg-teal-300 text-white">郵便番号</th>
                <td>{{ $customer->postalcode }}</td>
            </tr>
            <tr class="border-b py-4">
                <th class="bg-teal-300 text-white">住所</th>
                <td>{{ $customer->address }}</td>
            </tr>
            <tr class="border-b py-4">
                <th class="bg-teal-300 text-white">ＴＥＬ</th>
                <td>{{ $customer->tel }}</td>
            </tr>
　          <tr class="border-b py-4">
                <th class="bg-teal-300 text-white">Email</th>
                <td>{{ $customer->email }}</td>
            </tr>
        </table>
    </div>
    {{--編集ボタン--}}
    <div class="mt-4 text-center">
        <button class="btn btn-active btn-accent text-white"><a href="{{route('customers.edit', $customer->id )}}">お客様情報変更</a></button>
    </div>
@endif
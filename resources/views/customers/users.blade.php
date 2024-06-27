@if(isset($users))
    <h2 class="text-center mb-4">社内担当者一覧</h2>
    <div class="overflow-x-auto">
    <table class="table table-zebra w-full border border-gray-300">
        <thead>
            <tr>
                <th class="text-center bg-neutral text-neutral-content">id</th>
                <th class="text-center bg-neutral text-neutral-content">ユーザー名</th>
                <th class="text-center bg-neutral text-neutral-content">email</th>
            </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
            <tr>
                <th class="text-center border-t border-gray-300">{{ $user->id }}</th>
                <td class="text-center border-t border-gray-300">{{ $user->name }}</td>
                <td class="text-center border-t border-gray-300">{{ $user->email }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    </div>
@endif
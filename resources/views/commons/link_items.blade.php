@if (Auth::check())
    {{--権限者詳細ページへのリンク--}}
    <li><a class="link link-hover" href="{{ route('tasks.show',Auth::user()->id)}}">{{ Auth::user()->name }}詳細</a></li>
    {{--ユーザー一覧ページへのリンク--}}
    <li><a class="link link-hover" href="{{ route('users.index')}}">Users</a></li>
    {{--案件一覧ページへのリンク--}}
    <li><a class="link link-hover" href="{{ route('salesprojects.index')}}">案件一覧</a></li>
    {{--案件登録へのリンク--}}
    <li><a class="link link-hover" href="{{ route('salesprojects.create')}}">案件登録</a></li>
    {{--ログアウトへのリンク--}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{--会員登録ページへのリンク--}}
    <li><a class="link link-hover" href="{{ route('register')}}">会員登録</a></li>
    {{--ログインページへのリンク--}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
@endif
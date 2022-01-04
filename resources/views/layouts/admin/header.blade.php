@section('header')
<header>
    <h1><a href="{{ route('admin.patients.list') }}">検査結果確認</a></h1>
    <div class="btn logout">
        <a class="dropdown-item" href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>
@endsection

@section('sidebar')
<div class="sidebar">
    <ul class="sidebar-list">
        <li class="active">
            <a href="{{ route('admin.patients.list') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                    <g id="icon-list" transform="translate(-13 -1)">
                        <path d="M28,5.23V19a1,1,0,0,1-1,1H15a1,1,0,0,1-1-1V3a1,1,0,0,1,1-1H27" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="4" transform="translate(19 7)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="4" transform="translate(19 11)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="4" transform="translate(19 15)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                管理一覧
            </a>
        </li>
        <li>
            <a href="{{ route('admin.patients.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.851" height="21.42" viewBox="0 0 16.851 21.42">
                    <g id="icon-new" transform="translate(-6 -7)">
                        <path d="M20.458,18H20.7c.636,0,1.151.821,1.151,1.833V30.946c0,1.012-.515,1.833-1.151,1.833H8.151C7.515,32.779,7,31.958,7,30.946V19.833C7,18.821,7.515,18,8.151,18H9.784" transform="translate(0 -5.359)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <path d="M12.831,14.729,19.56,8a2.537,2.537,0,0,1,1.386.523,2.621,2.621,0,0,1,.569,1.432l-6.729,6.729-2.35.415Z" transform="translate(-1.913)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="2" transform="translate(16.351 17.574)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="8.351" transform="translate(10 20.883)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="8.351" transform="translate(10 24.192)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="1.955" y2="1.955" transform="translate(15.558 10.088)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                新規登録
            </a>
        </li>
        <li>
            <a href="{{ route('admin.attention') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.851" height="21.42" viewBox="0 0 16.851 21.42">
                    <g id="icon-new" transform="translate(-6 -7)">
                        <path d="M20.458,18H20.7c.636,0,1.151.821,1.151,1.833V30.946c0,1.012-.515,1.833-1.151,1.833H8.151C7.515,32.779,7,31.958,7,30.946V19.833C7,18.821,7.515,18,8.151,18H9.784" transform="translate(0 -5.359)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <path d="M12.831,14.729,19.56,8a2.537,2.537,0,0,1,1.386.523,2.621,2.621,0,0,1,.569,1.432l-6.729,6.729-2.35.415Z" transform="translate(-1.913)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="2" transform="translate(16.351 17.574)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="8.351" transform="translate(10 20.883)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="8.351" transform="translate(10 24.192)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        <line x2="1.955" y2="1.955" transform="translate(15.558 10.088)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </g>
                </svg>
                注意事項変更
            </a>
        </li>
    </ul>
</div>
@endsection
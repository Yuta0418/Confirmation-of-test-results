@extends('layouts.admin.common')
@section('title','患者情報編集')

@section('content')

<body class="admin">
    @include('layouts.admin.header')
    <main>
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
        <div class="contents create-content">
            <h2>患者様情報修正</h2>
            <section class="center-box">
                <div class="center-box-inner">
                    <div class="edit">
                        <form method="post" action="{{ route('admin.patients.update',$patients->id) }}" id="edit-form" enctype="multipart/form-data">
                        @csrf
                            @foreach ($errors->all() as $error)
                                <li style="list-style: none; color: red;">{{ $error }}</li>
                            @endforeach
                            <div class="form-item">
                                <label for="">氏名</label>
                                <input type="text" name="name" value="{{ $patients->name }}" placeholder="山田　太郎">
                            </div>
                            <div class="form-item">
                                <label for="">生年月日（Birth：year/month/day(例:1980/01/01)）</label>
                                <input type="text" name="birthday" value="{{ $patients->birthday }}"placeholder="1980/01/01">
                            </div>
                            <div class="form-item">
                                <label for="">カルテ番号</label>
                                <input type="text" name="patient_id" value= "{{ $patients->patient_id }}" placeholder="0000001">
                            </div>
                            <div class="form-item">
                                <label for="">検査結果</label>
                                @if($patients->results == 3)
                                <div class="select">
                                    <select name="results">
                                        <option value="{{ \App\Enums\Result::getValue("Choice") }}">{{ App\Enums\Result::getDescription(1) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Negative") }}">{{ App\Enums\Result::getDescription(2) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Positive") }}" selected>{{ App\Enums\Result::getDescription(3) }}</option>
                                    </select>
                                </div>
                                @elseif($patients->results == 2)
                                <div class="select">
                                    <select name="results">
                                        <option value="{{ \App\Enums\Result::getValue("Choice") }}">{{ App\Enums\Result::getDescription(1) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Negative") }}" selected>{{ App\Enums\Result::getDescription(2) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Positive") }}">{{ App\Enums\Result::getDescription(3) }}</option>
                                    </select>
                                </div>
                                @else
                                <div class="select">
                                    <select name="results">
                                        <option value="{{ \App\Enums\Result::getValue("Choice") }}" selected>{{ App\Enums\Result::getDescription(1) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Negative") }}">{{ App\Enums\Result::getDescription(2) }}</option>
                                        <option value="{{ App\Enums\Result::getValue("Positive") }}">{{ App\Enums\Result::getDescription(3) }}</option>
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="form-item file">
                                <p class="file-title">検査結果PDF</p>
                                <ul class="file-list">
                                    <li>
                                        <p class="file-list-name">{{$patients->results_pdf}}　</p>
                                    </li>
                                </ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none; color: red;">ファイルを選択していた場合はもう一度選択してください。</li>
                                    @break;
                                @endforeach
                                <div>
                                    <p class="file-name">選択されていません</p>
                                    <label>
                                        <input type="file" name="results_pdf" accept=".pdf">ファイルを選択
                                    </label>
                                </div>
                            </div>
                            <div class="form-item edit-date">
                                <p><span>登録日</span><span>{{$patients->created_at->format('Y/m/d')}}</span></p>
                                <p><span>更新日</span><span>{{$patients->updated_at->format('Y/m/d')}}</span></p>
                                <p><span>削除日</span><span>{{$patients->deleted_at}}</span></p>
                            </div>
                        <div class="btn-box">
                            <button type="button" class="btn-back" onclick='location.href="{{ route('admin.patients.list') }}"' style= "color:#fff;">{{ __('戻る') }}</button>
                            <button type="submit" class="btn-edit">更新</button>
                        </form>
                        <form method="post" action="{{ route('admin.patients.destroy',$patients->id) }}">
                            @csrf
                                <button type="submit" class="btn-delete">削除</button>
                        </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        $('.file input').on('change', function () {
            var file = $(this).prop('files')[0];
            $('.file-name').text(file.name);
        });
    </script>
</body>
@endsection

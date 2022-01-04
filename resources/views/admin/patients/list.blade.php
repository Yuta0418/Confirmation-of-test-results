@extends('layouts.admin.common')
@section('title','患者様情報一覧')

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
        <div class="contents patient">
            <h2>管理一覧</h2>
            <div class="btn-dl">
                <form method="POST" action="{{ route('admin.import') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-item file">
                        <div>
                            <p class="file-name">選択されていません</p>
                            <label>
                                <input type="file" name="csvdata" accept="text/csv">ファイルを選択
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn download data-input">CSVインポート<img src="{{ asset('images/icon-input.svg') }}" alt="CSVインポート"></button>
                </form>
                <form method="GET" action="{{ route('admin.csvexport') }}" enctype="multipart/form-data">
                    <button type="submit" class="btn download">CSVエクスポート<img src="{{ asset('images/icon-export.svg') }}" alt="CSVエクスポート"></button>
                </form>
            </div>
            @if ($errors->any())
            <div class="input-error">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <section class="center-box">
                <div class="center-box-inner patient-inner">
                    <div class="patient-list scroll">
                        <table>
                            <colgroup>
                                <col class="col-1">
                                <col class="col-2">
                                <col class="col-3">
                                <col class="col-4">
                                <col class="col-5">
                                <col class="col-6">
                                <col class="col-7">
                                <col class="col-8">
                                <col class="col-9">
                            </colgroup>
                            <tbody>
                                <thead>
                                    <th>ID</th>
                                    <th>氏名</th>
                                    <th>生年月日</th>
                                    <th>カルテ番号</th>
                                    <th>検査結果</th>
                                    <th>検査結果PDF</th>
                                    <th>編集</th>
                                    <th>登録日時</th>
                                    <th>修正日</th>
                                </thead>
                                @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->birthday }}</td>
                                    <td>{{ $patient->patient_id }}</td>
                                    @if($patient->results == 2)
                                    <td>検出せず</td>
                                    @elseif($patient->results == 3)
                                    <td>陽性</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td><a href="{{ asset('storage/pdf/'.$patient->results_pdf) }}" target="_blank">{{ $patient->results_pdf }}</a></td>
                                    <td><a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn">編集する</a></td>
                                    <td><?php echo date('Y/m/d',  strtotime($patient->created_at));?></td>
                                    <td><?php echo date('Y/m/d',  strtotime($patient->updated_at));?></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- ページング -->
            {{ $patients->links() }}
        </div>
    </main>

    <script>
        var file = $('.file input').prop('files')[0];
        console.log(file);
        $('.file input').on('change', function () {
            var file = $(this).prop('files')[0];
            if (file !== 'undefined') {
                $('.btn.data-input').addClass('active');
                $('.file-name').text(file.name);
            }else {
                $('.btn.data-input').removeClass('active');
                $('.file-name').text('選択されていません');
            }
        });
    </script>
</body>
@endsection
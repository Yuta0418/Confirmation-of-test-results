@extends('layouts.patient.common')
@section('title', 'ログイン')

@section('content')
<body class="ai">
    <div class="logo"><img src="" srcset="" alt="テスト"></div>
        <section class="center-box full">
            <div class="center-box-inner bg-none">
                <div class="login">
                    <h1>Web検査確認</h1>
                    <p>カルテ番号、生年月日、氏名を入力して<br class="sp">結果表示ボタンを押してください。</p>
                    <form method="POST" action="{{ route('patient.top') }}">
                        @csrf
                            <div class="form-item">
                                <label for="patient_id">カルテ番号（Patient ID）</label>
                                <div class="col-md-6">
                                    <input id="patient_id" type="text" class="form-control" name="patient_id" value="{{ old('patient_id') }}" required placeholder="000001">
                                        @if ($errors->has('patient_id'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('patient_id') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-item">
                                <label for=""birthday>生年月日（Birth：year/month/day）</label>
                                <div class="col-md-6">
                                    <input type="date" name="birthday-input" id="birthday-input" value="{{ old('birthday') }}" placeholder="1980/01/01"  pattern="\d{4}/\d{2}/\d{2}">
                                    <input type="text" name="birthday" id="birthday" hidden>
                                        @if ($errors->has('birthday'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('birthday') }}</strong>
                                            </span>
                                        @endif
                                    <script>
                                        $('input[type="date"]').change(function() {
                                            var data = $(this).val();
                                            var newdata = data.replace(/-/g,'/');
                                            console.log(data,newdata);
                                            $('#birthday').val(newdata);
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form-item">
                                <label for="name">氏名（カタカナ）</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="氏名">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="fas fa-caret-right">
                                        {{ __('結果表示') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
@include('layouts.footer')
@endsection

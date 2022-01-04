@extends('layouts.patient.common')
@section('title', '検査結果')

@section('content')
<body class="ai">
    <div class="logo"><img src="" srcset="" alt="テスト"></div>
        <section class="center-box full">
            <div class="center-box-inner">
                <div class="result">
                    <h1>PCR検査結果</h1>
                    @foreach($patients as $patient)
                    @if(!isset($patient->deleted_at))
                        <div class="result-item">
                            <h2><span>カルテ番号 : {{ $patient->patient_id }}</span></h2>
                            <p class="result-name">　{{ $patient->name }}様</p>
                        </div>
                        <div class="result-item">
                            <h2><span>検査結果</span></h2>
                            @if($patient->results == 2)
                            <p class="result-result">検出せず</p>
                            @elseif($patient->results == 3)
                            <p class="result-result">陽性</p>
                            @else
                            <p class="result-result">検査結果確認中</p>
                            @endif
                        </div>
                        @if($patient->results == 2)
                            <div class="btn-dl"><a href="{{ asset('storage/pdf/'.$patient->results_pdf) }}" download class="btn download">検査結果を<span>ダウンロード</span><img src="{{ asset('images/icon.svg') }}" alt="ダウンロード"></a>
                        @else
                            <div class="btn-dl"><a href="" style="pointer-events: none;" class="btn lock">検査結果を<span>ダウンロード</span><img src="{{ asset('images/icon.svg') }}" alt="ダウンロード"></a>
                        @endif
                            <div class="btn-note">
                                <p>{{ $attention->comment }}</p>
                            </div>
                        </div>
                    @else
                        <div class="result-item">
                            <h2><span>検査結果</span></h2>
                            <p class="result-result">期限切れにより表示できません。</p>
                        </div>
                    @endif
                    @endforeach
                    <div><a href="/patient/login" class="btn">TOPへ戻る<i class="fas fa-caret-right"></i></a></div>
                </div>
            </div>
        </section>
    </div>
</body>
@include('layouts.footer')
@endsection

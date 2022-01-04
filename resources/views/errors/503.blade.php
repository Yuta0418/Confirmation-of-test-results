@extends('layouts.patient.common')
@section('title', 'お探しのページが見つかりませんでした')

@section('content')
<body class="ai">
    <div class="logo"><img src="{{ asset('images/head_logo.png') }}" srcset="{{ asset('images/head_logo@2x.png 2x') }}" alt="あい小児科"></div>
        <section class="center-box full">
            <div class="center-404-inner">
                <div class="result">
                    <h1 class="notfound-title">404<span>Not Found</span></h1>
                    <p class="notfound-txt">お探しのページは見つかりませんでした。</p>
                </div>
            </div>
        </section>
    </div>
</body>
@include('layouts.footer')
@endsection

@extends('layouts.success')
@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <dic class="col text-center">
            <img src="{{ url('frontend/images/ic_mail.png') }}" alt="" />
            <h1>Yeayy!! Pembayaran Berhasil</h1>
            <p>
                untuk info selanjutnya pihak kami akan menghubungi
                <br> 
                anda via Email atau sms  
            </p>
            <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </dic>
    </div>
</main>
@endsection
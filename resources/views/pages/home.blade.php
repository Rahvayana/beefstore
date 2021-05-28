@extends('layouts.app')

@section('title')
    HGUFRON
@endsection

@section('content')
    
<!-- Header  -->
<header class="text-center">
    <h1>
        Cari Daging Sehat Dengan 
        <br>
        Sekali Klik
    </h1>
    <p class="mt-3">
        Daging Segar Andapun Sehat
    </p>
    <a href="#best" class="btn btn-beli-sekarang px-4 mt-4">
        Beli Sekarang
    </a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>5K</h2>
                <p>Pembeli</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>7K</h2>
                <p>Daging Terjual</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>100</h2>
                <p>Pelanggan</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <section class="section-best" id="best">
        <div class="container">
            <div class="row">
                <div class="col text-center section-best-heading">
                    <h2>Best Seller</h2>
                    <P>Sesuatu yang paling banyak dibeli </P>
                </div>
            </div>
        </div>
    </section>
    <section class="section-best-content" id="bestContent">
        <div class="container">
            <div class="section-best-daging row justify-content-center">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-daging text-center d-flex flex-column"
                    style="background-image: url('{{Storage::url($item->image)}}');"
                    >
                        <div class="nama-daging">{{ $item->beeftype }}</div>
                        <div class="jenis-daging">{{ $item->title }}</div>
                        <div class="daging-button mt-auto">
                            <a href="{{ route('detail', $item->slug) }}" class="btn btn-daging-details px-4">
                                Lihat Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>
                        Partner yang membantu
                        <br />
                        dalam proses jual dan beli
                    </p>
                </div>
                <div class="col-md-8 text-center">
                    <img 
                     src="Frontend/images/Logo_partner.png"
                     alt="Logo Partner" 
                     class="img-partner">
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading"id="testimonialHeading">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Mereka yang menyukai toko ini</h2>
                <p>
                    Memberikan kesan yang baik 
                    <br />
                        kepada pembeli
                </p>
            </div>
        </div>
    </div>
    </section>

    <section class="section section-testimonial-content"
    id="testimonialContent">
    <div class="container">
        <div class="section-popular-daging row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="frontend/images/testimonial-1.png" alt="user"
                        class="md-4 rounded-circle">
                        <h3 class="mb-4">Alvi Royhan</h3>
                        <p class="testimonial">
                            " It was glorious and I could 
                            not stop to say wohooo for 
                            every single moment
                            Dankeeeeee "
                        </p>
                    </div>
                    <hr>
                    <p class="jenis-to mt-2">
                        Pembelian Has Dalam
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="frontend/images/testimonial-2.png" alt="user"
                        class="md-4 rounded-circle">
                        <h3 class="mb-4">Karlina</h3>
                        <p class="testimonial">
                            " It was glorious and I could 
                            not stop to say wohooo for 
                            every single moment
                            Dankeeeeee "
                        </p>
                    </div>
                    <hr>
                    <p class="jenis-to mt-2">
                        Pembelian IGA
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="frontend/images/testimonial-3.png" alt="user"
                        class="md-4 rounded-circle">
                        <h3 class="mb-4">Nessie</h3>
                        <p class="testimonial">
                            " It was glorious and I could 
                            not stop to say wohooo for 
                            every single moment
                            Dankeeeeee "
                        </p>
                    </div>
                    <hr>
                    <p class="jenis-to mt-2">
                        Pembelian LAMUR
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="#" class="btn btn-butuh-bantuan px-4 mt-4 mx-1">
                    Butuh Bantuan
                </a>
                <a href="{{ route('register') }}" class="btn btn-beli-sekarang px-4 mt-4 mx-1">
                    Beli Sekarang
                </a>
            </div>
        </div>
    </div>
    </section>
</main>
@endsection
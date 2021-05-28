@extends('layouts.app')
@section('title', 'Detail Daging')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Daftar Daging
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p>
                            {{ $item->beeftype }}
                        </p>
                        @if($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img 
                                src="{{ Storage::url($item->galleries->first()->image ) }}" 
                                class="xzoom" 
                                id="xzoom-default" 
                                xoriginal="{{ Storage::url($item->galleries->first()->image ) }}"
                                />
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                    <img 
                                    src="{{ Storage::url($gallery->image) }}" 
                                    class="xzoom-gallery" 
                                    width="128" 
                                    xpreview="{{ Storage::url($gallery->image) }}"
                                    />
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang Daging Sapi</h2>
                        <p>
                            {!! $item->about !!}
                        </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/images/ic_event.png') }}" alt=""class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left"></div>
                                <div class="col-md-4"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Pelanggan</h2>
                        <div class="members my-2">
                            <img src="/Frontend/images/p_1.png"class="member-image mr-1"
                            />
                            <img src="/Frontend/images/p_2.png"class="member-image mr-1"
                            />
                            <img src="/Frontend/images/p_3.png"class="member-image mr-1"
                            />
                            <img src="/Frontend/images/p_4.png"class="member-image mr-1"
                            />
                        </div>
                        <hr>
                        <h2>Informasi Pembelian</h2>
                        <table class="pembelian-informations">
                            <tr>
                                <th width="50%">Barang</th>
                                <td width="50%" class="text-right">
                                    {{ $item->type }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Harga Daging</th>
                                <td width="50%" class="text-right">
                                    Rp. {{ number_format($item->price) }} / Kilo
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Ongkos kirim</th>
                                <td width="50%" class="text-right">
                                   {{ $item->shipping }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                       @auth
                           <form action="{{ route('checkout_process', $item->id) }}" method="post">
                               @csrf
                               <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                   Beli Sekarang
                               </button>
                           </form>
                       @endauth
                       @guest
                       <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                        Masuk atau Daftar untuk Membeli
                    </a>   
                       @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('Frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 20
        });
    });
</script>
@endpush
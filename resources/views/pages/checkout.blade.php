@extends('layouts.checkout')
@section('title', 'Checkout')

@section('content')
<style>
    .noDecoration {
        border-color: inherit;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
    }
</style>
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
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h1>Berapa banyak yang anda pesan?</h1>
                        <p>
                            Pemesanan Untuk {{ $item->title }},{{ $item->beeftype }}
                        </p>
                            <div class="attendee">
                                <form action="{{ route('transactions_process', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="form_pesanan">
                                        <div class="row">
                                            <p style="margin-left: 15px">Nama</p>
                                            <p style="margin-left: 120px">Alamat</p>
                                            <p style="margin-left: 120px">Kilo</p>
                                        </div>
                                        <hr>
                                    </div>
                                    <button type="submit" id="transactionButton" style="visibility: hidden;">
                                        Submit
                                    </button>
                                </form>
                            </div>
                            <div class="member mt-3">
                            <h2>Add</h2>
                            <form class="form-inline" onsubmit="return AddData()">
                                <label for="inputUsername" class="sr-only">Name</label>
                                <input 
                                type="text" 
                                name="inputUsername"
                                class="form-control mb-2 mr-sm-2" 
                                id="inputUsername" 
                                placeholder="Nama"
                                />
                                <label for="inputAlamat" class="sr-only">Alamat</label>
                                <input 
                                type="text" 
                                name="inputAlamat"
                                class="form-control mb-2 mr-sm-2" 
                                id="inputAlamat" 
                                placeholder="Alamat"
                                />
                                <label for="inputKilo" class="sr-only">Name</label>
                                <input 
                                type="text"
                                name="inputKilo"
                                class="form-control mb-2 col-md-2" 
                                id="inputKilo" 
                                placeholder="Kilo"
                                />

                                <button type="submit" class="btn btn-tambahkan ml-2 mb-2 px-4">
                                    Tambahkan
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">pada input kilo jumlah yang akan ditambahkan lebih atau kurang dari 1 kilo, dan inputan kilo belom termasuk ke dalam bil kekurangan pada bil nantinya kita akan mengirim bil yang kurang melalui email yang sudah terdaftar. Defaultnya yang ditambahkan akan dihitung 1 Kilo </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Informasi Checkout</h2>
                        <table class="pembelian-informations">
                            <tr>
                                <th width="50%">Jumlah Pesanan</th>
                                <td width="50%" class="text-right">
                                    <input type="text" class="form-control" readonly name="jml_pesanan" id="jml_pesanan">
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
                                    Rp 30.000
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Total Harga</th>
                                <td width="50%" class="text-right text-total">
                                    <input type="text" class="form-control" readonly name="total_harga" id="total_harga">
                                </td>
                            </tr>
                        </table>
                        <hr/>
                        <h2>Instruksi Pembelian</h2>
                        <p class="instruksi-pembelian">
                            Harap selesaikan pembayaran anda sebelum
                            melanjutkan pembayaran lain.
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>Gufron</h3>
                                    <p>
                                        0881 8829 8800
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>Gufron</h3>
                                    <p>
                                        0899 8501 7888
                                        <br>
                                        Bank Rakyat Indonesia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a id="clickTransaction" class="btn btn-block btn-join-now mt-3 py-2">
                            Bayar Sekarang
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ url()->previous() }}" class="text-muted">
                            Batalkan Pembayaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hargaPesanan" id="hargaPesanan">
        <input type="hidden" name="jumlahPesanan" id="jumlahPesanan">
    </section>
</main>
@endsection


@push('prepend-style')
    <link rel="stylesheet" href="{{ url('Frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>

<script>
    $("#clickTransaction").click(function(){
        $("#transactionButton").click()
    });
</script>

<script>
    $(document).ready(function() {
        localStorage.removeItem("jumlahPesanan");
        $("#jml_pesanan").val(0)
        $("#total_harga").val(0)
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('frontend/images/') }}" />'
            }
        });
    });

    function AddData() {
        var i=0
        var totalPesanan=localStorage.getItem("totalPesanan");
        var rows = "";
        var username = document.getElementById("inputUsername").value;
        var alamat = document.getElementById("inputAlamat").value;
        var kilo = document.getElementById("inputKilo").value;
        var jumlahPesanan=localStorage.getItem("jumlahPesanan");
        rows += "<tr id='myTableRow"+i+"'>\
            <td> <input type='text' style='border:none' readonly class='noDecoration' name='nama[]' id='jumlahPesanan' value='"+ username+"'>" + "</td>\
            <td> <input type='text' style='border:none' readonly class='noDecoration' name='alamat[]' id='jumlahPesanan' value='"+ alamat+"'>"+"</td>\
            <td> <input type='text' style='border:none' readonly class='noDecoration' name='kilo[]' id='jumlahPesanan' value='"+ kilo+"'>"+"</td>\
            <td>  <span class='btn btn-danger btn btn-block' onclick='remove_order("+i+","+kilo+")'>X</span> </td>\
        </tr> ";
        $(rows).appendTo(".form_pesanan");
        if(jumlahPesanan==null){
            jumlahPesanan=0
        }
        jumlahPesanan=parseInt(jumlahPesanan)+parseInt(kilo)
        totalPesanan=jumlahPesanan*{{$item->price}}
        console.log(jumlahPesanan)
        localStorage.setItem("jumlahPesanan", jumlahPesanan);
        console.log(totalPesanan)
        $("#jml_pesanan").val(parseInt(jumlahPesanan))
        $("#total_harga").val(totalPesanan)

        //membuat perhitungan hasil dll
        i++
        return false;
    }

    function remove_order(count,kilo){
		$('#myTableRow'+count).remove();
        var jumlahPesanan=localStorage.getItem("jumlahPesanan");
        console.log(kilo)
        jumlahPesanan=parseInt(jumlahPesanan)-parseInt(kilo)
        totalPesanan=jumlahPesanan*{{$item->price}}
        console.log(jumlahPesanan)
        localStorage.setItem("jumlahPesanan", jumlahPesanan);
        console.log(totalPesanan)
        $("#jml_pesanan").val(parseInt(jumlahPesanan))
        $("#total_harga").val(totalPesanan)
    }
</script>
@endpush
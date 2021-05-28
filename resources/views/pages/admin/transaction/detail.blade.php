@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
        </div>

            <!-- Content Row -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                   <table class="table table-bordered">
                       <tr>
                           <th>ID</th>
                           <td>{{ $item->id }}</td>
                       </tr>
                       <tr>
                            <th>Daftar Daging</th>
                            <td>{{ $item->beef_package->title }}</td>
                       </tr>
                       <tr>
                            <th>Pembeli</th>
                            <td>{{ $item->user->name }}</td>
                       </tr>
                       <tr>
                        <th>Total Kilo</th>
                        <td>{{ $item->transaction_total/$item->beef_price}}</td>
                     </tr>
                       <tr>
                            <th>Total Transaksi</th>
                            <td>RP{{ $item->transaction_total }}</td>
                       </tr>
                       <tr>
                            <th>Status Transaksi</th>
                            <td>{{ $item->transaction_status}}</td>
                       </tr>
                       <tr>
                           <th>Pembelian</th>
                           <td>
                               <table class="table table-bordered">
                                   <tr>
                                       <th>ID</th>
                                       <th>Nama</th>
                                       <th>Alamat</th>
                                       <th>Kilo </th>
                                   </tr>
                                   @foreach ($item->details as $detail)
                                       <tr>
                                           <td>{{ $detail->id }}</td>
                                           <td>{{ $detail->username}}</td>
                                           <td>{{ $detail->address }}</td>
                                           <td>{{ $detail->total_kilo }}</td>
                                       </tr>
                                   @endforeach
                               </table>
                           </td>
                       </tr>
                   </table>
                </div>
            </div>
</div>
<!-- /.container-fluid -->
@endsection
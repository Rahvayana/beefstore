@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Daftar Daging</h1>
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
                    <form action="{{ route('beef-package.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="beeftype">Beeftype</label>
                            <input type="text" class="form-control" name="beeftype" placeholder="beeftype" value="{{ old('beeftype') }}">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" placeholder="language" value="{{ old('language') }}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" placeholder="type" value="{{ old('type') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="shipping">Shipping</label>
                            <input type="number" class="form-control" name="shipping" placeholder="shipping" value="{{ old('shipping') }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
</div>
<!-- /.container-fluid -->
@endsection
@extends('layout.app')

@section('title', 'Edit Transaksi')

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>
    <form action="{{ route('transaction.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_baju">Jenis Baju:</label>
            <input type="text" class="form-control" id="jenis_baju" name="jenis_baju" value="{{ $data->jenis_baju }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

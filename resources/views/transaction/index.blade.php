@extends('layout.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <a href="{{ route('transaction.print') }}" class="btn btn-secondary mb-3" target="_blank">Cetak Transaksi</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Baju</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->nama }}</td>
                <td>{{ $transaction->jenis_baju }}</td>
                <td>{{ $transaction->harga }}</td>
                <td>{{ $transaction->tanggal }}</td>
                <td>
                    <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

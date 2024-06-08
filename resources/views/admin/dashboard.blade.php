@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Admin</h5>
                    <p class="card-text">{{ $adminCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text">{{ $transactionCount }}</p>
                </div>
            </div>
        </div>
        <!-- Tambahkan widget lainnya jika diperlukan -->
    </div>
</div>
@endsection

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Transaksi</h2>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Baju</th>
                <th>Harga</th>
                <th>Tanggal</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman user</title>
</head>
<body>
    <a href="{{ route('user.create') }}">Tambah data</a>
    <table>
        <thead>
            <tr>
                <th>nama</th>
                <th>harga</th>
                <th>tgl pemesanan</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($data_order as $o)
                <tr>
                    <td>{{ $o->nama_produk }}</td>
                    <td>{{ $o->harga }}</td>
                    <td>{{ $o->tanggal_pemesanan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
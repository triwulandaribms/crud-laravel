<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-secondary" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#">NavBar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    
  <div class="my-3 p-3 bg-body rounded shadow-sm">

<table class="table table-success table-striped">
  <thead>
      <tr class="table-success">
          <th>KODE PRODUK</th>
          <th>ID TRANSAKSI</th>
          <th>NAMA PRODUK</th>
          <th>KATEGORI PRODUK</th>
          <th>JUMLAH BELI</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($data_tampil as $laporan)
      <tr class="table-success">
          <td>{{ $laporan->kode_produk }}</td>
          <td>{{ $laporan->id_transaksi }}</td>
          <td>{{ $laporan->nama_produk }}</td>
          <td>{{ $laporan->kategori_produk }}</td>
          <td>{{ $laporan->jumlah_beli }}</td>
      </tr>
      @endforeach
  </tbody>
</table>

    <div class="mb-3">
      <a href="{{ route('exportToExcel') }}" class="btn btn-success">Export to Excel</a>
      <a href="{{ route('exportToPdf') }}" class="btn btn-danger">Export to PDF</a>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
  
</body>
</html>
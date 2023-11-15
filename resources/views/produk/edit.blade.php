
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

  <main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">

        <form action="{{ route('produk.update', $data_produk->kode_produk) }}" method="post">
            @csrf
            @method('PUT')
        
            <div class="mb-3 row">
                <label for=""  class="col-sm-2 col-form-label">KODE</label>
                <div class="col-sm-10">
                    <input type="text" name="kode_produk" value="{{ $data_produk->kode_produk }}" class="form-control bg-light text-dark" id="kode">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_produk" value="{{ $data_produk->nama_produk }}" class="form-control bg-light text-dark" id="nama">
                </div>
            </div>
                
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">KATEGORI</label>
                <div class="col-sm-10">
                    <input type="text" name="kategori_produk" value="{{ $data_produk->kategori_produk }}" class="form-control bg-light text-dark" id="kategori">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">HARGA</label>
                <div class="col-sm-10">
                    <input type="number" name="harga" value="{{ $data_produk->harga }}" class="form-control bg-light text-dark" id="harga">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">STOK</label>
                <div class="col-sm-10">
                    <input type="number" name="stok" value="{{ $data_produk->stok }}" class="form-control bg-light text-dark" id="stok">
                </div>
            </div>

            <div class="mb-3 row text-center">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary mx-auto" value="SIMPAN">
                </div>
            </div>
        </form>

    </div>
  </main>
</body>
</html>
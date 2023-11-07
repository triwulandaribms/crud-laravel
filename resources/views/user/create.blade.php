
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
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
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" name="id_user" class="form-control bg-light text-dark" id="id">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control bg-light text-dark" id="nama">
                </div>
            </div>
            
            
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control bg-light text-dark" id="email">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">PASSWORD</label>
                <div class="col-sm-10">
                    <input type="text" name="password" class="form-control bg-light text-dark" id="password">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
  
</body>
</html>
    
       
   



    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="">Marketing</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Permintaan Barang
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('permintaanbrg.create')}}">Create</a></li>
              <li><a class="dropdown-item" href="{{route('permintaanbrg.index')}}">Show Data</a></li>
              <li><a class="dropdown-item" href="{{route('logistic')}}">Data Logistik -Dina</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Pesanan
            </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="{{route('pesanan')}}">Create Pesanan</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('listpesanan')}}">List Pesanan</a>
            </li>
          </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('promosi')}}">Promosi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('kenaikan')}}">Kenaikan Pangkat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('hasilpenjualan')}}">Laporan Hasil Penjualan -Finance</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
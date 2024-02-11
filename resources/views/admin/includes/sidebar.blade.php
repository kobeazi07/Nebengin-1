<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item"> <a class="nav-link" href="{{route('HalamanUser')}}"> Pengguna </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('HalamanPostingan')}}"> Postingan </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('HalamanMetopem')}}"> Metode Pembayaran</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('HalamanAlasan')}}"> Alasan Pembatalan</a></li>
                    <!-- menu sidebar 2 -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-folder menu-icon"></i>
              <span class="menu-title">Taxi </span>
              <i class="menu-arrow"></i>
          </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#"> Peraturan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanUser')}}"> Pengguna </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanKendaraan')}}">Tipe Kendaraan </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanRegion')}}">Daerah / Area </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanRute')}}">rute </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanTarif')}}">Tarif Rute </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanTrip')}}">Trip </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('RiwayatTrip')}}">Riwayat Trip </a></li>
              </ul>
            </div>
          </li>
          <!-- akhir menu sidebar 2 -->

        <!-- menu sidebar 3 -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pickup" aria-expanded="false" aria-controls="pickup">
              <i class="icon-folder menu-icon"></i>
              <span class="menu-title"> PickUp </span>
              <i class="menu-arrow"></i>
          </a>
            <div class="collapse" id="pickup">
              <ul class="nav flex-column sub-menu"> 
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanPickup')}}"> Tipe Mobil Pickup</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanPickupTarif')}}"> Tarif Mobil Pickup</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanJenisMotor')}}"> Data Jenis Motor</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('HalamanPickupTrip')}}"> Data Trip Pickup</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('RiwayatPickupTrip')}}"> Riwayat Trip Pickup</a></li>
              </ul>
            </div>
          </li>
        <!-- akhir menu sidebar 3 -->
        </ul>
      </nav>
      <!-- partial -->
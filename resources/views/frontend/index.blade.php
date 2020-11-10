@extends('layout.main')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/"><img src="{{ asset('image/tangkab.png') }}" width="45"> Desa Sumurbandung</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Profil Desa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Sejarah Desa</a>
                        <a class="dropdown-item" href="#">Profil Wilayah Desa</a>
                        <a class="dropdown-item" href="#">Arti Lambang Desa</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Pemerintah Desa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/visimisi">Visi Misi</a>
                        <a class="dropdown-item" href="/pemerintah">Pemerintah Desa</a>
                        <a class="dropdown-item" href="/bpd">Badan Permusyawaratan Desa</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        LemMas
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/lpm">LPM</a>
                        <a class="dropdown-item" href="#">Karang Taruna</a>
                        <a class="dropdown-item" href="/pkk">PKK</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Data Desa

                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Data Wilayah Adminsitratif</a></li>
                          <li><a class="dropdown-item" href="#">Data Pendidikan Dalam KK</a></li>
                          <li><a class="dropdown-item" href="#">Data Pendidikan Ditempuh</a></li>
                          <li><a class="dropdown-item" href="#">Data Pekerjaan</a></li>
                           <li><a class="dropdown-item" href="#">Data Jenis Kelamin</a></li>
                          <li><a class="dropdown-item" href="#">Data Golongan Darah</a></li>
                          <li><a class="dropdown-item" href="#">Data Kelompok Umur</a></li>
                          <li><a class="dropdown-item" href="#">Data Perkawinan</a></li>
                          <li><a class="dropdown-item" href="#">Transparasi Keuangan</a></li>
                        </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Defnaker Desa</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/defnaker">Lowongan Pekerjaan</a></li>
                          <li><a class="dropdown-item" href="#">PPID</a></li>
                        </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
				</li>  
            </ul>
        </div>
 
    </div>
    
</nav>


    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{ asset('image/bg_header.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>DESA SUMURBANDUNG</h5>
                <p>KECAMATAN JAYANTI KABUPATEN TANGERANG</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('image/bg_header1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('image/bg_header.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


@yield('berita')

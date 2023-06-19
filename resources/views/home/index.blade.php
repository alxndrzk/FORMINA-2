@extends('layouts.app')

@section('content')
    <div class="hero_area">

        <!-- slider section -->
        <section class=" slider_section position-relative">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slider_item-box">
                            <div class="slider_item-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="slider_item-detail">
                                                <div>
                                                    <h1>
                                                        Selamat Datang <br />
                                                        di Toko Pakaian Formina
                                                    </h1>
                                                    <p>
                                                        Penuhi Kebutuhan Pakaian Anda Hanya Di Toko Formina. Menyediakan
                                                        Segala Jenis Pakaian
                                                        Berkualitas Dengan Harga Yang Terjangkau
                                                    </p>
                                                    <div class="d-flex">
                                                        <a href="{{ route('home.katalog') }}"
                                                            class="text-uppercase custom_orange-btn mr-3">
                                                            Beli Sekarang
                                                        </a>
                                                        <a href="#footer" class="text-uppercase custom_dark-btn">
                                                            Tentang Kami
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="slider_img-box">
                                                <div>
                                                    <img src="https://png.pngtree.com/png-clipart/20221021/original/pngtree-female-customer-choosing-clothes-in-fashion-store-png-image_8710910.png"
                                                        alt="" class="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- layanan -->

    <section class="service_section layout_padding ">
        <div class="container">
            <h2 class="custom_heading">Layanan Kami</h2>
            <p class="custom_heading-text">
                Keunggulan Pembelian Di Toko Pakaian Formina
            </p>
            <div class=" layout_padding2">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/images/logo kualitas.png') }}"
                            alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Produk Berkualitas</h5>
                            <p class="card-text">
                                Produk yang kami jual memiliki bahan yang berkualitas.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ 'storage/images/murah2.png' }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Harga Terjangkau</h5>
                            <p class="card-text">
                                Dapatkan produk berkualitas terbaik dengan harga yang terjangkau.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/images/diskon.png') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Banyak Diskon</h5>
                            <p class="card-text">
                                Temukan banyak potongan harga disetiap transaksi yang dilakukan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end layanan section -->

    <!-- fruits section -->

    <section class="fruit_section">
        <div class="container">
            <h2 class="custom_heading">Produk</h2>
            <p class="custom_heading-text">
                Tersedia berbagai kategori produk
            </p>
            @for ($i = 0; $i <= 2; $i++)
                <div class="row layout_padding2">
                    <div class="col-md-8">
                        <div class="fruit_detail-box">
                            <h3>
                                {{ $products[$i]->product_name }}
                            </h3>
                            <p class="mt-4 mb-5">
                                "{{ $products[$i]->description }}"
                            </p>
                            <div>
                                <a href="{{ route('product.detail', $products[$i]->id) }}" class="custom_dark-btn">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="fruit_img-box d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $products[$i]->photo) }}" alt="Foto" class=""
                                width="250px" />
                        </div>
                    </div>
                </div>
            @endfor



        </div>
    </section>

    <!-- end fruits section -->

    <!-- tasty section -->
    <section class="tasty_section">
        <div class="container_fluid">
            <h2>
                FORMINA
            </h2>
        </div>
    </section>

    <!-- end tasty section -->

    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <h2 class="custom_heading">Tim Pengembang</h2>
            <p class="custom_heading-text">
                Website ini masih dalam tahap pengembangan
            </p>
            <div>
                <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="client_container layout_padding2">
                                <div class="client_img-box">
                                    <img src="{{ asset('storage/images/client.png') }}" alt="" />
                                </div>
                                <div class="client_detail">
                                    <h3>
                                        Ciko Tegar Saputra
                                    </h3>
                                    <p class="custom_heading-text">
                                        Perkenalkan saya adalah mahasiswa Program Studi Sistem Informasi Fakultas Ilmu
                                        Komputer Universitas
                                        Jember angkatan 2021 <br />
                                        NIM : 212410101041 <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client_container layout_padding2">
                                <div class="client_img-box">
                                    <img src="{{ asset('storage/images/client.png') }}" alt="" />
                                </div>
                                <div class="client_detail">
                                    <h3>
                                        Alexander Dwi Putra Gultom
                                    </h3>
                                    <p class="custom_heading-text">
                                        Perkenalkan saya adalah mahasiswa Program Studi Sistem Informasi Fakultas Ilmu
                                        Komputer Universitas
                                        Jember angkatan 2021 <br />
                                        NIM : 212410101045 <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client_container layout_padding2">
                                <div class="client_img-box">
                                    <img src="{{ asset('storage/images/client.png') }}" alt="" />
                                </div>
                                <div class="client_detail">
                                    <h3>
                                        Muhadzdzib Dzaky Zaidan
                                    </h3>
                                    <p class="custom_heading-text">
                                        Perkenalkan saya adalah mahasiswa Program Studi Sistem Informasi Fakultas Ilmu
                                        Komputer Universitas
                                        Jember angkatan 2021 <br />
                                        NIM : 212410101054 <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom_carousel-control">
                        <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button"
                            data-slide="prev">
                            <span class="" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls-2" role="button"
                            data-slide="next">
                            <span class="" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

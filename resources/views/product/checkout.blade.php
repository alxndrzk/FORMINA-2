@extends('layouts.app')

@section('content')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-xl-8 col-lg-8 mb-4">
                    <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Checkout -->
                        <div class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Check Out</h5>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <p class="mb-0">Nama Depan</p>
                                        <div class="form-outline">
                                            <input value="{{ $profile->name }}" type="text" id="typeText"
                                                placeholder="Type here" class="form-control" readonly />
                                        </div>
                                    </div>



                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Nomor Telepon</p>
                                        <div class="form-outline">
                                            <input type="tel" id="typePhone" value="{{ $profile->phone_number }}"
                                                class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Email</p>
                                        <div class="form-outline">
                                            <input type="email" id="typeEmail" value="{{ Auth::user()->email }}"
                                                class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <p><a href="">Ubah</a>Pada bagian profile</p>
                                </div>

                                <hr class="my-4" />

                                <h5 class="card-title mb-3">Metode Pengiriman</h5>

                                <div class="row mb-3">
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default checked radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="delivery"
                                                    id="delivery1" value="1" checked />
                                                <label class="form-check-label" for="delivery1">
                                                    JnE <br />
                                                    <small class="text-muted">Estimasi pengiriman 2-3 hari </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="delivery"
                                                    id="delivery2" value="2" />
                                                <label class="form-check-label" for="delivery2">
                                                    Si Cepat Express <br />
                                                    <small class="text-muted">Estimasi pengiriman 3-4 hari </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="delivery"
                                                    id="delivery3" value="3" />
                                                <label class="form-check-label" for="delivery3">
                                                    JnT <br />
                                                    <small class="text-muted">Estimasi pengiriman 4-7 hari </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <p class="mb-0">Alamat</p>
                                        <div class="form-outline">
                                            <input type="text" id="typeText" placeholder="Type here"
                                                class="form-control" value="{{ $profile->address }}" name="address" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="harga_sewa">Bukti Transaksi</label>
                                        <input type="file" class="form-control" name="photoTranfer">
                                    </div>

                                    <div class="float-end">
                                        <a class="btn btn-light border" href="keranjang.html" role="button">Kembali</a>
                                        <button class="btn btn-primary" role="submit">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <input type="number" name="totalPayment" value="{{ $total_payment }}" hidden>
                            <!-- Checkout -->
                    </form>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end ">
                <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                    <h6 class="mb-3">Summary</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total Harga:</p>
                        <p class="mb-2">Rp{{ number_format($total_payment, 0, ',', '.') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Biaya Pengiriman:</p>
                        <p class="mb-2">+ Rp30.000</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Biaya Layanan:</p>
                        <p class="mb-2 text-success">+ Rp2.000</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total Keseluruhan:</p>
                        <p class="mb-2 fw-bold">Rp{{ number_format($total_payment + 32000, 0, ',', '.') }}</p>
                    </div>

                    <hr />
                    <h6 class="text-dark my-4">Keranjang Anda</h6>

                    @foreach ($shopcart as $shopitem)
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3 position-relative">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                                    {{ $shopitem->quantity }}
                                </span>
                                <img src="{{ asset('storage/' . $shopitem->fkProduct->photo) }}"
                                    style="height: 96px; width: 96x;" class="img-sm rounded border" />
                            </div>
                            <div class="">
                                <a href="#" class="nav-link">
                                    {{ $shopitem->fkProduct->product_name }}
                                </a>
                                <div class="price text-muted">Total:
                                    Rp{{ number_format($shopitem->quantity * $shopitem->fkProduct->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>

    </section>
@endsection

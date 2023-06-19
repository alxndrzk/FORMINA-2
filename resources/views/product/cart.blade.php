@extends('layouts.app')

@section('content')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-12">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Keranjang Anda</h4>
                            @foreach ($carts as $cart)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="{{ asset('storage/' . $cart->fkProduct->photo) }}"
                                                    class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#"
                                                        class="nav-link">{{ $cart->fkProduct->product_name }}</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="">
                                            <select style="width: 100px;" class="form-select me-4" disabled>
                                                <option>{{ $cart->quantity }}</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <h6 class="h6"></h6>
                                            Rp.{{ number_format($cart->fkProduct->price * $cart->quantity, 2, ',', '.') }}
                                            <br />
                                            <small class="text-muted text-nowrap">
                                                Rp.{{ number_format($cart->fkProduct->price, 2, ',', '.') }}
                                                /
                                                buah</small>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $cart->id }}"
                                                class="btn btn-light border text-primary icon-hover-danger">Ubah jumlah</a>
                                            <a href="{{ route('cart.destroy', $cart->id) }}"
                                                class="btn btn-light border text-danger icon-hover-danger">
                                                Hapus</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- ubah Modal -->
                                <div class="modal fade" id="exampleModal{{ $cart->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah jumlah
                                                    {{ $cart->fkProduct->product_name }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="number" name="quantity" class="form-control"
                                                        value="{{ $cart->quantity }}">
                                                    <input type="number" name="cartId" value="{{ $cart->id }}"
                                                        hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Ubah Jumlah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card-body">
                                <div class="mt-1">
                                    <a type="button" class="btn btn-success btn-lg w-100 shadow-0 mb-2"
                                        href="{{ route('checkout.before') }}">Check Out</a>
                                </div>
                            </div>


                            {{-- <div class="row gy-3 mb-4">
                                <div class="col-lg-5">
                                    <div class="me-lg-5">
                                        <div class="d-flex">
                                            <img src="images/baju4-removebg-preview.png" class="border rounded me-3"
                                                style="width: 96px; height: 96px;" />
                                            <div class="">
                                                <a href="#" class="nav-link">AIRism Kaos Polo Pique Lengan Pendek</a>
                                                <p class="text-muted">T-Shirts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                    <div class="">
                                        <select style="width: 100px;" class="form-select me-4">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <text class="h6">Rp.300.000 / buah</text> <br />
                                        <!-- <small class="text-muted text-nowrap"> Rp.300.000 / buah </small> -->
                                    </div>
                                </div>
                                <div
                                    class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                    <div class="float-md-end">
                                        <a href="#" class="btn btn-light border text-danger icon-hover-danger">
                                            Hapus</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-lg-5">
                                    <div class="me-lg-5">
                                        <div class="d-flex">
                                            <img src="images/sweater2-removebg-preview.png" class="border rounded me-3"
                                                style="width: 96px; height: 96px;" />
                                            <div class="">
                                                <a href="#" class="nav-link">Sweater Rajut 3D Mesh Lengan Half Mame
                                                    Kurogouchi</a>
                                                <p class="text-muted">Sweater</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                    <div class="">
                                        <select style="width: 100px;" class="form-select me-4">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <text class="h6">Rp.350.000 / buah</text> <br />
                                        <!-- <small class="text-muted text-nowrap"> Rp.350.000 / buah </small> -->
                                    </div>
                                </div>
                                <div
                                    class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                    <div class="float-md-end">
                                        <a href="#" class="btn btn-light border text-danger icon-hover-danger">
                                            Hapus</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mt-1">
                                        <a type="button" class="btn btn-success btn-lg w-100 shadow-0 mb-2"
                                            href="checkout.html">Check Out</a>
                                    </div>
                                </div>

                            </div> --}}
                        </div>

                    </div>
                </div>
                <!-- cart -->
            </div>
        </div>

    </section>
    <!-- cart + summary -->
@endsection

@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
            <strong class="d-block py-3">Katalog Produk </strong>
        </header>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <div class="card w-100 my-2 shadow-2-strong">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" />
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex flex-row">
                                <h5 class="card-title">Rp. {{ number_format($product->price, 2, ',', '.') }}</h5>
                            </div>
                            <p class="card-text">{{ $product->product_name }}</p>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="{{ route('product.detail', $product->id) }}"
                                    class="btn btn-primary shadow-0 me-1">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    @endsection

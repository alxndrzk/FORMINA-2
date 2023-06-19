@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="{{ asset('storage/' . $product->photo) }}" />
                        </a>
                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product->product_name }}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>Stock :</span>
                            <span class="text-success ms-2">{{ $product->stock }}</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5">Rp.{{ number_format($product->price, 2, ',', '.') }}</span>
                            <span class="text-muted">/buah</span>
                        </div>

                        <p>
                            {{ $product->description }}.
                        </p>



                        <hr />

                        <form action="{{ route('cart.store') }}" method="POST">
                            <div class="row mb-4">
                                <div class="col-md-4 col-6 mb-3">
                                    <label class="mb-2 d-block">Jumlah</label>
                                    <select name="quantity" style="width: 100px;" class="form-select me-4">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <input type="number" value="{{ $product->id }}" name="productId" hidden>
                            @csrf
                            <button type="submit" class="btn btn-primary shadow-0"> <i
                                    class="me-1 fa fa-shopping-basket"></i> masukan keranjang </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection

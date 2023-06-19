@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6> -->
                <button type="button" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#addModal" style="margin-left: 70vw;"><i></i> Tambah Produk</button>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <!-- isi -->
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img src="{{ asset('storage/' . $product->photo) }}" alt="" height="120"
                                            width="120">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="btn-sm btn btn-success shadow-sm mr-2"
                                            data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}">
                                            <i class="fa-sm text-white-50"></i> Edit
                                        </button>
                                        <a href="{{ route('product.destroy', $product->id) }}"
                                            class="btn-sm btn btn-danger shadow-sm">
                                            <i class="fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editModalLabel{{ $product->id }}">Edit
                                                    Produk
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="content">

                                                    <!-- DataTales Example -->

                                                    <div class="card-body">
                                                        <form action="{{ route('product.update', $product->id) }} "
                                                            method='POST' enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama_mobil">Nama Produk</label>
                                                                <input type="text" name="produkName" class="form-control"
                                                                    value="{{ $product->product_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_sewa">Stok</label>
                                                                <input type="text" name="stock" class="form-control"
                                                                    value="{{ $product->stock }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_sewa">Harga</label>
                                                                <input type="text" name="price" class="form-control"
                                                                    value="{{ $product->price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_sewa">Deskripsi</label>
                                                                <input type="text" name="description"
                                                                    class="form-control"
                                                                    value="{{ $product->description }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_sewa">Foto</label>
                                                                <input type="file" name="photo" class="form-control"
                                                                    value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <button data-bs-dismiss="modal"type="button"
                                                                    class="btn btn-danger">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>




                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Modal Add Produk --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Tambah
                            Produk
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="content">

                            <!-- DataTales Example -->

                            <div class="card-body">
                                <form action="{{ route('product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_mobil">Nama Produk</label>
                                        <input type="text" name="produkName" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_sewa">Stok</label>
                                        <input type="text" name="stock" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_sewa">Harga</label>
                                        <input type="text" name="price" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_sewa">Deskripsi</label>
                                        <input type="text" name="description" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_sewa">Foto</label>
                                        <input type="file" name="photo" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <button data-bs-dismiss="modal"type="button"
                                            class="btn btn-danger">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

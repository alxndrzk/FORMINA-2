@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 ">
            <!-- <div class="card-header py-3">
                                                                                                            <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                                                                                                            <a href="addproduk.html" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-left: 70vw;"><i></i> Tambah Produk</a>
                                                                                                            
                                                                                                        </div> -->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <!-- isi -->
                        <tbody>
                            @foreach ($detail as $detail_item)
                                <tr>
                                    <td>{{ $detail_item->id }}</td>
                                    <td>{{ $detail_item->fkProduct->product_name }}</td>
                                    <td>{{ $detail_item->quantity }}</td>
                                    <td>{{ $detail_item->fkProduct->price }}</td>
                                    <td>{{ $detail_item->fkProduct->price * $detail_item->quantity }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('transaksi.index') }}" class="btn-sm btn btn-danger shadow-sm"><i
                        class="fa-sm text-white-50"></i>Kembali</a>
                <button class="btn-sm btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="fa-sm  text-white-50"></i>Bukti Tranfer</button>
                <h6 class="text-right">Total Keseluruhan : Rp{{ number_format($transaction->total_payment, 0, ',', '.') }}
                </h6>
            </div>


        </div>

        <!-- Modal konfirmation -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Tranfer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $transaction->photo_tranfer) }}" alt=""
                            style="max-width: 400px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="{{ route('transaksi.update', $transaction->id) }}" class="btn btn-primary">Konfirmasi
                            Pembelian</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

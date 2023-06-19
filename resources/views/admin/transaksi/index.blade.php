@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>

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
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Jenis Pengiriman</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <!-- isi -->
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->fkUser->fkProfiles->name }}</td>
                                    <td>{{ $transaction->fkUser->fkProfiles->phone_number }}</td>
                                    <td>{{ $transaction->fkUser->fkProfiles->address }}</td>
                                    <th>{{ $transaction->fkDelivery->delivery_service }}</th>
                                    <td>Rp.{{ number_format($transaction->total_payment, 0, ',', '.') }}</td>
                                    @if ($transaction->status == 'paid')
                                        <td style="background: green">{{ $transaction->status }}</td>
                                    @else
                                        <td>{{ $transaction->status }}</td>
                                    @endif

                                    <td class="d-flex justify-content-center"><a
                                            href="{{ route('transaksi.detail', $transaction->id) }}"
                                            class="btn-sm btn btn-success shadow-sm "><i class="fa-sm text-white-50"></i>
                                            Lihat
                                            Detail</a> </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

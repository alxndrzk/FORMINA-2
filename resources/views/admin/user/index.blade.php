@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>

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
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <!-- isi -->
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->fkRoles->role_name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('user.profile', $user->id) }}"
                                            class="btn-sm btn btn-primary shadow-sm">
                                            <i class="fa-sm text-white-50"></i> Lihat Profile
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

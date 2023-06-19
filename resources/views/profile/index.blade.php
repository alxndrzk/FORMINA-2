@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span>
                    </span></div>
            </div>
            @if ($profile == null)
                <div class="col-md-9 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profil Pengguna</h4>
                        </div>
                        <form action="{{ route('profile.store') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nama </label>
                                    <input type="text" class="form-control" name="name" value=""
                                        placeholder="Isikan nama">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="nomerTelephone"
                                        placeholder="Isi nomer telepon" value="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="@gmail.com"
                                        value="{{ Auth::user()->email }}" readonly>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Alamat</label>
                                    <input type="text" class="form-control" placeholder="Isikan alamat" name="address"
                                        value="">
                                </div>

                            </div>

                            <div class="mt-3 text-center"><button class="btn btn-primary profile-button"
                                    type="sumbit">Simpan</button></div>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-md-9 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profil Pengguna</h4>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nama </label>
                                    <input type="text" class="form-control" value="{{ $profile->name }}"
                                        placeholder="Isikan nama" name="name">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nomor Telepon</label>
                                    <input type="text" class="form-control" placeholder="Isi nomer telepon"
                                        value="{{ $profile->phone_number }}" name="nomerTelephone">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="@gmail.com"
                                        value="{{ Auth::user()->email }}">
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Alamat</label>
                                    <input type="text" class="form-control" placeholder="Isikan alamat"
                                        value="{{ $profile->address }}" name="address">
                                </div>

                            </div>

                            <div class="mt-3 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-primary">
                <div class="card-header"><b>{{ __('Dashboard') }}</b></div>
 
                <div class="card-body bg-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <?php
                        $user_id = Auth::user()->id;
                        $role_id = Auth::user()->role_id;
                        

                        $data = DB::table('users')
                            ->leftJoin('katalog_role', 'users.role_id', 'katalog_role.id')
                            ->select('katalog_role.deskripsi as role_user')
                            ->where('users.id', $user_id)
                            ->first();
                    ?>
                    {{ __('Anda berhasil login sebagai ') }} {{ $data->role_user }}

                    <!--Penjual-->
                    <@if($role_id == 1)
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <center><div class="card-header text-white bg-success">Input Produk</div></center>
 
                                    <div class="card-body">
                
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-warning"><i class="fa-solid fa-arrow-up-from-bracket"></i> Input</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card p-2">
                                    <center><div class="card-header text-white bg-success">Report Input Produk</div></center>
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-warning"><i class="fa-solid fa-check"></i> Report</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!--Pembeli-->
                    <@if($role_id == 2)
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-dark">Status Pembayaran</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-dark">Status Pengiriman</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!--Pengiriman-->
                    @if($role_id==3)
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-danger">Alamat Kirim</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-danger">Status Pengiriman</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!--Penerima Pesananan-->
                    @if($role_id==4)
                    <div class="row mt-2">
                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-secondary">Admin Penerima</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('input_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card p-2">
                                    <div class="card-header text-white bg-secondary">Waktu Penerima Pesanan</div>
 
                                    <div class="card-body">
                                        
                                    </div>
                                    <a href="{{ url('report_produk') }}" class="btn btn-sm text-white btn-warning">Lihat</a>
                                </div>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


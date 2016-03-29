@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Kategori Produk</h1>
            </div>
            @if(Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Kategori Produk
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ URL::to('tambahKategoriProduk') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Nama Kategori Produk</label>
                                        <input class="form-control" name="namaKategoriProduk"
                                               value="{{ $kategoriProduk->Kp_NamaKategori }}"
                                               required="">
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="reset" class="btn btn-danger"
                                            onclick="top.location.href=''">Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
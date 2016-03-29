@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Customer</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Customer
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ URL::to('tambahCustomer') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="namaCustomer"
                                               value="{{ $customer->Cus_NamaCustomer }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input class="form-control" name="namaToko"
                                               value="{{ $customer->Cus_NamaToko }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Contact</label>
                                        <input class="form-control" name="nomorContact"
                                               value="{{ $customer->Cus_NomorContact }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="{{ $customer->Cus_Email }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Customer</label>
                                        <select class="form-control" name="tipe">
                                            @for($i=0; $i < count($tipe); $i++)
                                                @if ( $customer->Cus_Tipe === $tipe[$i] )
                                                    <option selected="selected"
                                                            value='{{$tipe[$i] }}'> {{ $tipe[$i] }}</option>
                                                @else
                                                    <option value='{{ $tipe[$i] }}'> {{ $tipe[$i] }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="reset" class="btn btn-danger"
                                            onclick="top.location.href=''">Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@stop
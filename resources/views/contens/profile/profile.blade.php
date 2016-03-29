@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile Toko</h1>
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
                        Profile Toko
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="manageProfile" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idProfile" value="{{ $profile->Prof_Id }}">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="nama" value="{{ $profile->Prof_Nama }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input class="form-control" name="telepon" value="{{ $profile->Prof_Telepon }}">
                                    </div>
                                    <div class="form-group">
                                        <label>PIN BB</label>
                                        <input class="form-control" name="bbm" value="{{ $profile->Prof_Bbm }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="{{ $profile->Prof_Email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input class="form-control" name="website" value="{{ $profile->Prof_Website }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat"
                                                  class="form-control">{{ $profile->Prof_Alamat }}</textarea>
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
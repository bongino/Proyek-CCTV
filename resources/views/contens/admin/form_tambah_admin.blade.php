@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Admin</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Admin
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ URL::to('tambahAdmin') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" name="nama" value="{{ $admin->Adm_Nama }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" value="{{ $admin->Adm_Username }}"
                                               required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" name="level">
                                            @for($i=0; $i < count($level); $i++)
                                                @if ( $admin->Adm_Level === $level[$i] )
                                                    <option selected="selected"
                                                            value='{{$level[$i] }}'> {{ $level[$i] }}</option>
                                                @else
                                                    <option value='{{ $level[$i] }}'> {{ $level[$i] }}</option>
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
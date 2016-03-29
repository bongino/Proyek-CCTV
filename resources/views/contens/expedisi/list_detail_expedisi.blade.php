@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Expedisi</h1>
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
                        <div class="row">
                            <div class="col-lg-10">List Expedisi</div>
                            <div class="col-lg-2"><a class="btn btn-primary btn-sm"
                                                     href="{{URL::to('tambahDetailExpedisi')}}"><i
                                            class="fa fa-plus fa-fw"></i>Tambah</a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nama Expedisi</th>
                                    <th>Kota Tujuan</th>
                                    <th>Via</th>
                                    <th>Harga</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listDetailExpedisi as $expedisi) {
                                ?>
                                <tr>
                                    <td><?php echo $expedisi->E_NamaExpedisi ?></td>
                                    <td><?php echo $expedisi->Kt_Nama ?></td>
                                    <td><?php echo $expedisi->De_NamaVia ?></td>
                                    <td><?php echo $expedisi->De_Harga ?></td>
                                    <td style="text-align: center">
                                        <a href="{{ URL::to('editDetailExpedisi',$expedisi->De_Id)}}"
                                           class="btn btn-success btn-xs">Edit</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
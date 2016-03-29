@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Admin</h1>
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
                            <div class="col-lg-10">List Admin</div>
                            <div class="col-lg-2"><a class="btn btn-primary btn-sm" href="{{URL::to('tambahAdmin')}}"><i
                                            class="fa fa-plus fa-fw"></i>Tambah</a></div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listAdmin as $admin) {
                                ?>
                                <tr>
                                    <td><?php echo $admin->Adm_Nama ?></td>
                                    <td><?php echo $admin->Adm_Username ?></td>
                                    <td><?php echo $admin->Adm_Level ?></td>
                                    <td style="text-align: center">
                                        <?php
                                        if ($admin->Adm_Active === '1') {
                                        ?>
                                        <span class="btn btn-success btn-xs">Aktif</span></td>
                                    <?php
                                    } else {
                                    ?>
                                    <span class="btn btn-danger btn-xs">Non Aktif</span></td>
                                    <?php
                                    }
                                    ?>
                                    <td style="text-align: center">
                                        <a href="{{ URL::to('editAdmin',$admin->Adm_Id)}}"
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
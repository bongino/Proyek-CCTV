@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Customer</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Customer
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ URL::to('editAdmin') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idAdmin" value="{{ $admin->Adm_Id }}">
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
                                        <input class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" name="level">
                                            @for($i=0; $i < count($level); $i++)
                                                @if ( $admin->Adm_Level === $level[$i] )
                                                    <option selected="selected"
                                                            value='{{ $level[$i] }}'> {{ $level[$i] }}</option>
                                                @else
                                                    <option value='{{ $level[$i] }}'> {{ $level[$i] }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Active &nbsp;&nbsp;&nbsp;</label>
                                        <?php $active = ['1', '0']?>
                                        @for ( $i=0; $i < count($active); $i++ )
                                            <?php $value = 'Yes';?>
                                            @if ( $active[$i] === '0')
                                                <?php $value = 'No';?>
                                            @endif
                                            @if( $active[$i] === $admin->Adm_Active )
                                                <label class="radio-inline">
                                                    <input id="active" type="radio" checked="checked"
                                                           value="{{ $active[$i] }}"
                                                           name="active">
                                                    {{ $value }}
                                                </label>
                                            @else
                                                <label class="radio-inline">
                                                    <input id="active" type="radio" value="{{ $active[$i] }}"
                                                           name="active">
                                                    {{ $value }}
                                                </label>
                                            @endif
                                        @endfor

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
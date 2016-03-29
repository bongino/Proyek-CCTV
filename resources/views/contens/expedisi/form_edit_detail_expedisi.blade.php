@extends('layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Detail Expedisi</h1>
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
                        Edit Detail Expedisi
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ URL::to('editDetailExpedisi') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idDetailExpedisi" value="{{ $detailExpedisi->De_Id }}">
                                    <div class="form-group">
                                        <label>Nama Expedisi</label>
                                        <select name="idExpedisi" class="form-control">
                                            @foreach($listExpedisi as $expedisi)
                                                @if ( $detailExpedisi->De_IdExpedisi === $expedisi->E_Id )
                                                    <option selected="selected"
                                                            value="{{ $expedisi->E_Id }}"> {{ $expedisi->E_NamaExpedisi }} </option>
                                                @else
                                                    <option value="{{ $expedisi->E_Id }}"> {{ $expedisi->E_NamaExpedisi }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota Tujuan</label>
                                        <select name="idKota" class="form-control">
                                            @foreach($listKota as $kota)
                                                @if ( $detailExpedisi->De_IdKota === $kota->Kt_Id )
                                                    <option selected="selected"
                                                            value="{{ $kota->Kt_Id }}"> {{ $kota->Kt_Nama }} </option>
                                                @else
                                                    <option value="{{ $kota->Kt_Id }}"> {{ $kota->Kt_Nama }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>VIA / Jalur</label>
                                        <select name="via" class="form-control">
                                            @for($i =0; $i < count($via); $i++)
                                                @if ( $detailExpedisi->De_NamaVia === $via[$i] )
                                                    <option selected="selected"
                                                            value={{ $via[$i] }} > {{ $via[$i] }}</option>
                                                @else
                                                    <option value="{{ $via[$i] }}"> {{ $via[$i] }} </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input class="form-control" name="harga" value="{{$detailExpedisi->De_Harga}}"
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
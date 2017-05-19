@extends('layouts.master')

@section('head')

@stop

@section('title')
    Lihat Laporan
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Lihat Laporan</a>
    </li>
@stop

@section('content')
<?php if(Auth::user()->roles_id == 1){ $readonly = "readonly"; $disabled = "disabled"; }else{ $readonly = ""; $disabled = ""; } ?>
<div class="row">
    <div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box" style="background-color: #d64635;">
	        <div class="portlet-title">
	            <div class="caption">
                        <i class="icon-calendar" style="color:white;"></i>
	                <span class="caption-subject font-white sbold uppercase">Lihat Laporan Salah Laku Pelajar</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	        	<div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'PATCH', 'action'=>'PensyarahController@editLaporan', 'files'=>true]) !!}
	                	<div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Semester</label>
                                    <div class="col-md-8">
                                            <input type="text" name="semester" class="form-control input-line" id="semester" value="{{ $laporan->semester }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Sesi</label>
                                    <div class="col-md-8">
                                            <input type="text" name="sesi" class="form-control input-line" id="sesi" value="{{ $laporan->sesi }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Pelajar</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_pelajar" class="form-control input-line" id="nama_pelajar" value="{{ $laporan->nama_pelajar }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">No Tentera / No. K/P</label>
                                    <div class="col-md-8">
                                            <input type="text" name="no_tentera_kp" class="form-control input-line" id="no_tentera_kp" value="{{ $laporan->no_tentera_kp }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Pengambilan</label>
                                    <div class="col-md-8">
                                            <input type="text" name="pengambilan" class="form-control input-line" id="pengambilan" value="{{ $laporan->pengambilan }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Mata Pelajaran dan Kod</label>
                                    <div class="col-md-8">
                                            <input type="text" name="mata_pelajaran_dan_kod" class="form-control input-line" id="mata_pelajaran_dan_kod" value="{{ $laporan->mata_pelajaran_dan_kod }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Bilik Kuliah/Dewan Kuliah/Makmal</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_bilik_kuliah" class="form-control input-line" id="nama_bilik_kuliah" value="{{ $laporan->nama_bilik_kuliah }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Tarikh dan Masa</label>
                                    <div class="col-md-8">
                                            <input type="text" name="tarikh_dan_masa" class="form-control input-line" id="tarikh_dan_masa" value="{{ $laporan->tarikh_dan_masa }}" {{ $readonly }}>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Penasihat Akademik(PA)</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_pa" class="form-control input-line" id="nama_pa" value="{{ $laporan->nama_pa }}" {{ $readonly }}>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option1" type="checkbox" value="1" name="salah_laku_1" <?php if($laporan->salah_laku_1 == 1){ echo "checked"; } ?> {{ $disabled }}>
                                        </div>
                                    </div>
                                    <label for="option1" class="col-md-8 control-label">Tidak hadir kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan tanpa sebab munasabah</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option2" type="checkbox" value="2" name="salah_laku_2" <?php if($laporan->salah_laku_2 == 2){ echo "checked"; } ?> {{ $disabled }}>
                                        </div>
                                    </div>
                                    <label for="option2" class="col-md-8 control-label">Lapor sakit Attend B, tetapi tidak hadir kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option3" type="checkbox" value="3" name="salah_laku_3" <?php if($laporan->salah_laku_3 == 3){ echo "checked"; } ?> {{ $disabled }}>
                                        </div>
                                    </div>
                                    <label for="option3" class="col-md-8 control-label">Tidur sewaktu kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option4" type="checkbox" value="4" name="salah_laku_4" <?php if($laporan->salah_laku_4 == 4){ echo "checked"; } ?> {{ $disabled }}>
                                        </div>
                                    </div>
                                    <label for="option4" class="col-md-8 control-label">Terlewat masuk kelas kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan (selama ... minit)</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option5" type="checkbox" value="5" name="salah_laku_5" <?php if($laporan->salah_laku_5 == 5){ echo "checked"; } ?> {{ $disabled }}>
                                        </div>
                                    </div>
                                    <label for="option5" class="col-md-8 control-label">Menipu / meniru dalam penilaian akademik dan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option6" type="checkbox" value="6" name="salah_laku_6" <?php if($laporan->salah_laku_6 == 6){ echo "checked"; } ?> {{ $disabled }} >
                                        </div>
                                    </div>
                                    <label for="option6" class="col-md-8 control-label">Keputusan Penilaian Akademik tidak memuaskan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option7" type="checkbox" value="7" name="salah_laku_7" <?php if($laporan->salah_laku_7 == 7){ echo "checked"; } ?> {{ $disabled }} >
                                        </div>
                                    </div>
                                    <label for="option7" class="col-md-8 control-label">Lain - Lain (Sebutkan dibawah)</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                            <input type="text" name="lain_lain" class="form-control input-line" id="lain_lain" value="{{ $laporan->lain_lain }}" {{ $readonly }}>
                                    </div>
                                </div>
                                @if(Auth::user()->roles_id == 0)
                                <div class="form-group col-md-12">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-transparent blue active"> Edit dan Hantar </button>
                                    </div>
                                </div>
                                @endif
                                <input type="hidden" name="pensyarah_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
                            {!! Form::close() !!}
	            </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
	    <div class="row">
        	
            </div>
	</div>
</div>
@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>

<script>

</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop
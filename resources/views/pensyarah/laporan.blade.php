@extends('layouts.master')

@section('head')

@stop

@section('title')
    Laporan
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Laporan</a>
    </li>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box" style="background-color: #d64635;">
	        <div class="portlet-title">
	            <div class="caption">
                        <i class="icon-calendar" style="color:white;"></i>
	                <span class="caption-subject font-white sbold uppercase">Laporan Salah Laku Pelajar</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	        	<div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'PensyarahController@createLaporan', 'files'=>true]) !!}
	                	<div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Semester</label>
                                    <div class="col-md-8">
                                            <input type="text" name="semester" class="form-control input-line" id="semester" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Sesi</label>
                                    <div class="col-md-8">
                                            <input type="text" name="sesi" class="form-control input-line" id="sesi" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Pelajar</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_pelajar" class="form-control input-line" id="nama_pelajar" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">No Tentera / No. K/P</label>
                                    <div class="col-md-8">
                                            <input type="text" name="no_tentera_kp" class="form-control input-line" id="no_tentera_kp" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Pengambilan</label>
                                    <div class="col-md-8">
                                            <input type="text" name="pengambilan" class="form-control input-line" id="pengambilan" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Mata Pelajaran dan Kod</label>
                                    <div class="col-md-8">
                                            <input type="text" name="mata_pelajaran_dan_kod" class="form-control input-line" id="mata_pelajaran_dan_kod" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Bilik Kuliah/Dewan Kuliah/Makmal</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_bilik_kuliah" class="form-control input-line" id="nama_bilik_kuliah" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Tarikh dan Masa</label>
                                    <div class="col-md-8">
                                            <input type="text" name="tarikh_dan_masa" class="form-control input-line" id="tarikh_dan_masa" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label">Nama Penasihat Akademik(PA)</label>
                                    <div class="col-md-8">
                                            <input type="text" name="nama_pa" class="form-control input-line" id="nama_pa" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option1" type="checkbox" value="1" name="salah_laku_1">
                                        </div>
                                    </div>
                                    <label for="option1" class="col-md-8 control-label">Tidak hadir kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan tanpa sebab munasabah</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option2" type="checkbox" value="2" name="salah_laku_2">
                                        </div>
                                    </div>
                                    <label for="option2" class="col-md-8 control-label">Lapor sakit Attend B, tetapi tidak hadir kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option3" type="checkbox" value="3" name="salah_laku_3">
                                        </div>
                                    </div>
                                    <label for="option3" class="col-md-8 control-label">Tidur sewaktu kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option4" type="checkbox" value="4" name="salah_laku_4">
                                        </div>
                                    </div>
                                    <label for="option4" class="col-md-8 control-label">Terlewat masuk kelas kuliah / tutorial / amali / penilaian akademik / latihan ketenteraan (selama ... minit)</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option5" type="checkbox" value="5" name="salah_laku_5">
                                        </div>
                                    </div>
                                    <label for="option5" class="col-md-8 control-label">Menipu / meniru dalam penlaian akademik dan ketenteraan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option6" type="checkbox" value="6" name="salah_laku_6">
                                        </div>
                                    </div>
                                    <label for="option6" class="col-md-8 control-label">Keputusan Penilaian Akademik tidak memuaskan</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-4 text-center">
                                        <div class="checkbox">
                                            <input id="option7" type="checkbox" value="7" name="salah_laku_7">
                                        </div>
                                    </div>
                                    <label for="option7" class="col-md-8 control-label">Lain - Lain (Sebutkan dibawah)</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword1" class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                            <input type="text" name="lain_lain" class="form-control input-line" id="lain_lain" value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                        <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-transparent blue active"> Hantar </button>
                                    </div>
                                </div>

                                <input type="hidden" name="pensyarah_id" value="{{ Auth::user()->id }}">
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
	$(document).ready(function(){
//       $('#checkall-checkbox').click(function(){
//            if(this.checked){
//                $('.checker').find('span').addClass('checked');
//                $("input.single-checkbox").prop('checked', true).show();
//            }
//            else{
//                $('.checker').find('span').removeClass('checked');
//                $("input.single-checkbox").prop('checked', false);
//            }
//       });

       $('.editBtn').click(function(){
       		$("#m_penyeliaan_id").val($(this).data('id'));
		 	$("#m_nama").val($(this).data('nama'));
		 	$("#m_no_matrik").val($(this).data('no_matrik'));
		 	$("#m_tajuk").val($(this).data('tajuk'));
		 	$("#m_status").val($(this).data('status'));
		 	$("#m_sem").val($(this).data('sem'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop
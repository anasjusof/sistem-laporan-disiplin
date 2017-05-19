@extends('layouts.master')

@section('head')

@stop

@section('title')
    Senarai Laporan
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Senarai Laporan</a>
    </li>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box"  style="background-color: #d64635;">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white" style="color:white;"></i>
	                <span class="caption-subject font-white sbold uppercase">Senarai Laporan</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
                                    <th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Nama Pelajar </th>
	                            <th> No Tentera / No KP </th>
                                    <th> Semester </th>
                                    <th> Sesi </th>
                                    <th>  </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
                            <?php $count = 1; ?>
	                        @foreach($senarai_laporan as $laporan)
	                        <?php $currentPageTotalNumber = ( $senarai_laporan->currentPage() - 1) * 5; ?>
	                        <tr>
                                    <td> <input class="single-checkbox" type="checkbox" name="laporan_id[]" form="form_delete" value="{{ $laporan->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $laporan->nama_pelajar }}</td>
	                            <td> {{ $laporan->no_tentera_kp }}</td>
                                    <td> {{ $laporan->semester }}</td>
                                    <td> {{ $laporan->sesi }}</td>
                                    @if(Auth::user()->roles_id == 0)
	                            <td> <a href="/pensyarah-showlaporan/{{ $laporan->id}}" class="btn blue">Edit/Lihat Laporan</a>
                                    @else(Auth::user()->roles_id == 1)
                                    <td> <a href="/pensyarah-showlaporan/{{ $laporan->id}}" class="btn blue">Lihat Laporan</a>
                                    @endif
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['PensyarahController@deleteLaporan'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $senarai_laporan->render() }}
		        		</div>
		        	</div>
		        </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
	</div>
</div>

@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>

<script>
	$(document).ready(function(){
       $('#checkall-checkbox').click(function(){
            if(this.checked){
                $('.checker').find('span').addClass('checked');
                $("input.single-checkbox").prop('checked', true).show();
            }
            else{
                $('.checker').find('span').removeClass('checked');
                $("input.single-checkbox").prop('checked', false);
            }
       });

       $('.editBtn').click(function(){
       		$("#m_laporan_id").val($(this).data('id'));
                $("#m_nama_pelajar").val($(this).data('nama_pelajar'));
                $("#m_no_tentera_kp").val($(this).data('no_tentera_kp'));
                $("#m_semester").val($(this).data('semester'));
                $("#m_sesi").val($(this).data('sesi'));
                $("#m_sem").val($(this).data('sem'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop
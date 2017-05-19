@extends('layouts.master')

@section('head')

@stop

@section('title')
   Senarai Pensyarah dan Ketua Batallion
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Senarai Pensyarah dan Ketua Batallion</a>
    </li>
@stop

@section('content')

<div class="row">
        <div class="col-md-12 ">
            <a href="" class="btn yellow pull-right addBtn" data-toggle="modal" data-target="#addModal" style="margin-bottom: 15px;">Tambah</a>
        </div>
	<div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box"  style="background-color: #d64635;">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white" style="color:white;"></i>
	                <span class="caption-subject font-white sbold uppercase">Senarai Pensyarah dan Ketua Batallion</span>
	            </div>
	        </div>
                
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
                                    <th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Nama </th>
                                    <th> ID Staf </th>
                                    <th> Email </th>
                                    <th> Fakulti </th>
                                    <th> Jawatan </th>
                                    <th>  </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
                            <?php $count = 1; ?>
	                        @foreach($pensyarahs as $pensyarah)
	                        <?php $currentPageTotalNumber = ( $pensyarahs->currentPage() - 1) * 5; ?>
	                        <tr>
                                    <td> <input class="single-checkbox" type="checkbox" name="pensyarah_id[]" form="form_delete" value="{{ $pensyarah->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $pensyarah->name }}</td>
	                            <td> {{ $pensyarah->staff_id }}</td>
                                    <td> {{ $pensyarah->email }}</td>
                                    <td> {{ $pensyarah->fakulti }}</td>
                                    <td> <?php if($pensyarah->roles_id == 1){ echo 'Ketua Batallion'; } else { echo "Pensyarah"; } ?></td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" 
                                            data-id="{{ $pensyarah->id }}" 
                                            data-name="{{ $pensyarah->name }}" 
                                            data-email="{{ $pensyarah->email }}"  
                                            data-fakulti="{{ $pensyarah->fakulti }}" 
                                            data-roles_id="{{ $pensyarah->roles_id }}"
                                            >Edit
                                        </a>
                                    </td>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['KetuaBatalionController@deletePensyarah'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $pensyarahs->render() }}
		        		</div>
		        	</div>
		        </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
	</div>
</div>

<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kemaskini Maklumat</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	{!! Form::open(['method'=>'PATCH', 'action'=>'KetuaBatalionController@updatePensyarah']) !!}
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
	            <div class="col-md-8">
	                    <input type="text" name="name" class="form-control input-line" id="m_name">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Email</label>
	            <div class="col-md-8">
	                    <input type="text" name="email" class="form-control input-line" id="m_email" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Fakulti</label>
	            <div class="col-md-8">
	                    <input type="text" name="fakulti" class="form-control input-line" id="m_fakulti" >
	            </div>
	        </div>
                <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Jawatan</label>
	            <div class="col-md-8">
	                    <select name="roles_id" class="form-control input-line" id="m_roles_id" >
                                <option value="0">Pensyarah</option>
                                <option value="1">Ketua Batallion</option>
                            </select>
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_pensyarah_id">
	  	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>

<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Maklumat Pensyarah</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	{!! Form::open(['method'=>'POST', 'action'=>'KetuaBatalionController@createPensyarah']) !!}
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
	            <div class="col-md-8">
                        <input type="text" name="name" class="form-control input-line" id="" value="{{ old('name') }}">
	            </div>
	        </div>
            <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">ID Staf</label>
	            <div class="col-md-8">
	                    <input type="text" name="staff_id" class="form-control input-line" id="" value="{{ old('staff_id') }}">
	            </div>
	        </div>
		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Email</label>
	            <div class="col-md-8">
	                    <input type="text" name="email" class="form-control input-line" id="" value="{{ old('email') }}">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Fakulti</label>
	            <div class="col-md-8">
	                    <input type="text" name="fakulti" class="form-control input-line" id="" value="{{ old('fakulti') }}">
	            </div>
	        </div>
                <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Jawatan</label>
	            <div class="col-md-8">
	                    <select name="roles_id" class="form-control input-line" id="" >
                                <option value="0"></option>
                                <option value="0">Pensyarah</option>
                                <option value="1">Ketua Batallion</option>
                            </select>
	            </div>
	        </div>
                <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Kata Laluan</label>
	            <div class="col-md-8">
	                    <input type="password" name="password" class="form-control input-line" id="" >
	            </div>
	        </div>
                <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Pengesahan Kata Laluan</label>
	            <div class="col-md-8">
	                    <input type="password" name="password_confirmation" class="form-control input-line" id="" >
	            </div>
	        </div>
	  	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {!! Form::close() !!}
      </div>
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
       		$("#m_pensyarah_id").val($(this).data('id'));
                $("#m_name").val($(this).data('name'));
                $("#m_email").val($(this).data('email'));
                $("#m_fakulti").val($(this).data('fakulti'));
                $("#m_roles_id").val($(this).data('roles_id'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop
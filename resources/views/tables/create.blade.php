@extends('layout')

@section('content')
<section class="content-header">
  <h1>
  	Create New Table
    <small>for storing custom content</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
     <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Table Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="create-table" method="POST" action="/tables">
              <div class="box-body">
                @if($errors->any())
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <ul>
                        <li>{{$error}}</li>
                      </ul>
                    @endforeach
                  </div>
                @endif
                <div class="form-group">
                  <label class="col-sm-2 control-label">Table Name</label>
                  <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" placeholder="Table Name">
                    {{ csrf_field() }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="hidden" name="visible" value="0">
                        <input type="checkbox" name="visible" value="1"> Visibility
                      </label>
                    </div>
                  </div>
                </div>
              <div class="form-group">
		          <label class="control-label col-sm-2">Field Name</label>
		          <div class="col-sm-4">
		           <input name="fields[0][name]" type="text" class="form-control" placeholder="Field Name">
		          </div>
		          <label class="control-label col-sm-1">Field Type</label>
		          <div class="col-sm-4">
                <select name="fields[0][type]" class="form-control">
                  <option value="string">String</option>
                  <option value="text">Text</option>
                  <option value="number">Number</option>
                </select>
		          </div>
      			</div>
      		</div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button id="add-table-field" class="btn btn-default">Add Field</button>
                <button type="submit" class="btn btn-info pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>        <!-- left column -->
        </div>
	</div>
</section>
@endsection
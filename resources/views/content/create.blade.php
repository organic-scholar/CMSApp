@extends('layout')

@section('content')
    <section class="content-header">
        <h1>
            Create New {{ $table->name }}
            <small>custom content</small>
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
                        <h3 class="box-title">{{$table->name}} Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="/content?type={{$table->name}}">
                        <div class="box-body">
                            {{ csrf_field()}}
                            @foreach($table->fields as $field)
                                <div class="form-group @if($errors->has($field['name'])) has-error @endif">
                                    <label class="col-sm-2 control-label">{{ $field['name']}}</label>
                                    <div class="col-sm-10">
                                        @if($field['type'] == 'integer')
                                            <input name="{{$field['name']}}" type="number" class="form-control" placeholder="">
                                        @elseif($field['type'] == 'text')
                                            <textarea name="{{$field['name']}}" class="form-control"></textarea>
                                        @else
                                            <input name="{{$field['name']}}" type="text" class="form-control" placeholder="">
                                        @endif
                                        @foreach($errors->get($field['name']) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Create</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>        <!-- left column -->
            </div>
        </div>
    </section>
@endsection
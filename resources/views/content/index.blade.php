@extends('layout')

@section('content')

<section class="content-header">
  <h1>
    {{$table->name}}
    <small>custom content</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<h3></h3>
<div class="row">
     <div class="col-md-12">
               <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $table->name }} Table</h3>
              <a href="/content/create?type={{ $table->name}}" class="btn btn-primary pull-right">
                <i class="fa fa-plus"></i>
                New {{$table->name}}
              </a>
            </div>
            <div class="box-body">
              @if(count($contents) == 0)
                <p>No {{ $table->name }} are in database.</p>
              @else
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    @foreach($table->fields as $field)
                      <th>{{ $field['name'] }}</th>
                    @endforeach
                  </tr>
                  @foreach($contents as $index => $content)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      @foreach($table->fields as $field)
                        <td>{{ $content->$field['name'] }}</td>
                      @endforeach
                    </tr>
                  @endforeach
                </table>
              @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>

  </div>
</section>
@endsection
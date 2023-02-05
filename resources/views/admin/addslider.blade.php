@extends('admin_layout.master')

@section('title')
    Add slider
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
       <div class="content-header-left">
          <h1>Add Slider</h1>
       </div>
       <div class="content-header-right">
          <a href="{{ url('admin/sliders', []) }}" class="btn btn-primary btn-sm">View All</a>
       </div>
    </section>
    @if (count($errors) > 0)
    <section class="content" style="min-height:auto;margin-bottom: -30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="content">
       <div class="row">
          <div class="col-md-12">
             <form class="form-horizontal" action="{{ url('admin/saveslider', []) }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="box box-info">
                   <div class="box-body">
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Photo <span>*</span></label>
                         <div class="col-sm-9" style="padding-top:5px">
                            <input type="file" name="photo" required>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Heading </label>
                         <div class="col-sm-6">
                            <input type="text" autocomplete="off" class="form-control" name="heading" value="" required>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Content </label>
                         <div class="col-sm-6">
                            <textarea class="form-control" name="content" style="height:140px;" required></textarea>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Button Text </label>
                         <div class="col-sm-6">
                            <input type="text" autocomplete="off" class="form-control" name="buttontext" value="" required>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Button URL </label>
                         <div class="col-sm-6">
                            <input type="text" autocomplete="off" class="form-control" name="buttonurl" value="" required>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label">Position </label>
                         <div class="col-sm-6">
                            <select name="position" class="form-control" required>
                               <option value="Left">Left</option>
                               <option value="Center">Center</option>
                               <option value="Right">Right</option>
                            </select>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="" class="col-sm-2 control-label"></label>
                         <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                         </div>
                      </div>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </section>
</div>
@endsection
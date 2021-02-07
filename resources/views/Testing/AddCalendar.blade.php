@extends('AdminHeader.header')

@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Events</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
              <li><i class="fa fa-laptop"></i>Add Events</li>
            </ol>
          </div>
        </div>

        <div class="row">
        @if(session()->has('message'))
            <div class="alert alert-success fade in">
                {{ session()->get('message') }}
                <button data-dismiss="alert" class="close close-sm" type="button">
                    X<i class="icon-remove"></i>
                </button>
            </div>
        @endif
        @if(session()->has('message-error'))
            <div class="alert alert-danger fade in">
                {{ session()->get('message-error') }}
                <button data-dismiss="alert" class="close close-sm" type="button">
                    X<i class="icon-remove"></i>
                </button>
            </div>
        @endif
        {{-- @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif --}}

        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div> 
        @endif
        <div class="btn-group" style="padding-left: 20px; padding-bottom: 20px;">
            {{-- <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i> New Clients</a> --}}
        </div>
            <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                <form action="{{ route('store-calendar') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br/>
                    {{-- <label for="">Title</label>
                    <input type="text" name="title" value="" placeholder="Enter Title Name" class="form-control">
                    <br/> --}}
                    <label for="">Select CCIE Track</label>
                    <select class="form-control" @if($errors->has('ccie')) {{ $errors->first('ccie') }} style="border: 1px solid #d93333" @endif name="ccie" id="">
                            <option name="ccie" value=""><--- Select Your Track ---></option>
                        @foreach($ccie_track as $ccie)
                            <option name="ccie" @if(old('ccie') == $ccie->id) Selected @endif value="{{ $ccie->id }}">{{ $ccie->name }}</option>
                        @endforeach
                    </select>
                    <span style="color: #d93333; font-size: 10px;">@if($errors->has('ccie')) {{ $errors->first('ccie') }} @endif</span>
                    <br/>
                    <label for="">Select Rack</label>
                    <select class="form-control" @if($errors->has('rack')) {{ $errors->first('rack') }} style="border: 1px solid #d93333" @endif name="rack" id="" value="">
                            <option name="rack" value=""><--- Select Your Rack ---></option>
                        @foreach($racks as $rack)
                            <option name="rack" @if(old('rack') == $rack->id) Selected @endif value="{{ $rack->id }}">{{ $rack->name }}</option>
                        @endforeach
                    </select>
                    <span style="color: #d93333; font-size: 10px;">@if($errors->has('rack')) {{ $errors->first('rack') }} @endif</span>
                    <br/>
                    <label for="">Start Date</label>
                    <input type="datetime" @if($errors->has('start_date')) {{ $errors->first('start_date') }} style="border: 1px solid #d93333" @endif name="start_date" id='datetimepicker1' value="{{ old('start_date') }}" placeholder="Enter Start Date" class="form-control">
                    <span style="color: #d93333; font-size: 10px;">@if($errors->has('start_date')) {{ $errors->first('start_date') }} @endif</span>
                    <br/>
                    {{-- <label for="">End Date</label>
                    <input type="datetime date" id='datetimepicker2' name="end_date" value="" placeholder="Enter End Date" class="form-control">
                    <br/> --}}
                    <input class="btn btn-success" type="submit" value="submit">
                </form>
                <div>
                </div>
            </div>
        </div>
</section>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script>
    $(function () {
      $('#datetimepicker1').datetimepicker({
        format: 'D-M-Y HH:mm:ss',
      });
   });
   $(function () {
      $('#datetimepicker2').datetimepicker({
        format: 'D-M-Y HH:mm:ss',
      });
   });
  </script>
@endsection

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
              <li><i class="fa fa-laptop"></i>Events</li>
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
        @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div> 
        @endif
        <div class="btn-group" style="padding-left: 20px; padding-bottom: 20px;">
            <a class="btn btn-primary" href="{{ route('create-calendar') }}"><i class="icon_plus_alt2"></i> Add Events</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-default" href="{{ route('show-calendar') }}"><i class="icon_plus_alt2"></i> Show Events</a>
            {{-- <a class="btn btn-danger" href="{{ route('delete-calendar') }}"><i class="icon_plus_alt2"></i> Delete Events</a> --}}
        </div>
            <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                <br/>
                <br/>
                {!! $calendar->calendar() !!}
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
{!! $calendar->script() !!}
@endsection
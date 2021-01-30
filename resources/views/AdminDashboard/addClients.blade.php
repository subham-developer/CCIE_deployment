@extends('AdminHeader.header')

@section('content')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add Category Name</li>
            </ol>
            {{-- @if (!empty($success))
                <div class="alert alert-success">
                    <h1>{{$success}}</h1>
                </div>
            @endif --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
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
          </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ route('store-clients') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br/>
                    <label for="">User Name</label>
                    <input type="text" name="name" value="" placeholder="Enter User's User Name" class="form-control">
                    <br/>
                    <label for="">Email Id</label>
                    <input type="email" name="email" value="" placeholder="Enter User's Email Id" class="form-control">
                    <br/>
                    {{-- <label for="">Password</label> --}}
                    {{-- <input type="password" name="password" value="" placeholder="Enter User Password" class="form-control"> --}}
                    {{-- <br/> --}}
                    <input class="btn btn-success" type="submit" value="submit">
                </form>
            </div>
        </div>
</section>

@endsection
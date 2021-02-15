@extends('AdminHeader.header')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
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
          </div>
        </div>

        <div class="row">
          <div class="col-lg-1 col-lg-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ route('store-clients') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br/>
                    <label for="">User Name</label>
                    <span class="required">*</span>
                    {{-- {{ $errors->has('name') ? ' has-error' : '' }} --}}
                   
                    <input type="text" name="name" value="{{ old('name') }}"  @if($errors->has('name')) {{ $errors->first('name') }} style="border: 1px solid #00a0df" @endif placeholder="Enter User's User Name" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</span>
                    <br/>
                    <label for="">Email Id</label>
                    <span class="required">*</span>
                    <input type="email" name="email" value="{{ old('email') }}" @if($errors->has('email')) {{ $errors->first('email') }} style="border: 1px solid #00a0df" @endif placeholder="Enter User's Email Id" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('email')) {{ $errors->first('email') }} @endif</span>
                    <br/>
                    <label for="">Date of Birth</label>
                    <span class="required">*</span>
                    <input type="date" name="dob" value="{{ old('dob') }}" @if($errors->has('dob')) {{ $errors->first('dob') }} style="border: 1px solid #00a0df" @endif placeholder="Enter Date of Birth" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('dob')) {{ $errors->first('dob') }} @endif</span>
                    <br/>
                    <label for="">City Name</label>
                    <span class="required">*</span>
                    <input type="text" name="city" value="{{ old('city') }}" @if($errors->has('city')) {{ $errors->first('city') }} style="border: 1px solid #00a0df" @endif placeholder="Enter City Name" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('city')) {{ $errors->first('city') }} @endif</span>
                    <br/>
                    <label for="">Country Name</label>
                    <span class="required">*</span>
                    <input type="text" name="country" value="{{ old('country') }}" @if($errors->has('country')) {{ $errors->first('country') }} style="border: 1px solid #00a0df" @endif placeholder="Enter Country Name" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('country')) {{ $errors->first('country') }} @endif</span>
                    <br/>
                    <label for="">Contact Number</label>
                    <span class="required">*</span>
                    <input type="text" name="phone" value="{{ old('phone') }}" @if($errors->has('phone')) {{ $errors->first('phone') }} style="border: 1px solid #00a0df" @endif placeholder="Enter Contact Number" class="form-control">
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</span>
                    <br/>
                    <label for="">Select CCIE Track</label>
                    <span class="required">*</span>
                    <select class="form-control js-example-basic-multiple" name="ccie[]" multiple="multiple" @if($errors->has('ccie')) {{ $errors->first('ccie') }} style="border: 1px solid #00a0df" @endif name="ccie" id="">
                        <option value=""><--- Select Your Track ---></option>
                        @foreach($ccie_track as $ccie)
                            <option @if(old('ccie') == $ccie->id) Selected @endif value="{{ $ccie->id }}">{{ $ccie->name }}</option>
                        @endforeach
                    </select>
                    <span style="color: #00a0df; font-size: 10px;">@if($errors->has('ccie')) {{ $errors->first('ccie') }} @endif</span>
                    <br/>
                    {{-- <label for="">Password</label> --}}
                    {{-- <input type="password" name="password" value="" placeholder="Enter User Password" class="form-control"> --}}
                    {{-- <br/> --}}
                    <input class="btn btn-success" type="submit" value="submit">
                </form>
            </div>
        </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>

@endsection
@extends('AdminHeader.header')

@section('content')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<section id="main-content">
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
        @endif`
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add Post</li>
            </ol>
          </div>
        </div>

        <div class="row">
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                <i class="fa fa-cloud-download"></i>
                    <form action="{{ url('/upload_image') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <select name="category_id" id="">
                        <input type="file" name="image_name">
                        <input class="btn btn-success" type="submit">
                    </form>
                </div>
            </div> -->


            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ url('/store') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <select name="category_id" class="form-control" >
                      <option value=""><----Select Category----></option>

                      @foreach($categoriesName as $categoryName)
                        <option value="{{ $categoryName->id }}">{{ $categoryName->name }}</option>
                      @endforeach
                    </select>
                    <br/>
                    <input type="text" name="title" value="" placeholder="Enter Title of this post" class="form-control">
                    <br/>
                    <!-- <input type="text" name="description" value="" placeholder="Enter Short Description about this post">
                    <br /> -->
                    <textarea name="content" id="editor1">
                    
                    </textarea>
                    <input class="btn btn-success" type="submit" value="submit">
                </form>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
            </div>
        </div>
</section>

@endsection
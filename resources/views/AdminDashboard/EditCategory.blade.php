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
              <li><i class="fa fa-laptop"></i>Edit Post</li>
            </ol>
          </div>
        </div>

        <div class="row">
            


            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ url('/updateCategory') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="category_id" value="{{ $listOfCategories->id }}">
                    <br/>
                    <input type="text" name="category_name" placeholder="Enter Category Name" value="{{ $listOfCategories->name }}" class="form-control">
                    <br/>
                    <input class="btn btn-success btn-lg" type="submit" value="submit">
                </form>
                
            </div>
        </div>
</section>

@endsection
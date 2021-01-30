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
          </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ url('/storeCategory') }}" method="POST" class="form">
                    {{ csrf_field() }}
                   
                    <br/>
                    <label for="">Add New Category Name</label>
                    <input type="text" name="categoryName" value="" placeholder="Enter new category name" class="form-control">
                    <br/>
                    <input class="btn btn-success" type="submit" value="submit">
                </form>
            </div>
        </div>
</section>

@endsection
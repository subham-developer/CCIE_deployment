@extends('AdminHeader.header')

@section('content')
<!-- <html lang="en"> -->
<!-- <head> -->
  <!-- <title>Laravel Multiple File Upload Example</title> -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- </head> -->
<body>

<section id="main-content">
      <section class="wrapper">
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
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Upload Images</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Upload Images</li>
            </ol>
          </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        
  
  <!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-lg-9 col-md-9">
        <h3 class="jumbotron">Laravel Multiple File Upload</h3> -->
    <form method="post" action="{{url('savingFile')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="input-group control-group increment" >
          <input type="file" name="filename[]" class="form-control" required=""  />
          <br />
          <br />
          <input type="text" name="imageName0" placeholder="Enter Image Name" class="form-control" required="" />
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button" id="AddMore"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
    </form>  
        </div>
    <!-- </div>      
  </div> -->



  </section>
    </section>
    <script type="text/javascript">
        // $('#AddMore').click(function(){
        //     alert('Hi');
        // });
    $(document).ready(function() {
        let count = 1;

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          var html2 = `
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-control" required="" />
            <br />
            <br />
            <input type="text" name="imageName${count++}" placeholder="Enter Image Name" class="form-control" required="" />
            
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
          
          `
          $(".increment").after(html2);
      });

      $("body").on("click",".btn-danger",function(){ 
        //   console.log('hi');
          $(this).parents(".control-group").remove();
      });

    });

</script>
<!-- </body>
</html> -->

@endsection('content')
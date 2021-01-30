@extends('AdminHeader.header')

@section('content')
<!-- <html lang="en"> -->
<!-- <head> -->
  <!-- <title>Laravel Multiple File Upload Example</title> -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <style>
      .display-none {
          display: none;
      }
  </style>
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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Motivational Images</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Motivational Gallery</li>
            </ol>
          </div>
        </div>
        
        <div class="row"> 
            @foreach($gettingMotivationalImages as $key=>$Images)
              <div class="column gridColumn" style="text-align:center; display:inline-block; border-radius: 2px solid blue; margin-top: 20px; margin-left:20px; margin-bottom:0px; margin-right:20px" >
                  <img src="{{ url('public/images/MotivationalGallery') }}/{{ $Images->name}}" alt="{{ $Images->alt}}" style="width:150px; height:120px; border-radius: 10px;">
                  <br />
                  <br />
                  <span>{{ $Images->alt}}</span>
                    <div class="row">
                        <div class="image-name-section display-none">
                          <input type="text" name="imageName" class="imageNameToEdit" placeholder="Enter Image Name" value="{{ $Images->alt }}" />
                                <button class="btn btn-sm btn-warning" onclick="updateName({{ $Images->id }},$(this))">Update</button>
                                
                        </div>
                        <div class="deleteButtonform">
                            
                              <input type="hidden" name="motivationId" value="{{ $Images->id}}" data-imagealtname="{{ $Images->alt}}" data-imageidname="{{ $Images->id }}">
                             
                              <button class="btn btn-sm btn-primary editImageField">Edit</button>
                          |
                                <form style="display:inline;"  method="post" action="{{ url('/deleteMotivationalImages') }}">
                                  {{csrf_field()}}
                                  <input type="hidden" name="motivationId" value="{{ $Images->id}}">
                                  <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                          
                      </div>
                    </div>
              </div>
            @endforeach
            <div class="row" style="text-align:center;">
                <a href="{{ url('/showMoticationalGallery') }}"><button class="btn btn-lg btn-primary">Show Less</button></a>
            </div>
        </div>
        
        <script>
        
            $('.editImageField').click(function(){
                let self = $(this);
                
                let altName = $(this).prev().data('imagealtname');
                
                let idName = $(this).prev().data('imageidname');
                
                // console.log(altName, idName);
              editImage(altName,idName, self); 
            });
            function editImage(altName,idName, self){
                // alert(idName);
                // console.log(idName);
                if(self.parent().prev().hasClass('display-none')){
                    self.parent().prev().removeClass('display-none');
                }
                
                if(!(self.parent('.deleteButtonform').hasClass('display-none'))){
                    self.parent('.deleteButtonform').addClass('display-none');
                }
            }
            
            function updateName(idName,self) {
                let updatedImageName = self.prev().val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    url: "/updateImageName",
                    type: "POST",
                    data: 
                        { 
                            'altName' : updatedImageName,
                            'imageId' : idName,
                        },
                    beforeSend:function()
                    {
                        
                    },
                    success:function(result)
                    {
                        if(! self.parent().hasClass('display-none')){
                            self.parent().addClass('display-none');
                        }
                        if(self.parent().next().hasClass('display-none')){
                            self.parent().next().removeClass('display-none');
                        }
                        // console.log(result.altName);
                        if(result.altName == null){
                            self.parent().parent().prev().text('').text(' ');
                        }else{
                            self.parent().parent().prev().text('').text(result.altName);
                        }
                        
                        
                    }
                });
             }
            
        </script>
  
  



  </section>
    </section>
    
<!-- </body>
</html> -->

@endsection('content')
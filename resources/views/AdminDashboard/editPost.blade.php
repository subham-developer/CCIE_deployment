@extends('AdminHeader.header')

@section('content')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<input type="file" name="uploadMoreImage" value="" id="uploadImageFromHere" style="display:none;" /> 
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
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#flipFlop"><i class="glyphicon glyphicon-plus">Uploaded Images</i></button>
            </div>
            
        </div>
    <br />
    <br />
    
    
        <div class="row">
            <div class="col-lg-9 col-lg-9 col-sm-12 col-xs-12">
                <form action="{{ url('/PostUpdate') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $getpostDetails[0]['id'] }}">
                    <select name="category_id" class="form-control" >
                      <!-- <option value=""><----Select Category----></option> -->

                      @foreach($categoriesName as $categoryName)
                        @if($categoryName->name == $categoryNames)
                            <option value="{{ $categoryName->id }}" style="color:green" selected="">{{ $categoryName->name }}</option>
                        @else
                            <option value="{{ $categoryName->id }}">{{ $categoryName->name }}</option>
                        @endif
                      @endforeach
                    </select>
                    <br/>
                    <input type="text" name="title" placeholder="Enter Title of this post" value="{{ $getpostDetails[0]['title'] }}" class="form-control">
                    <br/>
                    <!-- <input type="text" name="description" value="" placeholder="Enter Short Description about this post">
                    <br /> -->
                    <textarea name="content" id="editor1">
                    <?php
                        echo html_entity_decode($getpostDetails[0]['body']);
                     ?>
                    </textarea>
                    <!-- <label for="" class="form-control">Post Status
                    <input type="checkbox" value="on" class="form-control" checked>On
                    <input type="checkbox" value="off" class="form-control">Off<br>
                    </label> -->
                    

                    <input class="btn btn-success btn-lg" type="submit" value="submit">
                </form>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
            </div>
        </div>
        
        
        
        
                    <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><i class="glyphicon glyphicon-plus">Uploaded Images For Post</i></h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                            @foreach($postImages as $key=>$ImageforPost)
                              <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                  <img src="{{ url('/public/images/MotivationalGallery') }}/{{ $ImageforPost->name }}" width="120px" height="120px" />
                                  <input type="text" value="{{ url('/public/images/MotivationalGallery') }}/{{ $ImageforPost->name }}" />
                              </div>
                            @endforeach
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
              
              
              
              <!-- The modal -->
                <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
                    <div class="modal-dialog" role="document" style="width:90%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalLabel">Uploaded Images</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button class="btn btn-md btn-success" onclick="uploadMoreImage()" style="width:100%; margin-bottom: 12px;"><i class="glyphicon glyphicon-plus"  >Click Here to Upload More Images</i></button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    @if(count($postImages) == 0)
                                        <div class="row" id="dynamicUploadedImageforNone">
                                            
                                        </div>
                                    @else
                                    <div class="row" id="dynamicUploadedImageforNone">
                                        @foreach($postImages as $key=>$ImageforPost)
                                        
                                          <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 dynamicDeleteImage{{ $ImageforPost->id }}" style="margin-bottom: 12px; margin-top: 14px;">
                                                  <img src="{{ url('/public/images/postGallery') }}/{{ $ImageforPost->name }}" alt="{{ $ImageforPost->alt }}" width="150px" height="120px" style="margin-bottom: 10px; border-radius:10px;"/>
                                              <p>{{ $ImageforPost->alt }}</p>
                                              <div class="row">
                                                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                                                      <input type="text" value="{{ url('/public/images/postGallery') }}/{{ $ImageforPost->name }}" style="display:inline; height: 29px;" /><button style="margin: 0px;height: 29px; padding-bottom: 23px;" onclick="deletePostImage('{{ $ImageforPost->id }}')" class="btn btn-sm btn-danger">X</button>
                                                  </div>
                                              </div>
                                          </div>
                                        
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    function deletePostImage(id){
                        console.log(id);
                        $.ajax({
                            headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                            url : '{{ url('/deletePostServerImage') }}',
                            type: 'POST',
                            data : {
                                'id' : id,
                            },
                            success: function(result){
                                // $(`.dynamicDeleteImage${result.id}`).remove();
                                console.log(`#dynamicDeleteImage${result.idName}`);
                                $(`.dynamicDeleteImage${result.idName}`).remove();
                            },error:function(xhr,error, status){
                                console.log(error);
                                console.log(xhr);
                                console.log(status);
                            }
                            
                        });
                    }
                </script>
                
                <script>
                    function uploadMoreImage(){
                       $('#uploadImageFromHere').click();
                        $('#uploadImageFromHere').change(function(event){
                            uploadByAjax(event.target);
                        }); 
                        $('#uploadImageFromHere').change(function(event){
                            $('#uploadImageFromHere').val('');
                        }); 
                    }
                </script>
                
                <script>
                    function uploadByAjax(imageValue){
                        let uploadedImage = imageValue.files[0];
                        console.log(uploadedImage.type);
                        var imagName = window.prompt("Enter Image name: ");
                        // console.log(imagName.length);
                        if(imagName != null){
                            if(uploadedImage.type == 'image/png' || uploadedImage.type == 'image/jpg' || uploadedImage.type == 'image/PNG' || uploadedImage.type == 'image/jpeg'){
                                if(uploadedImage.name.length != 0){
                                    var form_data = new FormData();
                                    form_data.append('file', imageValue.files[0]);
                                    form_data.append('imageName', imagName);
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url: "/uploadImageForPost",
                                        type: "POST",
                                        contentType: false,
                                        processData: false,
                                        data: form_data,
                                        success: function (result) {
                                            // $('#dynamicUploadedImage').addClass(`dynamicDeleteImage${result.imageId}`);
                                            $('#dynamicUploadedImageforNone').append(`<div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 dynamicDeleteImage${result.imageId}" style="margin-bottom: 12px; margin-top: 14px;"><img src='/public/images/postGallery/${result.imageName}' alt='${result.imageAltName}' width="150px" height="120px" style="margin-bottom: 10px; border-radius:10px;"/><p>${result.imageAltName}</p> <input type="text" value="{{ url('/public/images/postGallery') }}/${result.imageName}" style="display:inline; height: 29px;"  /><button style="margin: 0px;height: 29px; padding-bottom: 23px;" onclick="deletePostImage('${result.imageId}')" class="btn btn-sm btn-danger">X</button></div>`);
                                            // $('#dynamicUploadedImage').removeClass(`dynamicDeleteImage${result.imageId}`);
                                        },error: function (xhr, status, error) {
                                            alert(xhr);
                                            alert(status);
                                            alert(error);
                                        }
                                            
                                    });
                                
                                }else{
                                alert('Please Upload a file');
                                }
                            }else{
                                alert('Wrong File Type');
                            }
                        }else{
                            alert('Image Name Cannot be empty. Please Upload image again');
                        }
                        
                        
                        
                    }
                </script>
        
        
        
        
</section>

@endsection
@extends('AdminHeader.header')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Clients</li>
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
            <a class="btn btn-primary" href="{{ route('create-clients') }}"><i class="icon_plus_alt2"></i> New Clients</a>
        </div>
            <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                <table class="table table-striped table-advance table-hover" id="example">
                    <tbody>
                        <tr>
                            <th>
                                <i class="icon_profile"></i>
                                Role
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                <i class="icon_calendar"></i>
                                Email / Username
                            </th>
                            <th>
                                <i class="icon_pin_alt"></i>
                                status
                            </th>
                            {{-- <th>
                                <i class="icon_cogs"></i>
                                Action
                            </th> --}}
                        </tr>
                        @foreach($clientList as $post)
                            <tr>
                                @if($post->role_id == 1)
                                    <td>
                                        Admin
                                    </td>
                                @else 
                                    <td>
                                        Clients
                                    </td>
                                @endif
                                <td>
                                    {{ $post->name }}
                                </td>
                                <td>
                                    {{ $post->email }}
                                </td>
                                @if($post->role_id == 1)
                                    <td>
                                        Admin
                                    </td>
                                @else 
                                    <td>
                                        Clients
                                    </td>
                                @endif
                                {{-- <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ url('/EditPost') }}/{{ $post->slug }}"><i class="icon_plus_alt2"></i></a>
                                        @if($post->status == 1)
                                        <a class="btn btn-success" href="{{ url('/updatePostStatus') }}/{{ $post->id }}"><i class="icon_check_alt2"></i></a>
                                        @else
                                        <a class="btn btn-warning" href="{{ url('/updatePostStatus') }}/{{ $post->id }}"><i class="icon_check_alt2"></i></a>
                                        @endif
                                        <a class="btn btn-danger" href="{{ url('/deletePostStatus') }}/{{ $post->id }}"><i class="icon_close_alt2"></i></a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $clientList->links() }}
                </div>
            </div>
        </div>
</section>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable( {
        paging: false
    } );
</script>
@endsection
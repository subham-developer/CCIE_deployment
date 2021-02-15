@extends('AdminHeader.header')
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
              <li><i class="fa fa-laptop"></i>Show Events</li>
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
            <a class="btn btn-primary" href="{{ route('calendar') }}"><i class="icon_plus_alt2"></i> View Calendar</a>
        </div>
            <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th>
                                {{-- <i class="icon_profile"></i> --}}
                                User Name
                            </th>
                            <th>
                                <i class="icon_profile"></i>
                                Category Name
                            </th>
                            <th>
                                Rack Name
                            </th>
                            <th>
                                Timezone
                            </th>
                            <th>
                                Start Date
                            </th>
                            <th>
                                <i class="icon_calendar"></i>
                               End Date
                            </th>
                            {{-- <th>
                                <i class="icon_pin_alt"></i>
                                Status
                            </th> --}}
                            @if(Auth::user()->role_id == 1)
                            <th>
                                <i class="icon_cogs"></i>
                                Action
                            </th>
                            @endif
                        </tr>
                        @foreach($eventsList as $post)
                            <tr>
                                <td>
                                    {{ $post->users->name }}
                                </td>
                                <td>
                                    {{ $post->ccie->name }}
                                </td>
                                <td>
                                    {{ $post->racks->name }}
                                </td>
                                <td>
                                    {{ $post->timezone }}
                                </td>
                                <td>
                                    {{ date('d-m-Y g:i A', strtotime($post->start_date)) }}
                                </td>
                                <td>
                                    {{ date('d-m-Y g:i A', strtotime($post->end_date)) }}
                                </td>
                                {{-- @if($post->role_id == 1)
                                    <td>
                                        Admin
                                    </td>
                                @else 
                                    <td>
                                        Clients
                                    </td>
                                @endif --}}
                                @if(Auth::user()->role_id == 1)
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ url('/edit/calendar') }}/{{ $post->id }}">Edit Events <i class="icon_plus_alt2"></i></a>
                                        {{-- @if($post->status == 1)
                                        <a class="btn btn-success" href="{{ url('/updatePostStatus') }}/{{ $post->id }}"><i class="icon_check_alt2"></i></a>
                                        @else
                                        <a class="btn btn-warning" href="{{ url('/updatePostStatus') }}/{{ $post->id }}"><i class="icon_check_alt2"></i></a>
                                        @endif
                                        <a class="btn btn-danger" href="{{ url('/deletePostStatus') }}/{{ $post->id }}"><i class="icon_close_alt2"></i></a> --}}
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{-- {{ $eventsList->links() }} --}}
                </div>
            </div>
        </div>
</section>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
@endsection
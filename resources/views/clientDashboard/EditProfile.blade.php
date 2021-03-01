@extends('AdminHeader.header')

@section('content')

  <!--main content start-->
        
  <section id="main-content">
    <section class="wrapper">
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i>Client's Profile</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_documents_alt"></i>Pages</li>
            <li><i class="fa fa-laptop"></i>Profile</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
          <div class="profile-widget profile-widget-info">
            <div class="panel-body">
              <div class="col-lg-2 col-sm-2">
                <h4>{{ $profiles['name'] }}</h4>
                <div class="follow-ava">
                  <img src="{{ url('/Admin/img/dummy-male.jpg') }}" alt="">
                </div>
                <h6>@if($profiles['role_id'] == 1) Admin @else User @endif</h6>
              </div>
              <div class="col-lg-4 col-sm-4 follow-info">
                <p>Hello I’m {{ $profiles['name'] }}, a leading expert in interactive and creative design.</p>
                <p>@ {{ $profiles['name'] }}</p>
                <p><i class="fa fa-twitter">{{ $profiles['name'] }}</i></p>
                <h6>
                                  <span><i class="icon_clock_alt"></i>{{ now() }}</span>
                                  <span><i class="icon_calendar"></i>{{ now() }}</span>
                                  <span><i class="icon_pin_alt"></i>{{ strtoupper($profiles['country']) }}</span>
                              </h6>
              </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                <ul>
                  <li class="active">

                    <i class="fa fa-comments fa-2x"> </i>
                    <br> 
                    {{-- Contrary to popular belief, Lorem Ipsum is not simply --}}
                  </li>

                </ul>
              </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                <ul>
                  <li class="active">

                    <i class="fa fa-bell fa-2x"> </i>
                    <br> 
                    {{-- Contrary to popular belief, Lorem Ipsum is not simply --}}
                  </li>

                </ul>
              </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                <ul>
                  <li class="active">

                    <i class="fa fa-tachometer fa-2x"> </i>
                    <br> 
                    {{-- Contrary to popular belief, Lorem Ipsum is not simply --}}
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading tab-bg-info">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a data-toggle="tab" href="#recent-activity">
                                        <i class="icon-home"></i>
                                        Daily Activity
                                    </a>
                </li>
                <li class="">
                  <a data-toggle="tab" href="#profile">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                </li>
                <li class="">
                  <a data-toggle="tab" href="#edit-profile">
                                        <i class="icon-envelope"></i>
                                        Edit Profile
                                    </a>
                </li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content">
                <div id="recent-activity" class="tab-pane active">
                  <div class="profile-activity">
                      @foreach ($events as $event)
                        <div class="act-time">
                            <div class="activity-body act-in">
                            <span class="arrow"></span>
                            <div class="text">
                                <a href="#" class="activity-img"><img class="avatar" src="{{ url('/Admin/img/dummy-male.jpg') }}" alt=""></a>
                                <p class="attribution">{{ $event->ccie->name }} | {{ $event->racks->name }}</p>
                                <p>{{ $event->start_date }} | {{ $event->end_date }}</p>
                            </div>
                            </div>
                        </div>
                      @endforeach

                  </div>
                </div>
                <!-- profile -->
                <div id="profile" class="tab-pane">
                  <section class="panel">
                    <div class="bio-graph-heading">
                      Hello I’m {{ $profiles['name'] }}.
                      {{-- a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication. --}}
                    </div>
                    <div class="panel-body bio-graph-info">
                      <h1>Bio Graph</h1>
                      <div class="row">
                        <div class="bio-row">
                          <p><span>First Name </span>: {{ $profiles['name'] }} </p>
                        </div>
                        <div class="bio-row">
                          <p><span>Last Name </span>: {{ $profiles['name'] }}</p>
                        </div>
                        <div class="bio-row">
                          <p><span>Birthday</span>: {{ $profiles['dob'] }}</p>
                        </div>
                        <div class="bio-row">
                        <p><span>Mobile </span>: +91 {{ $profiles['phone'] }}</p>
                        </div>
                        <div class="bio-row">
                        <p><span>City </span>: {{ $profiles['city'] }}</p>
                        </div>
                        <div class="bio-row">
                          <p><span>Country </span>: {{ $profiles['country'] }}</p>
                        </div>
                        {{-- <div class="bio-row">
                          <p><span>Occupation </span>: UI Designer</p>
                        </div> --}}
                        <div class="bio-row">
                          <p><span>Email </span>: {{ $profiles['email'] }}</p>
                        </div>
                        {{-- <div class="bio-row">
                          <p><span>Phone </span>: (+021) 956 789123</p>
                        </div> --}}
                      </div>
                    </div>
                  </section>
                  <section>
                    <div class="row">
                    </div>
                  </section>
                </div>
                <!-- edit-profile -->
                <div id="edit-profile" class="tab-pane">
                  <section class="panel">
                    <div class="panel-body bio-graph-info">
                      <h1> Profile Info</h1>
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('update-profile') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="" value="{{ $id }}">
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Full Name</label>
                          <div class="col-lg-6">
                            <input type="text" name="name" class="form-control" id="f-name" placeholder=" " value="{{ $profiles['name'] }}">
                          </div>
                          <span style="color: #d93333; font-size: 10px;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</span>
                        </div>
                        {{-- <div class="form-group">
                          <label class="col-lg-2 control-label">Last Name</label>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" id="l-name" placeholder=" ">
                          </div>
                        </div> --}}
                        {{-- <div class="form-group">
                          <label class="col-lg-2 control-label">About Me</label>
                          <div class="col-lg-10">
                            <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                          </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">City</label>
                            <div class="col-lg-6">
                              <input type="text" name="city" class="form-control" id="c-name" placeholder=" " value="{{ $profiles['city'] }}">
                            </div>
                            <span style="color: #d93333; font-size: 10px;">@if($errors->has('city')) {{ $errors->first('city') }} @endif</span>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-6">
                              <input type="text" name="country" class="form-control" id="c-name" placeholder=" " value="{{ $profiles['country'] }}">
                            </div>
                            <span style="color: #d93333; font-size: 10px;">@if($errors->has('country')) {{ $errors->first('country') }} @endif</span>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label">Birthday</label>
                          <div class="col-lg-6">
                            <input type="date" name="dob" class="form-control" id="b-day" placeholder=" " value="{{ $profiles['dob'] }}">
                          </div>
                          <span style="color: #d93333; font-size: 10px;">@if($errors->has('dob')) {{ $errors->first('dob') }} @endif</span>
                        </div>
                        {{-- <div class="form-group">
                          <label class="col-lg-2 control-label">Occupation</label>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" id="occupation" placeholder=" ">
                          </div>
                        </div> --}}
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-6">
                            <input type="text" name="email" disabled class="form-control" id="email" placeholder=" " value="{{ $profiles['email'] }}">
                          </div>
                          <span style="color: #d93333; font-size: 10px;">@if($errors->has('email')) {{ $errors->first('email') }} @endif</span>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Mobile</label>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" id="mobile" name="phone" placeholder=" " value="{{ $profiles['phone'] }}">
                          </div>
                          <span style="color: #d93333; font-size: 10px;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</span>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">CCIE Track</label>
                            <div class="col-lg-6">
                              <select class="form-control" name="ccie[]" id="">
                                  <option value=""><--- Select ---></option>
                                  {{-- @foreach ($ccies as $key=>$ccie_track) --}}
                                  @foreach ($ccies as $keyItem => $ccie_selected_track)
                                      <option value="{{ $ccie_selected_track->id }}" >{{ $ccie_selected_track->name }}</option>
                                  @endforeach
                                  {{-- @endforeach --}}
                              </select>
                            </div>
                          </div>
                        {{-- <div class="form-group">
                          <label class="col-lg-2 control-label">Website URL</label>
                          <div class="col-lg-6">
                            <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                          </div>
                        </div> --}}

                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

    </section>
  </section>






    </div>
    <div class="widget-foot">
      <!-- Footer goes here -->
    </div>
  </div>
</div>

</div>

</div>
<!-- project team & activity end -->

      @endsection('content')
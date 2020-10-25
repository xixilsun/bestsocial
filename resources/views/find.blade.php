@extends('template.master')
@section('content')

<div id="content-page" class="content-page">
   <div class="container">
      <div class="row">
      	@foreach($users as $user)
         <?php $link_image = asset('template/images/user/'.$user->id.'.jpg');
         $bg_image = asset('template/images/page-img/profile-bg'.$user->id.'.jpg');
         ?>
         @if($user->id != Auth::id())
         <div class="col-md-6">
            <div class="iq-card">
               <div class="iq-card-body profile-page p-0">
                  <div class="profile-header-image">
                     <div class="cover-container">
                        <img src="{{$bg_image}}" alt="profile-bg" class="rounded img-fluid w-100">
                     </div>
                     <div class="profile-info p-4">
                        <div class="user-detail">
                           <div class="d-flex flex-wrap justify-content-between align-items-start">
                              <div class="profile-detail d-flex">
                                 <div class="profile-img pr-4">
                                    <img src="{{$link_image}}" alt="profile-img" class="avatar-130 img-fluid" />
                                 </div>
                                 <div class="user-data-block">
                                    <h4 class=""><a href="/profile/{{$user->id}}">{{$user->name}}</a></h4>
                                    <p>{{$user->biodata}}</p>
                                 </div>
                              </div>
                              <form action="/profile/{{Auth::id()}}" method="POST">
                              	@csrf
                              	<input type="hidden" name="follower_id" value="{{Auth::User()->id}}">
                              	<input type="hidden" name="following_id" value="{{$user->id}}">
                              	@if(Auth::User()->following()
                              		->where('follower_id', Auth::User()->id)
                              		->where('following_id', $user->id)->first() === null
                              	)
                              		<input type="hidden" name="type" value="follow">
                              		<input type="submit" class="btn btn-lg btn-primary" value="Follow">
                              	@else
                              		<input type="hidden" name="type" value="unfollow">
                              		<input type="submit" class="btn btn-lg btn-primary" value="Unfollow">
                              	@endif
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
         @endforeach
	   </div>
   </div>
</div>
@endsection
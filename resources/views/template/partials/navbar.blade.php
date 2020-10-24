<?php
   $link_image = asset('template/images/user/'.Auth::id().'.jpg');
?>
<div class="iq-top-navbar">
   <div class="iq-navbar-custom">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
         <div class="iq-navbar-logo d-flex justify-content-between">
            <a href="/feed">
            <img src="{{asset('template/images/logo.png')}}" class="img-fluid" alt="">
            <span>Best Social</span>
            </a>
            <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
               <div class="main-circle"><i class="ri-menu-line"></i></div>
            </div>
         </div>
         </div>
         <div class="iq-search-bar">
            <form action="#" class="searchbox">
               <input type="text" class="text search-input" placeholder="Type here to search...">
               <a class="search-link" href="#"><i class="ri-search-line"></i></a>
            </form>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
         <i class="ri-menu-3-line"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-list">
               <li>
                  <a href="/profile/{{Auth::User()->id}}" class="iq-waves-effect d-flex align-items-center">
                     <img src="{{ $link_image }}" class="img-fluid rounded-circle mr-3" alt="user">
                     <div class="caption">
                        <h6 class="mb-0 line-height">{{Auth::User()->name}}</h6>
                     </div>
                  </a>
               </li>
               
            </ul>
            <ul class="navbar-list">
               <li>
                  <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                  <i class="ri-arrow-down-s-fill"></i>
                  </a>
                  <div class="iq-sub-dropdown iq-user-dropdown">
                     <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 ">
                           <div class="bg-primary p-3 line-height">
                              <h5 class="mb-0 text-white line-height">Hello {{Auth::User()->name}}</h5>
                              <span class="text-white font-size-12">Available</span>
                           </div>
                           <a href="/profile/{{Auth::id()}}" class="iq-sub-card iq-bg-primary-hover">
                              <div class="media align-items-center">
                                 <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-file-user-line"></i>
                                 </div>
                                 <div class="media-body ml-3">
                                    <h6 class="mb-0 ">My Profile</h6>
                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                 </div>
                              </div>
                           </a>
                           
                           <div class="d-inline-block w-100 text-center p-3">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              <i class="ri-login-box-line ml-2"></i></a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>
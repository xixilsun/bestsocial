@extends('template.master')
@section('content')
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                <div class="iq-card-body profile-page p-0">
                    <div class="profile-header">
                        <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                            <div class="profile-detail d-flex">
                                    <h3 class="">{{App\User::find($id)->name}}</h3>
                            </div>
                            @if(Auth::User()->id != $id)
                                <form action="/profile/{{$id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="follower_id" value="{{Auth::User()->id}}">
                                    <input type="hidden" name="following_id" value="{{$id}}">
                                    @if(Auth::User()->following()
                                        ->where('follower_id', Auth::User()->id)
                                        ->where('following_id', $id)->first() === null
                                    )
                                        <input type="hidden" name="type" value="follow">
                                        <input type="submit" class="btn btn-lg btn-primary" value="Follow">
                                    @else
                                        <input type="hidden" name="type" value="unfollow">
                                        <input type="submit" class="btn btn-lg btn-primary" value="Unfollow">
                                    @endif
                                </form>
                            @endif
                            <div class="social-info">
                                <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                    <li class="text-center pl-3">
                                        <h6>Followers</h6>
                                        <p class="mb-0">{{App\User::find($id)->follower()->where('following_id','=',$id)->count()}}</p>
                                    </li>
                                    <li class="text-center pl-3">
                                        <h6>Following</h6>
                                        <p class="mb-0">{{App\User::find($id)->following()->where('follower_id','=',$id)->count()}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
                <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="user-tabing">
                        <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                            <li class="col-sm-6 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                            </li>
                            <li class="col-sm-6 p-0">
                            <a class="nav-link" data-toggle="pill" href="#about">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="tab-content">
                <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                    <div class="iq-card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(Auth::User()->id == $id)
                                <div id="post-modal-data" class="iq-card">
                                    <h4 class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#post-modal">New Post</h4>
                                    <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="post-modalLabel">New Post</h5>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex align-items-center">
                                                    <form class="post-text ml-3 w-100" action="/post/create" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control rounded @error('caption') is-invalid @enderror" placeholder="Insert caption here..." style="border:none;" name="caption" id="caption">
                                                            @error('caption')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group ml-2">
                                                            <label for="picture" class = "btn btn-primary">Upload Picture</label>
                                                            <input type="file" class="form-control-file" hidden name="picture" id="picture">
                                                            @error('picture')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <input type="submit"class="btn btn-primary d-block w-100 mt-3" value="Post">
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    @foreach(App\User::find($id)->posts as $post)
                                    <div class="post-item">
                                        <div class="user-post-data p-3">
                                        
                                        <div class="d-flex flex-wrap">
                                            <div id="post-modal-data" class="iq-card">
                                                <div class="modal fade" id="edit-post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="post-modalLabel">Edit Post</h5>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex align-items-center">
                                                                <form class="post-text ml-3 w-100" action="/post/create" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control rounded @error('caption') is-invalid @enderror" placeholder="Insert caption here..." style="border:none;" name="caption" id="caption">
                                                                        @error('caption')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group ml-2">
                                                                        <label for="picture" class = "btn btn-primary">Upload Picture</label>
                                                                        <input type="file" class="form-control-file" hidden name="picture" id="picture">
                                                                        @error('picture')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <input type="submit"class="btn btn-primary d-block w-100 mt-3" value="Post">
                                                                </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle img-fluid" src="images/user/1.jpg" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h5 class="mb-0 d-inline-block"><a href="#" class="">{{$post->user->name}}</a></h5>
                                                <p class="ml-1 mb-0 d-inline-block">{{$post->caption}}</p>
                                                <!-- <p class="mb-0">3 hour ago</p> -->
                                            </div>
                                            <div class="iq-card-post-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                    <i class="ri-more-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu m-0 p-0">
                                                    <a class="dropdown-item p-3" data-toggle="modal" data-target="#edit-post-modal">
                                                        <div class="d-flex align-items-top">
                                                            <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                            <div class="data ml-2">
                                                                <h6>Edit Post</h6>
                                                                <p class="mb-0">Update your post</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item p-3" href="/post/{{$post->post_id}}/delete">
                                                        <div class="d-flex align-items-top">
                                                            <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
                                                            <div class="data ml-2">
                                                                <h6>Delete</h6>
                                                                <p class="mb-0">Remove this Post from Timeline</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="user-post">
                                        <a href="javascript:void();"><img src="images/page-img/p1.jpg" alt="post-image" class="img-fluid w-100" /></a>
                                        </div>
                                        <div class="comment-area mt-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="like-block position-relative d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="like-data">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                        <img src="images/icon/01.png" class="img-fluid" alt="">
                                                        </span>
                                                    </div>
                                                    </div>
                                                    <div class="total-like-block ml-2 mr-3">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                        {{$post->post_likes()->count()}} likes
                                                        </span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="total-comment-block">
                                                    <div class="dropdown">
                                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                    {{$post->post_comments()->count()}} comments
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <ul class="post-comments p-0 m-0">
                                            <li class="mb-2">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-img">
                                                    <img src="images/user/02.jpg" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                    </div>
                                                    <div class="comment-data-block ml-3">
                                                    <h6>Monty Carlo</h6>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                        <a href="javascript:void();">like</a>
                                                        <a href="javascript:void();">reply</a>
                                                        <a href="javascript:void();">translate</a>
                                                        <span> 5 min </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="row">
                            <div class="col-md-3">
                                <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                    <li>
                                        <a class="nav-link active" data-toggle="pill" href="#basicinfo">Biodata</a>
                                    </li>
                                    @if(Auth::User()->id == $id)
                                    <li>
                                        <a class="nav-link" data-toggle="pill" href="#edit">Edit Profile</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-9 pl-4">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                        @if(Auth::User()->id != $id)
                                            <h4>{{App\User::find($id)->name}}'s Biodata</h4>
                                        @else
                                            <h4>My Biodata</h4>
                                        @endif
                                        <hr>
                                        <p>{{App\User::find($id)->biodata}}</p>
                                    </div>
                                    <div class="tab-pane fade" id="edit" role="tabpanel">
                                        <h4 class="mb-3">Edit Profile</h4>
                                        <div class="sign-in-from">
                                            <form class="mt-4" method="POST" action="/profile/{{Auth::User()->id}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Your Full Name</label>
                                                    <input type="text" id="name" class="form-control mb-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name',Auth::User()->name) }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Email address</label>
                                                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email',Auth::User()->email) }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="biodata">Biodata</label>
                                                    <input type="text" class="form-control mb-0 @error('biodata') is-invalid @enderror" name="biodata" value="{{ old('biodata',Auth::User()->biodata) }}" required autocomplete="biodata">
                                                    @error('biodata')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Old Password</label>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control mb-0 @error('old_password') is-invalid @enderror" name="old_password" required id="old_password">
                                                            @error('old_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="password">New Password</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="password">Confirm New Password</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror    
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-inline-block w-100">
                                                    <button type="submit" class="btn btn-primary float-right">Edit Profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
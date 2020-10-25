@extends('template.master')
@section('content')
<div id="content-page" class="content-page">
	<div class="container">
		<div class="row">
			<!-- Main posts -->
			<div class="col-lg-8 row m-0 p-0">
				<div class="col-sm-12">
					<div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">Create Post</h4>
							</div>
						</div>
						<div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
							<div class="d-flex align-items-center">
								<div class="user-img">
									<img src="{{asset('template/images/user/1.jpg')}}" alt="userimg" class="avatar-60 rounded-circle">
								</div>
								<form class="post-text ml-3 w-100" action="javascript:void();">
									@csrf
									<input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
								</form>
							</div>
							<hr>
							<ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
								<li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('template/images/small/07.png')}}" alt="icon" class="img-fluid"> Photo/Video</li>
							</ul>
						</div>
						<div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="post-modalLabel">Create Post</h5>
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
									</div>
									<div class="modal-body">
										<form role="form" action="/feed" method="POST" enctype="multipart/form-data">
										@csrf
											<div class="d-flex align-items-center">
												<div class="user-img">
													<img src="{{asset('template/images/user/1.jpg')}}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
												</div>
												<div class="post-text ml-3 w-100">
														<input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;" name="caption" id="caption">
														<div class="form-group ml-2">
															<label for="picture" class = "btn btn-primary">Upload Picture</label>
															<input type="file" class="form-control-file custom-file-input" hidden name="picture" id="picture">
															<label for="" class="" id="picture-file"></label>
															@error('picture')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>

														<input type="text" class="form-control rounded" placeholder="Contoh doang" style="border:none;" name="picture" id="picture">
												</div>
											</div>
											<hr>
											<input type="submit"class="btn btn-primary d-block w-100 mt-3 btnpost" disabled = "disabled" value="Post">
											<!-- <button type="submit" class="btn btn-primary d-block w-100 mt-3 btnpost" disabled = "disabled">Post</button> -->
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@forelse($post as $posts)
					<?php
						$post_image_profile = asset('template/images/user/'.$posts->user_id.'.jpg');
					?>
					<div class="col-sm-12">
					   <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
					      <div class="iq-card-body">
					         <div class="user-post-data">
					            <div class="d-flex flex-wrap">
					               <div class="media-support-user-img mr-3">
					                  <img class="rounded-circle img-fluid" src="{{$post_image_profile}}" alt="">
					               </div>
					               <div class="media-support-info mt-2">
					                  <h5 class="mb-0 d-inline-block"><a href="/profile/{{$posts->user_id}}" class="">{{$posts->user->name}}</a></h5>
					                  <p class="mb-0 d-inline-block align-content-center"><i class="ri-earth-fill" style="font-size: 15px;">&nbsp;<span style="font-family: 'Poppins';font-size: 16px; !important">Public</span></i></p>
					                  <p class="mb-0 text-primary">
					                  		<?php
					                  		$datetime1 = new DateTime(); // Today's Date/Time
					                  		$datetime2 = $posts->created_at;
					                  		$interval = date_diff($datetime1, $datetime2);
					                  		if ($interval->format('%D')>0) {
					                  			echo intval($interval->format('%D')).' days ago';
					                  		}
					                  		elseif ($interval->format('%H')>0) {
					                  			echo intval($interval->format('%H')).' hours ago';
					                  		}
					                  		elseif ($interval->format('%I')>0) {
					                  			echo intval($interval->format('%I')).' minutes ago';
					                  		}
					                  		else{
					                  			echo intval($interval->format('%s')).' seconds ago';
					                  		}
					                  		?>
					                  </p>
					               	</div>
									@if($posts->user->id == Auth::User()->id)
									<div id="post-modal-data" class="iq-card">
												<div class="modal fade" id="edit-post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="post-modalLabel">Edit Post</h5>
															<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
														</div>
														<div class="modal-body">
															<form role="form" action="/post/{{$posts->post_id}}/edit" method="post" enctype="multipart/form-data">
															@csrf
																<div class="d-flex align-items-center">
																	<div class="user-img">
																		<img src="{{asset('template/images/user/1.jpg')}}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
																	</div>
																	<div class="post-text ml-3 w-100">
																			<input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;" name="caption" id="caption">
																			<div class="form-group ml-2">
																				<label for="image" class = "btn btn-primary">Upload Picture</label>
																				<input type="file" class="form-control-file custom-file-input" hidden name="image" id="picture">
																				<!-- <input type="file" name="image" id="image"> -->
																				<label for="" class="" id="image-file"></label>
																				@error('image')
																					<span class="invalid-feedback" role="alert">
																						<strong>{{ $message }}</strong>
																					</span>
																				@enderror
																			</div>

																			<input type="text" class="form-control rounded" placeholder="Contoh doang" style="border:none;" name="picture" id="picture">
																	</div>
																</div>
																<hr>
																<input type="submit"class="btn btn-primary d-block w-100 mt-3 btnpost"  value="Edit Post">
																<!-- <button type="submit" class="btn btn-primary d-block w-100 mt-3 btnpost" disabled = "disabled">Post</button> -->
															</form>
														</div>
														<!-- <div class="modal-body">
															<div class="d-flex align-items-center">
																<form class="post-text ml-3 w-100" action="/feed/{{$posts->post_id}}/edit" enctype="multipart/form-data" method="GET">
																	@csrf
																	<div class="form-group">
																		<input type="text" class="form-control rounded @error('caption') is-invalid @enderror" placeholder="Write something here..." style="border:none;" name="caption" id="edit-caption">
																		@error('edit-caption')
																			<span class="invalid-feedback" role="alert">
																				<strong>{{ $message }}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="form-group ml-2">
																		<label for="picture" class = "btn btn-primary">Upload Picture</label>
																		<input type="file" class="form-control-file custom-file-input" hidden name="picture" id="picture">
																		<label for="" class="" id="picture-file"></label>
																		@error('picture')
																			<span class="invalid-feedback" role="alert">
																				<strong>{{ $message }}</strong>
																			</span>
																		@enderror
																	</div>
																	<input type="submit"class="btn btn-primary d-block w-100 mt-3" value="Post">
																</form>
															</div>
														</div> -->
														</div>
													</div>
												</div>
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
											<form action="/post/{{$posts->post_id}}/delete" method="POST">
											@csrf
											@method('DELETE')
											
											<a class="dropdown-item p-3">
												<div class="d-flex align-items-top">
													<div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
													<div class="data ml-2">
														<input type="submit" value="Delete" >
														<!-- <h6>Delete</h6> -->
														<p class="mb-0">Remove this Post from Timeline</p>
													</div>
												</div>
											</a>
											</form>
											
											</div>
										</div>
									</div>
									@endif
					            </div>
					         </div>
					         <div class="mt-3">
					            <p>{{$posts->caption}}</p>
					         </div>
					         <div class="user-post">
					            <a href="javascript:void();"><img src="{{asset('storage/image/posts/'.$posts->picture)}}" alt="" class="img-fluid rounded w-100"></a>
					         </div>
					         <div class="comment-area mt-3">
					            <div class="d-flex justify-content-between align-items-center">
					               <div class="like-block position-relative d-flex align-items-center">
					                  <div class="d-flex align-items-center">
					                     <div class="like-data">
					                        <div class="dropdown">
					                          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
					                          @if(Auth::User()->post_likes()
					                          	->where('user_id', Auth::User()->id)
					                          	->where('post_id', $posts->post_id)->first() == null
					                          )
				                   	            <form class="d-flex align-items-center" role="form" action="/like" method="POST">
                   								@csrf
				                   	              <input type="text" class="form-control rounded" name="post_id"  value="{{$posts->post_id}}" hidden>
					                          	<input class="ml-2 mr-2 align-items-center" type="image" src="{{asset('template/images/icon/like.png')}}" data-toggle="tooltip" data-placement="top" data-original-title="Like" >
					                          	
					                          </form>
					                          @else
				                   	            <form class="d-flex align-items-center" role="form" action="/dislike/{{Auth::User()->post_likes()
					                          	->where('user_id', Auth::User()->id)
					                          	->where('post_id', $posts->post_id)->first()->post_like_id}}" method="POST">
                   								@csrf
					                          	<input class="ml-2 mr-2 align-items-center" type="image" src="{{asset('template/images/icon/dislike.png')}}" data-toggle="tooltip" data-placement="top" data-original-title="Dislike" >
					                          	
					                          </form>
					                          @endif
					                          </span>
					                        </div>
					                     </div>
					                     <div class="total-like-block ml-2 mr-3">
					                        <div class="dropdown">
					                           <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
					                           {{$posts->post_likes()->count()}} Likes
					                           </span>
					                           @if($posts->post_likes()->count()!=0)
					                           <div class="dropdown-menu">
					                           		@foreach(App\Post::find($posts->post_id)->post_likes as $like) 
					                              <a class="dropdown-item" href="#">{{$like->user->name}}</a>
					                              @endforeach
					                           </div>
					                           @endif
					                        </div>
					                     </div>
					                  </div>
					                  <div class="total-comment-block">
					                     <div class="dropdown">
					                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
					                        {{$posts->post_comments()->count()}} Comment
					                        </span>
					                       
					                     </div>
					                  </div>
					               </div>
					               <div class="share-block d-flex align-items-center feather-icon mr-3">
					                  <a href="javascript:void();"><i class="ri-share-line"></i>
					                  <span class="ml-1">Share</span></a>
					               </div>
					            </div>
					            <hr>
					            <ul class="post-comments p-0 m-0">
					            	@forelse(App\Post::find($posts->post_id)->post_comments as $komen)
					            	<?php $image_komen = asset('template/images/user/'.$komen->user_id.'.jpg');
					            	?>
					               <li class="mb-2">
					                  <div class="d-flex flex-wrap">
					                     <div class="user-img">
					                        <img src="{{$image_komen}}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
					                     </div>
					                     <div class="comment-data-block ml-3">
					                        <h6><a href="/profile/{{$komen->user_id}}"> {{$komen->user->name}}</a></h6>
					                        <p class="mb-0">{{$komen->comment}}</p>
					                        <div class="d-flex flex-wrap align-items-center comment-activity">
					                           <a href="javascript:void();">Like</a>
					                           @if(Auth::id()==$komen->user_id)
					                           <a href="/delete_comment/{{$komen->post_comment_id}}">delete</a>
					                           @endif
					                           <span> {{$komen->post_comment_likes()->count()}} Like</span>
					                        </div>
					                     </div>
					                  </div>
					               </li>
					              @empty
					               <li></li>
					              @endforelse
					            </ul>
					            <form class="comment-text d-flex align-items-center mt-3" role="form" action="/comment" method="POST">
									@csrf
					            	<input type="text" class="form-control rounded" name="post_id"  value="{{$posts->post_id}}" hidden>
						            <input type="text" class="form-control rounded" name="comment" style="border-color: #aaa" placeholder="Masukkan komentar...">
						            <div class="comment-attagement d-flex">
						                <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
						              </div>
					            </form>
					         </div>
					      </div>
					   </div>
					</div>
				@empty
				<div class="col-sm-12 text-center">
				</div>
				@endforelse
				
			</div>
			<!-- Events -->
			<div class="col-lg-4">
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Events</h4>
						</div>
						<div class="iq-card-header-toolbar d-flex align-items-center">
							<div class="dropdown">
								<span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" role="button">
								<i class="ri-more-fill" style ="cursor:pointer"></i>
								</span>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
									<a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
									<a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
									<a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
									<a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
									<a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
								</div>
							</div>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="media-story m-0 p-0">
							<li class="d-flex mb-4 align-items-center ">
								<img src="{{asset('template/images/page-img/s4.jpg')}}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Web Workshop</h5>
									<p class="mb-0">1 hour ago</p>
								</div>
							</li>
							<li class="d-flex align-items-center">
								<img src="{{asset('template/images/page-img/s5.jpg')}}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Fun Events and Festivals</h5>
									<p class="mb-0">1 hour ago</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Upcoming Birthday</h4>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="media-story m-0 p-0">
							<li class="d-flex mb-4 align-items-center">
								<img src="{{asset('template/images/user/10.jpg')}}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Anna Sthesia</h5>
									<p class="mb-0">Today</p>
								</div>
							</li>
							<li class="d-flex align-items-center">
								<img src="{{asset('template/images/user/12.jpg')}}" alt="story-img" class="rounded-circle img-fluid">
								<div class="stories-data ml-3">
									<h5>Paul Molive</h5>
									<p class="mb-0">Tomorrow</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="iq-card">
					<div class="iq-card-header d-flex justify-content-between">
						<div class="iq-header-title">
							<h4 class="card-title">Suggested Pages</h4>
						</div>
						<div class="iq-card-header-toolbar d-flex align-items-center">
							<div class="dropdown">
								<span class="dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="false" role="button">
								<i class="ri-more-fill" style ="cursor:pointer"></i>
								</span>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01" style="">
									<a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
									<a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
									<a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
									<a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
									<a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
								</div>
							</div>
						</div>
					</div>
					<div class="iq-card-body">
						<ul class="suggested-page-story m-0 p-0 list-inline">
							<li class="mb-3">
								<div class="d-flex align-items-center mb-3">
									<img src="{{asset('template/images/page-img/42.png')}}" alt="story-img" class="rounded-circle img-fluid avatar-50">
									<div class="stories-data ml-3">
										<h5>Iqonic Studio</h5>
										<p class="mb-0">Lorem Ipsum</p>
									</div>
								</div>
								<img src="{{asset('template/images/small/img-1.jpg')}}" class="img-fluid rounded" alt="Responsive image">
								<div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i> Like Page</a></div>
							</li>
							<li class="">
								<div class="d-flex align-items-center mb-3">
									<img src="{{asset('template/images/page-img/42.png')}}" alt="story-img" class="rounded-circle img-fluid avatar-50">
									<div class="stories-data ml-3">
										<h5>Cakes & Bakes </h5>
										<p class="mb-0">Lorem Ipsum</p>
									</div>
								</div>
								<img src="{{asset('template/images/small/img-2.jpg')}}" class="img-fluid rounded" alt="Responsive image">
								<div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i> Like Page</a></div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<img src="{{asset('template/images/page-img/page-load-loader.gif')}}" alt="loader" style="height: 100px;">
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#picture').keyup(function(){
	    	if($(this).val().length !=0){
	    			$('.btnpost').attr('disabled', false);
	    	}
	    	else{
	    		$('.btnpost').attr('disabled', true);
	    	}
      });
  		$('#caption').keyup(function(){
	    	if($(this).val().length !=0){
	    			$('.btnpost').attr('disabled', false);
	    	}
	    	else{
	    		$('.btnpost').attr('disabled', true);
	    	}
	    });
	document.querySelector('.custom-file-input').addEventListener('change',function(e){
		var fileName = document.getElementById("picture").files[0].name;
		var nextSibling = document.getElementById("picture-file");
		nextSibling.innerText = fileName
	});
	document.querySelector('.edit-custom-file-input').addEventListener('change',function(e){
		var fileName = document.getElementById("edit-picture").files[0].name;
		var nextSibling = document.getElementById("edit-picture-file");
		nextSibling.innerText = fileName
	})
	});


</script>

@endpush
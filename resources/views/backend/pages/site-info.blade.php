@extends('backend.master');
@section('maincontent')	
	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Site Info</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Site Info</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											@if(!empty($site_info->logo))
											<img src="{{asset($site_info->logo)}}" alt="SiteInfo" class=" p-1 change_image" width="110">
											@else
											<img src="{{asset('uploads/siteinfo/demologo.webp')}}" alt="SiteInfo" class=" p-1  change_image" width="110">
											@endif
											<div class="mt-3">
												<h4>{{$site_info->name}}</h4>
												{{-- <p class="text-secondary mb-1">Full Stack Developer</p> --}}
												<p class="text-muted font-size-sm">{{$site_info->address}}</p>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li>
											
											
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<form action="{{route('siteInfo.setting.update',$site_info->id)}}" method="post" enctype="multipart/form-data">
											@csrf
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Site Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="name" value="{{$site_info->name}}" />
													@error('name')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="email" value="{{$site_info->email}}" />
													@error('email')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Phone</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="phone" value="{{$site_info->phone}}" />
													@error('phone')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Address</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="address" value="{{$site_info->address}}" />
													@error('address')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Logo image</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="file" class="form-control file_image" name="logo" />
													@error('logo')
														<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>

                                            <div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Short Description</h6>
												</div>
												<div class="col-sm-9 text-secondary">
                                                    <textarea name="description" id="" class="form-control" cols="5" rows="5">{{$site_info->description}}</textarea>
													@error('description')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
                                            <div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Facebook link</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="facebook" value="{{$site_info->facebook}}" />
													@error('facebook')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
                                            <div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Linkdin link</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="linkdin" value="{{$site_info->linkdin}}" />
													@error('linkdin')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
                                            <div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Instagram link</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="instagram" value="{{$site_info->instagram}}" />
													@error('instagram')
													<p class="text-danger ">{{$message}}</p>
													@enderror
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
												</div>
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
		<!--end page wrapper -->
@endsection
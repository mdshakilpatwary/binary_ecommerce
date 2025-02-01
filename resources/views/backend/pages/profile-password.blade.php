@extends('backend.master');
@section('maincontent')	
	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profilep</li>
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
											<img src="{{asset($user->image)}}" alt="Admin" class="rounded-circle p-1 bg-primary change_image" width="110">
											<div class="mt-3">
												<h4>{{$user->name}}</h4>
												{{-- <p class="text-secondary mb-1">Full Stack Developer</p> --}}
												<p class="text-muted font-size-sm">{{$user->address}}</p>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										
                                        <div class="">
                                            <h4 class="font-weight-bold">Genrate Password</h4>
                                            @if(session('error'))
                                                <div class="alert alert-danger test-info">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form action="{{ route('admin.profile.password.update', $user->id) }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputChoosePassword" class="form-label">Enter Old Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="{{old('oldPassword')}}" name="oldPassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                    @error('oldPassword')
                                                    <p class="text-danger ">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputChoosePassword" class="form-label">Enter New Password</label>
                                                    <div class="input-group" id="show_hide_password_1">
                                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="{{old('newPassword')}}" name="newPassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                    @error('newPassword')
                                                    <p class="text-danger ">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputChoosePassword" class="form-label">Enter Confirm Password</label>
                                                    <div class="input-group" id="show_hide_password_2">
                                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="{{old('confirmPassword')}}" name="confirmPassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                    @error('confirmPassword')
                                                    <p class="text-danger ">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
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
		<!--end page wrapper -->

   
@endsection

@section('script_js')
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
        $("#show_hide_password_1 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_1 input').attr("type") == "text") {
                $('#show_hide_password_1 input').attr('type', 'password');
                $('#show_hide_password_1 i').addClass("bx-hide");
                $('#show_hide_password_1 i').removeClass("bx-show");
            } else if ($('#show_hide_password_1 input').attr("type") == "password") {
                $('#show_hide_password_1 input').attr('type', 'text');
                $('#show_hide_password_1 i').removeClass("bx-hide");
                $('#show_hide_password_1 i').addClass("bx-show");
            }
        });
        $("#show_hide_password_2 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_2 input').attr("type") == "text") {
                $('#show_hide_password_2 input').attr('type', 'password');
                $('#show_hide_password_2 i').addClass("bx-hide");
                $('#show_hide_password_2 i').removeClass("bx-show");
            } else if ($('#show_hide_password_2 input').attr("type") == "password") {
                $('#show_hide_password_2 input').attr('type', 'text');
                $('#show_hide_password_2 i').removeClass("bx-hide");
                $('#show_hide_password_2 i').addClass("bx-show");
            }
        });
    });
</script>
@endsection

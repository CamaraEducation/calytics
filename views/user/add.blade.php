@extends('layout.app')
@section('title', 'Manic')
@section('menu', 'track')
@section('submenu', 'upload')
@section('styles')
    @css('/assets/vendor/dropzone/dropzone.min')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create a New User</div>
                    </div>
                    <div class="card-body">
                        <div id="error"></div>
                        <div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input class="form-control" name="fname" id="fname" type="text" placeholder="Enter first name">
                                                    <span class="input-group-text">
                                                        <i class="icon-user1"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">Fisrt Name</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input class="form-control" name="lname" id="lname" type="text" placeholder="Enter last name">
                                                    <span class="input-group-text">
                                                        <i class="icon-user1"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">Last Name</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Enter last name">
                                                    <span class="input-group-text">
                                                        <i class="icon-email"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">Email Address</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">Select user Role</option>
                                                        <option value="admin">Administrator</option>
                                                        <option value="stake">Stake Holder</option>
                                                        <option value="school">School Admin</option>
                                                    </select>
                                                    <span class="input-group-text">
                                                        <i class="icon-sports-club"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">User Role</div>
                                            </div>
                                        </div>
                                        <div class="space"></div>
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary col-md-3" id="create">
                                                Create User
                                            </button>
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
@section('scripts')
<script>
// on click of create button
$('#create').click(function(){
    // get the values
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var role = $('#role').val();
    // check if all fields are filled
    if(fname == '' || lname == '' || email == '' || role == ''){
        // show error message
        $('#error').html('<div class="alert alert-danger">All fields are required</div>');
    }else{
        // show loading spinner
        $('#create').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        // send ajax request
        $.ajax({
            url: '/user/create',
            type: 'POST',
            data: {
                fname: fname,
                lname: lname,
                email: email,
                role: role
            },
            success: function(data){
                if(data == 'success'){
                    $('#error').html('<div class="alert alert-success">User created successfully</div>');
                    // clear the form
                    $('#fname').val('');
                    $('#lname').val('');
                    $('#email').val('');
                    $('#role').val('');
                    // hide the loading spinner
                    $('#create').html('Create User');
                }else{
                    $('#error').html('<div class="alert alert-danger">'+data+'</div>');
                    // hide the loading spinner
                    $('#create').html('Create User');
                }
            },
            error: function(data){
                // show error message
                $('#error').html('<div class="alert alert-danger">Unknon Error Occured</div>');
                // hide the loading spinner
                $('#create').html('Create User');
            }
        });
    }

    //hide error message after 3 seconds
    setTimeout(function(){
        $('#error').html('');
    }, 3000);
});
</script>
@endsection
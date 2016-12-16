@extends('Fontend.layouts.master')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div id="app_login">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-4">
                <form action="{{route('user.login.post')}}" method="post" id="form_login">
                    <div class="form-group">
                        <label for="email" class="text-primary">Username or Email</label>
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-primary">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="remember_user">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember</label>
                        <button type="button" class="btn btn-info" id="btn_register" data-toggle="modal" data-target="#modal_register">
                            Register
                        </button>
                        <button type="button" class="btn btn-primary" id="get_password">
                            Forgotten account ?
                        </button>
                    </div>
                    <div class="form-group btn_login">
                        <button type="submit" class="btn btn-success" id="btn_login">
                            Login
                        </button>
                    </div>
                    <div class="error_ajax"></div>
                    {{csrf_field()}}
                </form>
            </div>

            <div class="modal fade" tabindex="-1" id="modal_register">
                 <form action="{{route('user.register')}}" method="post" id="form-register">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title title_register">Sign up member</h4>
                        <div class="error_register"></div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-success text-center success_register text-capitalize"></div>
                        </div>
                      </div>
                      <div class="content_register">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="first_name">First Name</label>
                                   <input type="text" class="form-control" name="first_name" id="first_name">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                   <input type="text" class="form-control" name="last_name" id="last_name">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="last_name_initial">Last Name Initial</label>
                                   <input type="text" class="form-control" name="last_name_initial" id="last_name_initial" disabled="disabled">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="city">City</label>
                                   <input type="text" class="form-control" name="city" id="city">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="state">State</label>
                                   <input type="text" class="form-control" name="state" id="state">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="zip_code">Zip Code</label>
                                   <input type="number" class="form-control" name="zip_code" id="zip_code">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="country">Country</label>
                                   <input type="text" class="form-control" name="country" id="country">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="username">User Name</label>
                                   <input type="text" class="form-control" name="username" id="username">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group pass_register">
                                  <label for="pass_register">Password</label>
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                 <input type="password" class="form-control" name="pass_register" id="pass_register">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="email_register">Email Address</label>
                                  <input type="text" class="form-control" name="email_register" id="email_register">
                              </div>
                              <input type="hidden" name="token" value="{{Session::token()}}" id="token">
                          </div>
                          <div class="privacy_terms">
                              <a href="#" id="modal_terms">Click To See Privacy and Terms <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <!-- Modal Terms -->
                                <div class="col-md-9 infomation_terms">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <button type="button" id="agree_terms" class="btn btn-info">I Agree</button>
                                </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <div class="btn_modal_register">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" id="save_register">Register</button>
                          </div>
                      </div>
                    </div>
                  </div>

                  </form>
                </div>

        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function($){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#form_login").validate({
            rules:{
                email:{
                    required: true,
                    email: false
                },
                password:{
                    required: true
                }
            },
            messages: {
                email: {
                    required: 'Please enter email address !',
                    email: "Please enter a valid email address !"
                },
                password: {
                    required: 'Please enter password !',
                },
            }
        });
        $(".error_ajax").hide();
        var ajax_handing = false;
        $("#form_login").submit(function(e){
            e.preventDefault();
            if($(".error").text() == ""){
                if(ajax_handing == true){
                    swal("Just a moment !");
                    return false;
                }
                ajax_handing = true;
                $.ajax({
                    url:"login",
                    type:"POST",
                    data:{
                        email : $("#email").val(),
                        password : $("#password").val(),
                        remember : $("#remember").val(),
                    },
                    success:function(result){
                        window.location.href="{{route('user.dashboard')}}";
                    },
                    error:function(note){
                        var error = "";
                        $.each(note.responseJSON,function(key,value){
                            error+="<ul class='list-group'><li class='list-group-item text-center text-capitalize'>"+value+"</li></ul>";
                        });
                        $(".error_ajax").slideDown("fast").html(error);
                        $("#email").focus();
                        }
                    }).always(function(){
                        ajax_handing = false;
                });
            }
        });

        // register member
        $("#form-register").validate({
            rules:{
                first_name:{required: true},
                last_name:{required: true},
                city:{required: true},
                state:{required: true},
                zip_code:{required: true},
                country:{required: true},
                first_name:{required: true},
                username:{required: true},
                pass_register:{required: true},
                email_register:{required: true,email:true},
            }
        });

        $("#form-register").submit(function(e){
            e.preventDefault();
        });

        $("#last_name").change(function(){
            var last_name_initial = this.value.charAt(0)
            $("#last_name_initial").val(last_name_initial);
        });

        $(".infomation_terms").hide()
        $("#modal_terms").click(function(){
            $(".infomation_terms").stop().slideToggle();

        });

        $(".pass_register i").click(function(){
            if($("#pass_register").attr('type') == "password"){
                $("#pass_register").attr('type','text');
            }else{
                $("#pass_register").attr('type','password');
            }
        });

        $(".error_register").hide();
        $(".success_register").hide();
        $("#form-register").submit(function(e){
            e.preventDefault();
            if($(".error").text() == ""){
                if(ajax_handing == true){
                    swal("Just a moment !");
                    return false;
                }
                ajax_handing = true;
                $.ajax({
                    url:"register",
                    type:"POST",
                    data:{
                        first_name : $("#first_name").val(),
                        last_name : $("#last_name").val(),
                        last_name_initial : $("#last_name_initial").val(),
                        city : $("#city").val(),
                        state : $("#state").val(),
                        zip_code : $("#zip_code").val(),
                        country : $("#country").val(),
                        username : $("#username").val(),
                        pass_register : $("#pass_register").val(),
                        email_register : $("#email_register").val(),
                        token : $("#token").val(),
                    },
                    success:function(result){
                        $(".success_register").slideDown("fast").html(result['success']);
                        setTimeout(function(){
                            $("#modal_register").modal('hide');
                        },1500);
                        setTimeout(function(){
                            window.location.href="{{route('user.dashboard')}}";
                        },1800);
                    },
                    error:function(note){
                        var error = "";
                        $.each(note.responseJSON,function(key,value){
                            error+="<ul><li class='text-capitalize'>"+value+"</li></ul>";
                        });
                        $(".error_register").slideDown("fast").html(error);
                        }
                    }).always(function(){
                        ajax_handing = false;
                    });
                }
        });
});

</script>
@endsection

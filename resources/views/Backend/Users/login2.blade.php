@extends('Fontend.layouts.master')
@section('css')
<link rel="stylesheet" href="{{URL::to('public/css/form_login.css')}}">
@endsection
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div id="app_login">


               <div class="form">
                   <ul class="tab-group">
                        <li class="tab active"><a href="#login">Log In</a></li>
                        <li class="tab"><a href="#signup">Sign Up</a></li>
                   </ul>



                   <div class="tab-content">



                        <div id="login">
                          <h1>Welcome Back!</h1>
                            <form action="{{route('user.login.post')}}" method="post" id="form_login">
                            <div class="field-wrap">
                            <label>
                             Username or Email<span class="req">*</span>
                            </label>
                            <input type="text" id="email" name="email">
                          </div>

                          <div class="field-wrap">
                            <label>
                             Password<span class="req">*</span>
                            </label>
                            <input type="password" id="password" name="password">
                          </div>

                          <p class="forgot"><a href="#">Forgot Password?</a></p>
                          <input type="hidden" name="_token" value="{{Session::token()}}">
                                <button  type="submit" class="button button-block" id="btn_login"/>Log In</button>

                              <div class="error_ajax"></div>
                          </form>

                        </div>




                     <div id="signup">
                         <form action="{{route('user.register')}}" method="post" id="form-register">
                               <h1>Sign Up for Free</h1>

                        <div class="error_register"></div>
                        <h4 class="alert alert-success text-center success_register text-capitalize"></h4>
                       <div class="top-row">

                         <div class="field-wrap">
                           <label>
                             First Name<span class="req">*</span>
                           </label>
                           <input type="text" name="first_name" id="first_name">
                         </div>

                         <div class="field-wrap">
                           <label>
                             Last Name<span class="req">*</span>
                           </label>
                           <input type="text" name="last_name" id="last_name">
                         </div>

                         </div>
                                 <input type="hidden" name="last_name_initial" id="last_name_initial" disabled="disabled">



                         <div class="top-row">


                             <div class="field-wrap">
                               <label>
                                 Zip Code<span class="req">*</span>
                               </label>
                                 <input type="text" name="zip_code" id="zip_code">
                             </div>


                               <div class="field-wrap">
                                <label>
                                  City<span class="req">*</span>
                                </label>
                                  <input type="text" name="city" id="city">
                               </div>




                         </div>

                         <div class="top-row">

                             <div class="field-wrap">
                               <label>
                                 Country<span class="req">*</span>
                               </label>
                              <input type="text" name="country" id="country">
                             </div>

                             <div class="field-wrap">
                               <label>
                                 State<span class="req">*</span>
                               </label>
                               <input type="text" name="state" id="state">
                             </div>



                          </div>

                        <div class="top-row">

                              <div class="field-wrap">
                               <label>
                                 User Name<span class="req">*</span>
                               </label>
                                  <input type="text" name="username" id="username">
                             </div>

                         <div class="field-wrap">
                           <label>
                             Password <span class="req">*</span>
                           </label>

                           <input type="password" name="pass_register" id="pass_register">

                         </div>

                       </div>


                        <div class="top-row">

                         <div class="field-wrap">
                           <label>
                              Email Address<span class="req">*</span>
                           </label>
                           <input type="text" name="email_register" id="email_register">
                         </div>

                         <div class="field-wrap">
                           <label>
                           Upline Email Address<span class="req"></span>
                           </label>
                              <input type="text" name="upline_email_register" id="upline_email_register">
                         </div>
                       </div>

                       <div class="top-row">

                         <div class="field-wrap">
                           <label class="active highlight">
                           BTC Exchange Rate<span class="req"></span>
                           </label>
                              <input type="text" name="bitcoin" id="bitcoin" disabled="disabled" value="$733.22">
                         </div>

                         <div class="field-wrap">
                           <label class="active highlight">
                           Tuition<span class="req"></span>
                           </label>
                              <input type="text" name="tuition" id="tuition" disabled="disabled" value="$20.00">
                         </div>


                    </div>


                       <input type="hidden" name="_token" value="{{Session::token()}}" id="token">
                       <input type="hidden" name="ip_address" value="{{$_SERVER['REMOTE_ADDR']}}" id="ip_address">

                       <button type="submit" class="button button-block" id="save_register">Get Started</button>

                       </form>

                     </div>




                   </div><!-- tab-content -->
             </div> <!-- /form -->



        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/js/form_login.js')}}"></script>
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
                upline_email_register:{email:true},
            }
        });

        $("#zip_code").keyup(function(e){
            var zip_code = $(this).val();
            if(zip_code.length === 5 && $.isNumeric(zip_code))
            var requestURL = "http://ziptasticapi.com/" + zip_code + '?callback=?';
            $.getJSON(requestURL,null,function(data){
                console.log(data);
                $("#country,#state,#city").closest('.field-wrap').find('label').addClass("active");
                if(data.country) $("#country").val(data.country);
                if(data.state) $("#state").val(data.state);
                if(data.city) $("#city").val(data.city);
            });
        });


        $("#last_name").change(function(){
            var last_name_initial = this.value.charAt(0)
            $("#last_name_initial").val(last_name_initial);
        });

        $(".infomation_terms").hide()
        $("#modal_terms").click(function(){
            $(".infomation_terms").stop().slideToggle();
        });

      //   $("#show_pass").click(function(){
      //       if($("#pass_register").attr('type') == "password"){
      //           $("#pass_register").attr('type','text');
      //       }else{
      //           $("#pass_register").attr('type','password');
      //       }
      //   });

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
                        upline_email_register : $("#upline_email_register").val(),
                        bitcoin : $("#bitcoin").val(),
                        tuition : $("#tuition").val(),
                        ip_address : $("#ip_address").val(),
                        token : $("#token").val(),
                    },
                    success:function(result){
                        $(".success_register").slideDown("fast").html(result['success']);
                        //     window.location.href="{{route('user.dashboard')}}";
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

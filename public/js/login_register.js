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

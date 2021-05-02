
function userlogin(){
    var Username=$('#Username').val();
    var Password=$('#Password').val();
   $.ajax({
       type:'POST',
       url:"Login/loginUser",
       dataType:'json',
       data:{Username:Username,Password:Password},
       success:function(response){
           debugger
           if(response=='Go'){
            window.location.href = 'Admin/Dashboard';
           }else{
    //    $('#usernamepassword').css('display','none');
    //    $('#login_error').css('display','');
       $('#login_error').html(response).show();
           }
       }
   });
}

function logout(){
    $.post("Login/logout",{
    }, function(response){
        window.location.href = 'Login';
    });
//    $.ajax({
//        type:'POST',
//        url:"Login/logout",
//        dataType:'json',
//        success:function(response){
//            debugger
//            if(response=='logout'){
//             window.location.href = 'Login';
//            }
//        }
//    });
}
function gosearch(){
    var  base_url=$('#base_url').val();
    var searchvalue=$('#searchalldetails').val();
    window.location.href = base_url+'Admin/SearchPage/'+searchvalue;
}
 function registeruser(){
    var Username=$('#reg_username').val();
    var Password=$('#reg_password').val();
    var mobileno=$('#mobileno').val();
    var  base_url=$('#base_url').val();
    $.post("Login/user_register",{
        Username:Username,
        Password:Password,
        mobileno:mobileno
    }, function(response){
        // window.location.href = 'Login';
    });
 }
//     $(document).ready(function(){
//         $( ".datepicker-here" ).datepicker(
//             {
//                 dateFormat: 'dd/mm/yy'
//             }
//         );
//             // $( "#DOB" ).datepicker("show");

// });




         
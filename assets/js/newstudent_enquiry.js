
//     $(document).ready(function(){
//         $( ".datepicker-here" ).datepicker(
//             {
//                 dateFormat: 'dd/mm/yy'
//             }
//         );
//             // $( "#DOB" ).datepicker("show");

// });


 
     $(document).ready(function(){
         
        var  gender=$('#gender').val();
        if(gender=="Male"){
            document.getElementById('gendermale').checked=true;
        }
        else{
            document.getElementById('gendermale').checked=false; 
        }
        if(gender=="Female"){
            document.getElementById('genderfemale').checked=true;
        }else{
            document.getElementById('genderfemale').checked=false;
        }
        var  classname=$('#class').val();
        var  source=$('#source').val();
        $('#classname').val(classname);
        $('#Source').val(source);

 
 });
 


function submitnewstudentdata(){
    var bool=true;
    if($('#firstname').val()=='' || $('#firstname').val()==null || $('#firstname').val()==undefined){
        $('#firstname').parent().parent().addClass('has-error');
        bool=false;
    }else{
        $('#firstname').parent().parent().removeClass('has-error');
        bool=true;
    }

    if($('#lastname').val()=='' || $('#lastname').val()==null || $('#lastname').val()==undefined){
        $('#lastname').parent().parent().addClass('has-error');
        bool=false;
    }else{
        $('#lastname').parent().parent().removeClass('has-error');
        bool=true;
    }
    if($('#DOB').val()=='' || $('#DOB').val()==null || $('#DOB').val()==undefined){
        $('#DOB').parent().parent().addClass('has-error');
        bool=false;
    }else{
        $('#DOB').parent().parent().removeClass('has-error');
        bool=true;
    }
    if($('#classname').val()=='' || $('#classname').val()==null || $('#classname').val()==undefined){
        $('#classname').parent().parent().addClass('has-error');
        bool=false;
    }else{
        $('#classname').parent().parent().removeClass('has-error');
        bool=true;
    }
    if($('.gender:checked').val()=='' || $('.gender:checked').val()==null || $('.gender:checked').val()==undefined){
       $('.gender').parent().parent().parent().parent().addClass('has-error');
               bool=false;
    }else{
        $('.gender').parent().parent().parent().parent().removeClass('has-error');
        bool=true;
    }
    if(!bool){
        return false;
    }
    $('#submitdata').click();
    // swal({
    //     title: "Are you sure?",
    //     text: "Once deleted, you will not be able to recover this imaginary file!",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDelete) => {
    //     if (willDelete) {
    //       swal("Poof! Your imaginary file has been deleted!", {
    //         icon: "success",
    //       });
    //     } else {
    //       swal("Your imaginary file is safe!");
    //     }
    //   });
 }
         
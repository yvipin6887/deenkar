var app = angular.module('myApp', []);
app.controller('ExistingStudentController', function($scope, $http,$window) {
    $scope.student={};
    $( ".datepicker-here" ).datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth : true,
        changeYear : true,
        yearRange: '-100y:c+nn',
        maxDate: '-1d'
    });
    var  base_url=$('#base_url').val();
    $http.get(base_url+"StudentC/getStudentData")
    .then(function (response) {

        $scope.existstudent = response.data;
    });
    $http.get(base_url+"StudentC/getTotalStudentCount")
    .then(function (response) {

        $scope.totalstudentdata = response.data.result[0].totalstudent;
        $scope.totalmaledata = response.data.result1[0].totalmale;
        $scope.totalfemaledata = response.data.result2[0].totalfemale;
    });
    // $('#existstudentdata').DataTable();
    $scope.veiwstudent = function(id) {
       
        $.post(base_url+"StudentC/getStudentData",{
            'id':id  
        }, function(response){
            // $scope.existstudentview = response.data;
            if(response!=''){
                $('#viewfirstname').html(response[0].firstname);
                $('#viewmiddlename').html(response[0].middlename);
                $('#viewlastname').html(response[0].lastname);
                $('#viewgender').html(response[0].gender);
                $('#viewdateofbirth').html(response[0].dateofbirth);
                $('#viewmobile').html(response[0].mobile);
                $('#viewemail').html(response[0].email);
                $('#viewclass').html(response[0].class);
                $('#viewConutry').html(response[0].country);
                $('#viewstate').html(response[0].state);
                $('#viewcity').html(response[0].city);
                $('#viewaddress').html(response[0].address);
                $('#viewsource').html(response[0].source);
                $('#viewfathername').html(response[0].fathername);
                $('#viewf_DOB').html(response[0].f_DOB);
                $('#viewf_mobile').html(response[0].f_mobile);
                $('#viewf_email').html(response[0].f_email);
                $('#viewf_qualification').html(response[0].f_qualification);
                $('#viewf_worktitle').html(response[0].f_worktitle);
                $('#viewmothername').html(response[0].mothername);
                $('#viewm_DOB').html(response[0].m_DOB);
                $('#viewm_mobile').html(response[0].m_mobile);
                $('#viewm_email').html(response[0].m_email);
                $('#viewm_qualification').html(response[0].m_qualification);
                $('#viewm_worktitle').html(response[0].m_worktitle);
                if(response[0].s_pic!='' && response[0].s_pic!=null){
                    $('#st_profile').attr('src',base_url+response[0].s_pic);
                }
               
               }
        });
        
      };
    //   $scope.uploaderFile=function(element){
    //       $scope.$apply(function($scope){
    //             $scope.files=element.files;
    //       });
    //     // var formData = new FormData();
    //     // formData.append('file', element.files[0]);
    //     // console.log(formData);
    //   }
      $scope.insertStudentData=function(){
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
              
        // $http.post(base_url+"StudentC/insertStudentData", {
        // //    'firstname':$scope.firstname,
        // //    'middlename':$scope.middlename,
        // //    'lastname':$scope.lastname,
        // data:$scope.student,
        // header:{'Content-Type':'application/x-www-form-urlencoded'}
        // })        
       
        // .success(function(data,status,headers,config){
        // console.log("Data Inserted Successfully");
        // });
    }
    $scope.editstudent = function(id) {
       
        $.post(base_url+"StudentC/getStudentData",{
            'id':id  
        }, function(response){
            // $scope.existstudentedit = response.data;
            if(response!=''){
                $('#editfirstname').val(response[0].firstname);
                $('#editmiddlename').val(response[0].middlename);
                $('#editlastname').val(response[0].lastname);
                $('#editbarocde').val(response[0].barcode);
                $('#updateid').val(response[0].id);
                // $('#editgender').val(response[0].gender);
                var  gender=response[0].gender;
                if(gender=="Male"){
                    document.getElementById('editgendermale').checked=true;
                }
                else{
                    document.getElementById('editgendermale').checked=false; 
                }
                if(gender=="Female"){
                    document.getElementById('editgenderfemale').checked=true;
                }else{
                    document.getElementById('editgenderfemale').checked=false;
                }
                $('#editDOB').val(response[0].dateofbirth);
                $('#editContact').val(response[0].mobile);
                $('#editEmail').val(response[0].email);
                $('#editclassname').val(response[0].class);
                $('#editCountry').val(response[0].country);
                $('#editState').val(response[0].state);
                $('#editCity').val(response[0].city);
                $('#editAddress').val(response[0].address);
                $('#editSource').val(response[0].source);
                $('#editfathername').val(response[0].fathername);
                $('#editDOB_f').val(response[0].f_DOB);
                $('#editContact_f').val(response[0].f_mobile);
                $('#editEmail_f').val(response[0].f_email);
                $('#editQualification').val(response[0].f_qualification);
                $('#editjob_title').val(response[0].f_worktitle);
                $('#editfullname_m').val(response[0].mothername);
                $('#editDOB_m').val(response[0].m_DOB);
                $('#editContact_m').val(response[0].m_mobile);
                $('#editEmail_m').val(response[0].m_email);
                $('#editQualification_m').val(response[0].m_qualification);
                $('#editjob_title_m').val(response[0].m_worktitle);
                $('#editnote').val(response[0].note);
                if(response[0].s_pic!='' && response[0].s_pic!=null){
                    $('#editst_profile').attr('src',base_url+response[0].s_pic);
                }
               }
        });
        
      };
      $scope.updateStudentData=function(){
        var bool=true;
        if($('#editfirstname').val()=='' || $('#editfirstname').val()==null || $('#editfirstname').val()==undefined){
            $('#editfirstname').parent().parent().addClass('has-error');
            bool=false;
        }else{
            $('#editfirstname').parent().parent().removeClass('has-error');
            bool=true;
        }
    
        if($('#editlastname').val()=='' || $('#editlastname').val()==null || $('#editlastname').val()==undefined){
            $('#editlastname').parent().parent().addClass('has-error');
            bool=false;
        }else{
            $('#editlastname').parent().parent().removeClass('has-error');
            bool=true;
        }
        if($('#editDOB').val()=='' || $('#editDOB').val()==null || $('#editDOB').val()==undefined){
            $('#editDOB').parent().parent().addClass('has-error');
            bool=false;
        }else{
            $('#editDOB').parent().parent().removeClass('has-error');
            bool=true;
        }
        if($('#editclassname').val()=='' || $('#editclassname').val()==null || $('#editclassname').val()==undefined){
            $('#editclassname').parent().parent().addClass('has-error');
            bool=false;
        }else{
            $('#editclassname').parent().parent().removeClass('has-error');
            bool=true;
        }
        if($('.editgender:checked').val()=='' || $('.editgender:checked').val()==null || $('.editgender:checked').val()==undefined){
           $('.editgender').parent().parent().parent().parent().addClass('has-error');
                   bool=false;
        }else{
            $('.editgender').parent().parent().parent().parent().removeClass('has-error');
            bool=true;
        }
        if(!bool){
            return false;
        }
        $('#updatesubmitdata').click();
              
        // $http.post(base_url+"StudentC/insertStudentData", {
        // //    'firstname':$scope.firstname,
        // //    'middlename':$scope.middlename,
        // //    'lastname':$scope.lastname,
        // data:$scope.student,
        // header:{'Content-Type':'application/x-www-form-urlencoded'}
        // })        
       
        // .success(function(data,status,headers,config){
        // console.log("Data Inserted Successfully");
        // });
    }
    $scope.deletedata=function(id,name){
        $('#getstudentname').html(name);
        $('#deleteid').val(id);
    } 
    $scope.getStudentClassBy=function(){
        // $scope.classname=$scope.classvalue;
        $http.post(base_url+"StudentC/fetchStudentData", {
            'classname':$scope.classvalue,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function (response) {
            $scope.studentdata = response.data;
        });
    } 
    $scope.updateStudentRollno=function(){
        // $scope.classname=$scope.classvalue;
        var rolllength=$window.document.getElementsByClassName('studentrollno');
        var studentbarocde=$window.document.getElementsByClassName('studentbarocde');
        var rollno=[];
        var barcode=[];
        for(var i=0;i<studentbarocde.length;i++){
            barcode.push(studentbarocde[i].value);
            rollno.push(rolllength[i].value);

        }
        $http.post(base_url+"StudentC/updaterollnoStudentData", {
            'barcode':barcode,
            'rollno':rollno,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function (response) {
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Roll No Update!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#rollnoassignModal').modal('hide');
                //    getnewstudentdata();
                  });
            }
        });
    } 
    $scope.generaterollno=function(){
        var rolllength=$window.document.getElementsByClassName('studentrollno');
        var studentbarocde=$window.document.getElementsByClassName('studentbarocde');
       
        var g=1;
        for(var i=0;i<studentbarocde.length;i++){
            $('#rollno'+studentbarocde[i].value).val(g);
            // barcode.push(studentbarocde[i].value);
            // rollno.push(rolllength[i].value);
                g++;
        }
    }
     $scope.Sendmail=function(){
        $http.post(base_url+"StudentC/sendStudentMail", {
            // 'barcode':barcode,
            // 'rollno':rollno,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function (response) {
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Roll No Update!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#rollnoassignModal').modal('hide');
                //    getnewstudentdata();
                  });
            }
        });
     } 
     $scope.addEvent=function(){
        $http.post(base_url+"GoogleCalendar/addEvent", {
            // 'barcode':barcode,
            // 'rollno':rollno,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function (response) {
            
        });
     } 
});
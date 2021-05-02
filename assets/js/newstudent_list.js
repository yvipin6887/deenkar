
     $(document).ready(function(){
        getnewstudentdata();
 });
 
function getnewstudentdata(){
    var  base_url=$('#base_url').val();
    $.post(base_url+"NewStudentList/getNewStudentData", function(response){
       if(response!=''){
           var data=[];
           var edit='';
           var view='';
           var status='';
           var deletebt='';
           for(var i=0;i<response.length;i++){
               edit='<a href="'+base_url+'Admin/NewStudentEnquiry/'+response[i].id+'" data-toggle="tooltip" title="Edit" class="btn" data-toggle="modal" data-target="#myModal" style="font-size: 15px;margin-left: -15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '
               view='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#viewnewstudentModal" style="font-size: 15px;" data-toggle="tooltip" title="View" onclick="viewNewStudent(\''+response[i].id+'\',\''+name+'\')"><i class="fa fa-eye" aria-hidden="true"></i></a>';
               var name=response[i].firstname+' '+response[i].lastname;
               deletebt='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteModal" style="font-size: 15px;margin-left: -19px;" data-toggle="tooltip" title="Delete"  onclick="deletedata(\''+response[i].id+'\',\''+name+'\')"><i class="fa fa-trash" aria-hidden="true"></i></a>'
               status='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#statusModal" style="font-size: 15px;margin-left:-10px;" data-toggle="tooltip" title="Status Change"  onclick="getstatusdata(\''+response[i].id+'\',\''+response[i].status+'\',\''+name+'\')"><i class="fa fa-trash" aria-hidden="true"></i></a>'

            var data1=[response[i].branch,name,response[i].class,response[i].gender,response[i].mobile,response[i].email,response[i].status,response[i].source,response[i].fdate,view+edit+deletebt+status];
            data.push(data1);
           }
        

           $('#newstudentdata').DataTable( {
            data: data,
            columns: [
                { title: "Branch" },
                { title: "Name" },
                { title: "Class" },
                { title: "Gender" },
                { title: "Mobile" },
                { title: "Email" },
                { title: "Status" },
                { title: "Source" },
                { title: "Follow Date" },
                { title: "Customize" }
            ]
        } );
       } 
      });

}

function deletedata(id,name){
    $('#getnewstudentname').html(name);
    $('#deleteid').val(id);
}        
function viewNewStudent(id,name){
    var  base_url=$('#base_url').val();
    $.post(base_url+"NewStudentList/getNewStudentData",{
        id:id
    }, function(response){
        if(response!=''){
         $('#viewfirstname').html(response[0].firstname);
         $('#viewmiddlename').html(response[0].middlename);
         $('#viewlastname').html(response[0].lastname);
         $('#viewgender').html(response[0].gender);
         $('#viewdateofbirth').html(response[0].dateofbirth);
         $('#viewmobile').html(response[0].mobile);
         $('#viewemail').html(response[0].email);
         $('#viewclass').html(response[0].class);
         $('#viewsource').html(response[0].source);
         $('#viewConutry').html(response[0].country);
         $('#viewstate').html(response[0].state);
         $('#viewcity').html(response[0].city);
         $('#viewaddress').html(response[0].address);
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
        }
    });
}        

function getstatusdata(id,status,name){
    var  base_url=$('#base_url').val();
    $('#statusnewstudentname').html(name);
    $('#statusupdateid').val(id);
    $.post(base_url+"NewStudentList/getStatusData",{
        id:id
    }, function(response){
        var html="<option>Select</option>";
        var i=0;
        if(response!=''){
            for(i;i<response.length;i++){
                html+="<option value='"+response[i].name+"'>"+response[i].name+" </option>";
            }
        $('#getstatus').html(html).show();
        $('#getstatus').val(status);
        }else{
            $('#getstatus').html(html).show();
        }
    });
    
}
function changenewstudentstatus(){
    var  base_url=$('#base_url').val();
    var id= $('#statusupdateid').val();
    var status= $('#getstatus').val();
    var addnotes= $('#addnotes').val();
    $.post(base_url+'NewStudentList/changestatus',{
        id:id,
        status:status,
        addnotes:addnotes
    },function(response){
     if(response=='Already'){
    swal({
        // title: "Warnning?",
        text: "Status Already Exits!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
       
      });
     }else{
        swal({
            // title: "Warnning?",
            text: "Status Updated!",
            icon: "success",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
           $('#statusModal').modal('hide');
           getnewstudentdata();
          });
     }
    });
}
function newstatusadd(){
    var  base_url=$('#base_url').val();
   var status= $('#newstatus').val();
   var bg_color= $('#bg_color').val();
   var text_color= $('#text_color').val();
    $.post(base_url+"NewStudentList/addStatusData",{
        status:status,
        bg_color:bg_color,
        text_color:text_color
    }, function(response){
        if(response=='Already'){
            swal({
                // title: "Warnning?",
                text: "Status Already Exits!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
               
              });
             }else{
                swal({
                    // title: "Warnning?",
                    text: "Status Added!",
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


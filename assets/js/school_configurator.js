
  
function getclasslistdata(){
    
    $.post("getClassListData", function(response){
       if(response!=''){
           var data=[];
           var edit='';
           var view='';
           var status='';
           var deletebt='';
           for(var i=0;i<response.length;i++){
               edit='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#editclasslistModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" onclick="viewclass(\''+response[i].id+'\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '
               view='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#viewclasslistModal" style="font-size: 15px;" data-toggle="tooltip" title="View" onclick="viewclass(\''+response[i].id+'\')"><i class="fa fa-eye" aria-hidden="true"></i></a>';
               deletebt='<a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteModal" style="font-size: 15px;margin-left: -19px;" data-toggle="tooltip" title="Delete"  onclick="deletedata(\''+response[i].id+'\',\''+response[i].classname+'\')"><i class="fa fa-trash" aria-hidden="true"></i></a>'
               
            var data1=[response[i].branch,response[i].classname,view+edit+deletebt];
            data.push(data1);
           }
        

           $('#classlist').DataTable( {
            data: data,
            columns: [
                { title: "Branch" },
                { title: "Class" },
                { title: "Customize" }
            ]
        } );
       } 
      });

}

function deletedata(id,name){
    $('#getclassname').html(name);
    $('#deleteid').val(id);
}   
function deleteclassname(){
    var id=$('#deleteid').val();
    $.post("deleteClass",{
        id:id
    }, function(response){
        swal({
            // title: "Warnning?",
            text: "Delete Success!",
            icon: "Success",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            $('#deleteModal').modal('hide');
                   getclasslistdata();
          });
    });
}     
function viewclass(id,name){
    $.post("getClass",{
        id:id
    }, function(response){
        if(response.result!=''){
        
         $('#viewclass').html(response.result[0].classname);
         $('#editclass').val(response.result[0].classname);
         $('#classid').val(id);
        }
         
    });
}        

function newclassadd(){
    var classname=$('#newclass').val();
    $.post("insertNewClass",{
        classname:classname
    }, function(response){
        if(response=='Already'){
            swal({
                // title: "Warnning?",
                text: "Class Already Exits!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
               
              });
             }else{
                swal({
                    // title: "Warnning?",
                    text: "Class Added!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#addclasslistModal').modal('hide');
                   getclasslistdata();
                  });
             }
    });
    
}
function newclassedit(){
    var id= $('#classid').val();
    var editclass= $('#editclass').val();
    $.post('updateClass',{
        id:id,
        editclass:editclass,
    },function(response){
     if(response=='Already'){
    swal({
        // title: "Warnning?",
        text: "Class Already Exits!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
       
      });
     }else{
        swal({
            // title: "Warnning?",
            text: "Class Updated!",
            icon: "success",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
           $('#editclasslistModal').modal('hide');
           getclasslistdata();
          });
     }
    });
}

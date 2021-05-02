var app = angular.module('myApp', []);
app.controller('AcademicConfiguratorController', function($scope, $http,$window) {
    $scope.Academic={};
    $( ".datepicker-here" ).datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth : true,
        changeYear : true
    });
    var  base_url=$('#base_url').val();
    $scope.newacademicdata = function() {
$http.post(base_url+"AcademicC/insertAcademicData", {
    'academicname':$scope.academicname,
    'fromdate':$scope.fromdate,
    'todate':$scope.todate,
    'active':$scope.active,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function(response){
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Added Academic!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#addacademiclistModal').modal('hide');
                //    getnewstudentdata();
                $scope.getacademicdata();
                  });
            }else if(response.data=='Already'){
                swal({
                    // title: "Warnning?",
                    text: "Already Exists Academic!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                //    getnewstudentdata();
                  });  
            }
        });
        
    };
    $scope.editacademicdata = function() {
        // $scope.activeedit=false;
        if($scope.activeedit){
            $scope.activeedit=1;
        }else{
            $scope.activeedit=0;
        }
$http.post(base_url+"AcademicC/updateAcademicData", {
    'academicname':$scope.academicnameedit,
    'fromdate':$scope.fromdateedit,
    'todate':$scope.todateedit,
    'active':$scope.activeedit,
    'updateid':$scope.updateid,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function(response){
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Update Academic!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#editacademiclistModal').modal('hide');
                //    getnewstudentdata();
                $scope.getacademicdata();
                  });
            }else if(response.data=='Already'){
                swal({
                    // title: "Warnning?",
                    text: "Already Exists Academic!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                //    getnewstudentdata();
                  });  
            }
        });
        
    };
    $scope.deleteacademicdata = function() {
        
        $http.post(base_url+"AcademicC/deleteAcademic", {
            'deleteid':$scope.deleteid,
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
            
                .then(function(response){
                    if(response.data=='Done'){
                        swal({
                            // title: "Warnning?",
                            text: "Delete Academic!",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                        $('#deleteacademiclistModal').modal('hide');
                        //    getnewstudentdata();
                        $scope.getacademicdata();
                        });
                    }
                });
        
    };
    $scope.getacademicdata = function() {
        $http.post(base_url+"AcademicC/getAcademicData", {
            
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
               
                .then(function(response){
                    $scope.academicdata = response.data;
                });
            }
    $scope.geteditacademic = function(id) {
        $http.post(base_url+"AcademicC/getAcademicData", {
            'id':id,
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
               
                .then(function(response){
                    $scope.academicnameedit = response.data[0].academic;
                    $scope.fromdateedit = response.data[0].fromdate;
                    $scope.todateedit = response.data[0].todate;
                    $scope.updateid = response.data[0].id;
                    if(response.data[0].active=='1'){
                        // document.getElementById("activeedit").checked=true;
                        $scope.activeedit = true;
                    }else{
                        $scope.activeedit = false;
                        // document.getElementById("activeedit").checked=false;       
                    }
                
                });
            }
            $scope.deletedata=function(id){
                $scope.deleteid=id;
            }
            $scope.getacadmicdata = function() {
                $http.post(base_url+"AcademicC/getAcademicData", {
                    
                        header:{'Content-Type':'application/x-www-form-urlencoded'}
                        })        
                        
                        .then(function(response){
                            $scope.academicedataOnly = response.data;
                        });
                    }
                    $scope.newsemesterdata = function() {
                        $http.post(base_url+"AcademicC/insertSemesterData", {
                            'academicname':$scope.selectedacademic,
                            'Semestername':$scope.Semestername,
                            'fromdate':$scope.sefromdate,
                            'todate':$scope.setodate,
                            'active':$scope.seactive,
                                header:{'Content-Type':'application/x-www-form-urlencoded'}
                                })        
                               
                                .then(function(response){
                                    if(response.data=='Done'){
                                        swal({
                                            // title: "Warnning?",
                                            text: "Added Semester!",
                                            icon: "success",
                                            buttons: true,
                                            dangerMode: true,
                                          })
                                          .then((willDelete) => {
                                           $('#addsemesterModal').modal('hide');
                                        //    getnewstudentdata();
                                        $scope.getacademicdata();
                                          });
                                    }else if(response.data=='Already'){
                                        swal({
                                            // title: "Warnning?",
                                            text: "Already Exists Semester!",
                                            icon: "success",
                                            buttons: true,
                                            dangerMode: true,
                                          })
                                          .then((willDelete) => {
                                        //    getnewstudentdata();
                                          });  
                                    }
                                });
                                
                            };
                            $scope.getsemetserdata = function() {
                                $http.post(base_url+"AcademicC/getSemesterData", {
                                    
                                        header:{'Content-Type':'application/x-www-form-urlencoded'}
                                        })        
                                       
                                        .then(function(response){
                                            $scope.semesterdata = response.data;
                                        });
                                    }
                                    $scope.getsemetserdata();
});
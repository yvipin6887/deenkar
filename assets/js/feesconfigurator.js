var app = angular.module('myApp', []);
app.controller('FeesConfiguratorController', function($scope, $http,$window) {
    $scope.Academic={};
    $( ".datepicker-here" ).datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth : true,
        changeYear : true
    });
    // $('#selectedprofile').multiselect({
    // });
    var  base_url=$('#base_url').val();
    $scope.newprofiledata = function() {
$http.post(base_url+"FeesC/insertProfileData", {
    'feesprofile':$scope.feesprofile,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function(response){
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Added Fees Profile!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#addfeesprofileModal').modal('hide');
                //    getnewstudentdata();
                $scope.getFeesProfiledata();
                  });
            }else if(response.data=='Already'){
                swal({
                    // title: "Warnning?",
                    text: "Already Exists Fees Profile!",
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
    $scope.editprofiledata = function() {
      
$http.post(base_url+"FeesC/updateprofileData", {
    'profilename':$scope.profilename,
    'updateid':$scope.updateid,
        header:{'Content-Type':'application/x-www-form-urlencoded'}
        })        
       
        .then(function(response){
            if(response.data=='Done'){
                swal({
                    // title: "Warnning?",
                    text: "Update Fees Profile!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                   $('#editfeesprofileModal').modal('hide');
                //    getnewstudentdata();
                $scope.getFeesProfiledata();
                  });
            }
        });
        
    };
    $scope.deletefeesdata = function() {
        
        $http.post(base_url+"FeesC/deleteFeesProfile", {
            'deleteid':$scope.deleteidprpofile,
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
            
                .then(function(response){
                    if(response.data=='Done'){
                        swal({
                            // title: "Warnning?",
                            text: "Delete Fees Profile!",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                        $('#deleteprofileModal').modal('hide');
                        //    getnewstudentdata();
                        $scope.getFeesProfiledata();
                        });
                    }
                });
        
    };
    $scope.getFeesProfiledata = function() {
        $http.post(base_url+"FeesC/getFeesprofilesData", {
            
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
               
                .then(function(response){
                    $scope.profilesdata = response.data;
                });
            }
    $scope.getProfiledata = function() {
        $http.post(base_url+"FeesC/getFeesprofilesData", {
            
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
                
                .then(function(response){
                    $scope.profilesdataOnly = response.data;
                });
            }
    $scope.geteditfees = function(id) {
        $http.post(base_url+"FeesC/getFeesprofilesData", {
            'id':id,
                header:{'Content-Type':'application/x-www-form-urlencoded'}
                })        
               
                .then(function(response){
                    $scope.profilename = response.data[0].profilename;
                    $scope.updateid=id;
                });
    }
            $scope.deletedata=function(id){
                $scope.deleteidprpofile=id;
            }
            $scope.nextbutton=function(){
               var profilename= $scope.selectedprofile.split('||');
                var html='';
                var i=1;
                html+='<table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">';
                html+='<thead>';
                html+='<tr>';
                html+='<th>Profile</th><th>Actule Fees</th><th>Discount</th><th>Net Fees</th>';
                for(i;i<=$scope.selectedinstall;i++){
                    html+='<th>'+i +' Inst</th>';
                }
                html+='</tr>';
                html+='</thead>';
                html+='<tr>';
                html+='<td>'+profilename[1]+'</td>';
                html+='<td><input type="text" class="form-control" id="actulefeesid" name="actulefeesid" ng-model="actulefeesid" onkeyup="countnetfees()" value="0"></td>';
                html+='<td><input type="text" class="form-control" id="discountfeesid" name="discountfeesid" ng-model="discountfeesid" onkeyup="countdiscountfees()" value="0"></td>';
                html+='<td><input type="text" class="form-control" id="netfeesid" name="netfeesid" ng-model="netfeesid" value="0" onkeyup="setinstallfees()"></td>';
                var j=1;
                for(j;j<=$scope.selectedinstall;j++){
                    html+='<td><input type="text" class="form-control" id="install_'+j+'" name="install_'+j+'" ng-model="install_'+j+'" value="0" ></td>';
                }
                html+='</tr>';
                html+='<tbody>';
                        
                html+='</tbody>';
                html+='</table>';
                $('#newfeesassign').html(html);
                $('#actionid').css('display','');

            }
          $scope.submitfeesassign=function(){
              var i=1;
              var install_amount='';
              for(i;i<=$scope.selectedinstall;i++){
                install_amount+=$('#install_'+i+'').val()+',';
              }
            $http.post(base_url+"FeesC/insetFeesAssignData", {
                'selectedclassname':$scope.selectedclassname,
                'selectedprofile':$scope.selectedprofile,
                'selectedinstall':$scope.selectedinstall,
                'actulefeesid':$('#actulefeesid').val(),
                'discountfeesid':$('#discountfeesid').val(),
                'netfeesid':$('#netfeesid').val(),
                'install_amount':install_amount,
                    header:{'Content-Type':'application/x-www-form-urlencoded'}
                    })        
                   
                    .then(function(response){
                        if(response.data=='Done'){
                            swal({
                                // title: "Warnning?",
                                text: "Assign Fees Success!",
                                icon: "success",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                            $('#classfeesassignModal').modal('hide');
                            //    getnewstudentdata();
                            // $scope.getFeesProfiledata();
                            });
                        }
                    });
          }
          $scope.getAssignFeesdata = function() {
            $http.post(base_url+"FeesC/getAssignFeesdata", {
                
                    header:{'Content-Type':'application/x-www-form-urlencoded'}
                    })        
                   
                    .then(function(response){
                        $scope.feesassigndata = response.data;
                    });
                }
                $scope.getAssignFeesdata();
                $scope.getveiwfees=function(id,firstname,lastname,barcode){
                    $scope.stname=firstname+' '+lastname;
                    $http.post(base_url+"FeesC/getAssignFeesdata", {
                            'id':id,
                            'barcode':barcode,
                        header:{'Content-Type':'application/x-www-form-urlencoded'}
                        })        
                       
                        .then(function(response){
                            $scope.classname = response.data[0].class;
                            $scope.barcode = response.data[0].barcode;
                            $scope.installment = response.data[0].installment;
                            $scope.s_pic = response.data[0].s_pic;
                            $scope.actul_fees = response.data[0].actul_fees;
                            $scope.discount = response.data[0].discount;
                            $scope.net_fees = response.data[0].net_fees;
                        });
                }
});

function countnetfees(){
    var actul_fees=$('#actulefeesid').val();
    $('#netfeesid').val(actul_fees);
    $('#netfeesid').trigger('keyup');
}
function countdiscountfees(){
    var actul_fees=$('#actulefeesid').val();
    var disc_fees=$('#discountfeesid').val();
    if(disc_fees!=null && disc_fees!=''){
        var net_fees=parseInt(actul_fees)-parseInt(disc_fees);
        $('#netfeesid').val(net_fees);
    }
    $('#netfeesid').trigger('keyup');
}
function setinstallfees(){
    var net_fees= $('#netfeesid').val();
    var install=$('#selectedinstall').val();
    if(install!=null && install!='' && net_fees!=null && net_fees!=''){
        var fix_install=parseFloat(net_fees)/parseFloat(install);
        var j=1;
        for(j;j<=fix_install;j++){
            $('#install_'+j+'').val(fix_install);
        }
    }
    
    
}
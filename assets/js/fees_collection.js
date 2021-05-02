var app = angular.module('myApp', []);
app.controller('FeesCollectionController', function($scope, $http,$window) {
    $scope.Academic={};
    $( ".datepicker-here" ).datepicker({
        dateFormat : 'dd/mm/yy',
        changeMonth : true,
        changeYear : true
    });
    // $('#selectedprofile').multiselect({
    // });
    var  base_url=$('#base_url').val();
   
          $scope.getCollectedFeesdata = function() {
            $http.post(base_url+"FeesC/getCollectedFeesdata", {
                
                    header:{'Content-Type':'application/x-www-form-urlencoded'}
                    })        
                   
                    .then(function(response){
                        $scope.feescollecteddata = response.data.result;
                    });
                }
                $scope.getCollectedFeesdata();
              $scope.getstudentfees=function(barcode){
                  $('#collectfeesassign').css('display','none');
                  $('#actionid').css('display','none');
                $('#stubarcode').val(barcode);
                $http.post(base_url+"FeesC/getCollectedFeesdata", {
                    barcode:barcode,
                    header:{'Content-Type':'application/x-www-form-urlencoded'}
                    })        
                   
                    .then(function(response){
                        $('#stud_name').html(response.data.result[0].firstname+' '+response.data.result[0].lastname);
                        if(response.data.result[0].net_fees1!=null && response.data.result[0].net_fees1!=''){
                            $('#stunetfees').html(response.data.result[0].net_fees1);
                            $('#stunetfees1').val(response.data.result[0].net_fees1);
                        }else{
                            $('#stunetfees').html(0);
                            $('#stunetfees1').val(0);
                        }
                        if(response.data.result[0].collectedamount!=null && response.data.result[0].collectedamount!=''){
                            $('#stunetcollect').html(response.data.result[0].collectedamount);
                            var remaining=response.data.result[0].net_fees1-response.data.result[0].collectedamount;
                            $('#stunetremaing').html(remaining);
                        }else{
                            $('#stunetcollect').html(0);
                            $('#stunetremaing').html(response.data.result[0].net_fees1);
                        }
                        // if(response.data[0].collectedamount!=null || response.data[0].collectedamount!=''){
                        //     $('#stunetcollect').html(response.data[0].collectedamount);
                        // }else{
                        //     $('#stunetcollect').html(0);
                        // }
                        
                        // $('#stunetcollect').html(response.data[0].collectedamount);
                        $('#studentbarcode').val(response.data.result[0].barcode);
                        var intal=[];
                        var i=1;
                        for(i;i<=response.data.result[0].installment;i++){
                            intal.push(i);
                        }
                        if(response.data.result1!=''){
                            var j=0;
                         for(j;j<response.data.result1.length;j++){
                          var index=intal.indexOf(parseInt(response.data.result1[j].coll_install));
                          if(index!==-1){
                            intal.splice(index,1)
                          }
                         }
                        }

                        $scope.installment=intal;
                    });
              }
              $scope.nextbutton=function(){
                var barcode= $('#studentbarcode').val();
                $http.post(base_url+"FeesC/getCollectedFeesdata", {
                    barcode:barcode,
                    selectedinstall:$scope.selectedinstall,
                    header:{'Content-Type':'application/x-www-form-urlencoded'}
                    })        
                   
                    .then(function(response){
                        var html='';
                        $('#assign_id').val(response.data.result[0].assign_id);
                        $('#classname').val(response.data.result[0].classname);
                        if(response.data.result[0].install_remaining!='' && response.data.result[0].install_remaining!=null){
                      var lastremaining=parseInt(response.data.result[0].install)-parseInt(response.data.result[0].collectedamount);
                      var install=parseInt(response.data.result[0].install);
                    //   var lastremaining=response.data[0].install+'+'+response.data[0].install_remaining+'=';
                    //   var install=parseInt(response.data[0].install)+parseInt(response.data[0].install_remaining);
                        }else{
                            var lastremaining=parseInt(response.data.result[0].install);
                            var install=parseInt(response.data.result[0].install);
                        }
                       
                        var i=1;
                        html+='<table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:50%;margin-left:20px;">';
                        html+='<tr>';
                        html+='<td>Actul  Fees</td>';
                        html+='<td>'+response.data.result[0].actul_fees+'</td>';
                        html+='</tr><tr>';
                        html+='<td>Net  Fees</td>';
                        html+='<td>'+response.data.result[0].net_fees1+'</td>';
                        html+='</tr><tr>';
                        html+='<td>Discount</td>';
                        html+='<td>'+response.data.result[0].discount+'</td>';
                        html+='</tr><tr>';
                        html+='<td>Install Amount</td>';
                        html+='<td>'+install+'</td>';
                        html+='</tr><tr>';
                        html+='<td>Rem Install</td>';
                        html+='<td>'+lastremaining+'</td>';
                        html+='</tr>';
                        html+='<tr>';
                        html+='<td>Payment Mode</td>';
                        html+='<td> <select  id="paymenttype" name="paymenttype" class="form-control" >';
                        html+='<option value="Cash">Cash</option>';  
                        html+='<option value="Cheque">Cheque</option>';  
                        html+='<option value="Other">Other</option>';  
                        html+='</select></td>';
                        html+='</tr>';
                        html+='<tr>';
                        html+='<td>Pay Amount</td>';
                        html+='<td><input type="text" class="form-control" id="payinsatllamount" name="payinsatllamount"  value="0"><input type="hidden" class="form-control" id="collectedinsatllamount" name="collectedinsatllamount"  value="'+response.data.result[0].collectedamount+'"><input type="hidden" class="form-control" id="insatllamount" name="insatllamount"  value="'+install+'"></td>';
                        html+='</tr>';
                        html+='<tr>';
                        html+='<td>Recep No</td>';
                        html+='<td><input type="text" class="form-control" id="reciept" name="reciept"  value="0"></td>';
                        html+='</tr>';
                        html+='<td>Pay Date</td>';
                        html+='<td><input type="text" class="form-control datepicker-here" id="pay_date" name="pay_date"  ></td>';
                        html+='</tr>';
                        html+='<tbody>';
                                
                        html+='</tbody>';
                        html+='</table>';
                        $('#collectfeesassign').html(html);
                        $('#actionid').css('display','');
                        $('#collectfeesassign').css('display','');
                    });
                
 
             }
             $scope.submitfeescollection=function(){
                var i=1;
                var install_amount=$('#insatllamount').val();
                var payinsatllamount=$('#payinsatllamount').val();
                var collectedinsatllamount=$('#collectedinsatllamount').val();
                // for(i;i<=$scope.selectedinstall;i++){
                //   install_amount+=$('#install_'+i+'').val()+',';
                // }
              $http.post(base_url+"FeesC/collectionFeesStudent", {
                  'selectedinstall':$scope.selectedinstall,
                  'barcode':$('#studentbarcode').val(),
                  'netfees':$('#stunetfees1').val(),
                  'assignid':$('#assign_id').val(),
                  'classname':$('#classname').val(),
                  'paymode':$('#paymenttype').val(),
                  'install_amount':install_amount,
                  payinsatllamount:payinsatllamount,
                  collectedinsatllamount:collectedinsatllamount,
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
            $scope.printstudentfees=function(barcode){
                var url=base_url+'Admin/printStudentFessBybarcode/'+barcode;
               window.open(url);
            }
});


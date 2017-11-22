<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login success bro</title>
</head>
<body>



<div class="container">
<?php
echo "hello $username ";
echo "login success" . " ";

echo '<a href="adminhome/logout">logout</a>';   
?>   
<br>
        <h1 class="my-4">Reservation Queue</h1>    
        <div class="row" style="">
        <button id="btnAdd" class="btn btn-info btn-sm">Add New</button>
        <table width="90%" class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
                <tr>
                    <td>Time</td>
                    <td>CompId</td>
                    <td >Name</td>
                    <td>NRP</td>
                    <td>Email</td>
                    <td>No HP</td>
                    <td>Comments</td>                
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody id="showData">

            </tbody>
        </table>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header"><h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>
        <div class="modal-body">
        <fo rm id="myForm" action="" method="post" class="form-horizontal">
            <input type="hidden" name="compId" value="0">
            <div class="form-group">
                <label for="name" class="label-control col-md-4">Name</label>
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="label-control col-md-4">NRP</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nrp"></textarea>
                </div>
            </div>
        </form>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<div id="acceptModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Confirm Accept</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        	Do you want to accept this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnAccept2" class="btn btn-success">Accept</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(function() {
        showAllReservation();

        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
        
            $('#myModal').find('.modal-title').text('Add New Reservation');
        });

        
        function showAllReservation() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>AdminHome/showAllReservation',
                async: true,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    for (i=0;i<data.length;i++){
                        html += '<tr>' +
                            '<td>'+data[i].time+'</td>' +
                            '<td>'+data[i].compId+'</td>' +
                            '<td>'+data[i].nama+'</td>' +
                            '<td>'+data[i].nrp+'</td>' +
                            '<td>'+data[i].email+'</td>' +
                            '<td>'+data[i].noHp+'</td>' +
                            '<td>'+data[i].comments+'</td>' +
                            '<td>'+data[i].status+'</td>' +
                            '<td>' +
                                '<a href="javascript:;" id="btnAccept" class="btn btn-success item-accept" data="'+data[i].reservationId+'" data2="'+data[i].compId+'" style="margin-bottom: 5px";>Accept</a>'+
                                '<a href="javascript:;" id="btnDecline" class="btn btn-danger">Decline</a>' +
                            '</td>' +                        
                        '</tr>'
                    }        
                    $('#showData').html(html);
                },
                error: function(){
                    alert('Could not retrieve data');
                }
            });
        }

        $('#showData').on('click', '.item-accept', function(){
            
            var reservationId = $(this).attr('data');
            var compId = $(this).attr('data2');
            $('#acceptModal').modal('show');
			$('#btnAccept2').unbind().click(function(){

                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url() ?>AdminHome/acceptReservation',
                    data: {compId: compId, reservationId: reservationId},
                    async: true,
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            showAllReservation();
                        } 
                        else{
                            alert('Error');
                        }
                    
                    },
                    error: function(){
                        alert('Error accepting');
                    }
                });
            });
        });





     /*   $('#showData').on('click', '.item-accept', function(){
            var id = $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>AdminHome/acceptReservation',
                data: {reservationId: reservationId},
                async: true,
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        showAllReservation();
                    } 
                    else function(){
                        alert('Error');
                    }
                
                },
                error: function(){
                    alert('Error accepting');
                }
            });
        });

        	$('#showdata').on('click', '.item-accept', function(){
			var reservationId = $(this).attr('data');
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>AdminHome/acceptReservation',
					data:{reservationId:reservationId},
					dataType: 'json',
					success: function(response){
						if(response.success){
							showAllReservation();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error accepting');
					}
				});
			});
		
                */


    });
</script>

</body>
</html>


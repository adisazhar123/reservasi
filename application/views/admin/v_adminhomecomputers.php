<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login success bro</title>
</head>
<body>
<br>
<div class="container">
<?php
echo "Hello $username, ";
echo "login success" . " ";
?>   
<br>
        <h1 class="my-4">Computer List</h1>    
        <div class="row" style="">
        <button id="btnAdd" class="btn btn-info btn-sm">Add New</button>
        <table width="90%" class="table table-bordered table-responsive" style="margin-top: 10px;">
            <thead>
                <tr>
                    <td>CompId</td>
                    <td>Processor</td>
                    <td>RAM</td>
                    <td>HardDisk</td>
                    <td>Graphics Card</td>
                    <td>Monitor</td>                
                    <td>Status</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody id="showData">

            </tbody>
        </table>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">        <h4 class="modal-title"></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="txtId" value="0">
        		<div class="form-group">
        			<label for="processor" class="label-control col-md-4">Processor</label>
        			<div class="col-md-8">
        				<input type="text" name="txtProcessor" class="form-control">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="ram" class="label-control col-md-4">RAM</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" name="txtRam">
        			</div>
                </div>
                
        		<div class="form-group">
        			<label for="harddisk" class="label-control col-md-4">HardDisk</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" name="txtHarddisk">
        			</div>
                </div>
                
        		<div class="form-group">
        			<label for="graphicscard" class="label-control col-md-4">Graphics Card</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" name="txtGraphicscard">
        			</div>
                </div>
                
        		<div class="form-group">
        			<label for="monitor" class="label-control col-md-4">Monitor</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" name="txtMonitor">
        			</div>
                </div>
                
        		<div class="form-group">
        			<label for="status" class="label-control col-md-4">Status</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" name="txtStatus">
        			</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this computer?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(function(){
        showAllComputers();

        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Computer');
			$('#myForm').attr('action', '<?php echo base_url() ?>AdminHome/addComputers');
        })

        function showAllComputers() {
                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url() ?>AdminHome/showAllComputers',
                        async: true,
                        dataType: 'json',
                        success: function(data){
                            var html='';
                            var i;
                            for (i=0;i<data.length;i++){
                                html += '<tr>' +
                                    '<td>'+data[i].CompId+'</td>' +
                                    '<td>'+data[i].PROCESSOR+'</td>' +
                                    '<td>'+data[i].RAM+'</td>' +
                                    '<td>'+data[i].HARDDISK+'</td>' +
                                    '<td>'+data[i].GRAPHICS_CARD+'</td>' +
                                    '<td>'+data[i].MONITOR+'</td>' +
                                    '<td>'+data[i].status+'</td>' +
                                    '<td>' +
                                        '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].CompId+'" style="margin-right: 5px";>Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].CompId+'">Delete</a>' +
                                    '</td>' +                        
                                '</tr>';
                            }        
                            $('#showData').html(html);
                        },
                        error: function(){
                            alert('Could not retrieve data');
                        }
                    });
                }

        $('#showData').on('click', '.item-edit', function(){
            var CompId = $(this).attr('data');
            $('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Computer');
			$('#myForm').attr('action', '<?php echo base_url() ?>AdminHome/updateComputers');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>AdminHome/editComputers',
                data: {CompId: CompId},
                async: true,
                dataType: 'json',
                success: function (data) {
                    $('input[name=txtId]').val(data.CompId);
                    $('input[name=txtProcessor]').val(data.PROCESSOR);
                    $('input[name=txtRam]').val(data.RAM);
                    $('input[name=txtHarddisk]').val(data.HARDDISK);
                    $('input[name=txtGraphicscard]').val(data.GRAPHICS_CARD);
                    $('input[name=txtMonitor]').val(data.MONITOR);
                    $('input[name=txtStatus]').val(data.status);


                },
                error: function (){
                    alert('Could not edit data');
                }
            });
        });

		$('#showData').on('click', '.item-delete', function(){
            var CompId = $(this).attr('data');
            $('#deleteModal').modal('show');
			$('#deleteModal').find('.modal-title').text('Delete Computer');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: true,
					url: '<?php echo base_url() ?>AdminHome/deleteComputers',
					data:{CompId:CompId},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							showAllComputers();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
        });


		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			var processor = $('input[name=txtProcessor]');
            var ram = $('input[name=txtRam]');
            var harddisk = $('input[name=txtHarddisk]');
            var graphicscard = $('input[name=txtGraphicscard]');
            var monitor = $('input[name=txtMonitor]');
            var status = $('input[name=txtStatus]');


			var result = '';
			if(processor.val()==''){
				processor.parent().parent().addClass('has-error');
			}else{
				processor.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(ram.val()==''){
				ram.parent().parent().addClass('has-error');
			}else{
				ram.parent().parent().removeClass('has-error');
				result +='2';
			}       

            
			if(harddisk.val()==''){
				harddisk.parent().parent().addClass('has-error');
			}else{
				harddisk.parent().parent().removeClass('has-error');
				result +='3';
			}       
            
			if(graphicscard.val()==''){
				graphicscard.parent().parent().addClass('has-error');
			}else{
				graphicscard.parent().parent().removeClass('has-error');
				result +='4';
			}       
            
			if(monitor.val()==''){
				monitor.parent().parent().addClass('has-error');
			}else{
				monitor.parent().parent().removeClass('has-error');
				result +='5';
			}       
            
			if(status.val()==''){
				status.parent().parent().addClass('has-error');
			}else{
				status.parent().parent().removeClass('has-error');
				result +='6';
			}       

			if(result=='123456'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: true,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'added'
							}else if(response.type=='update'){
								var type ="updated"
							}
							//$('.alert-success').html('Computer '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
							alert('Success');

							showAllComputers();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}
				});
			}
		});

    });

</script>


</body>
</html>


<h2>Transaction</h2>
<a href="javascript:void(0)"  onclick="transaction.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Transaction</a>


<!--Do Not Remove this DIV -->
<div id="transaction-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="transaction-form" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="span8"><tr>
    <td width="86" class="navbar-brand">Image</td>
    <td width="225"><label for="transaction_image"></label>
    
     
<label id="upload_image_name" style="display:none"></label>
                      <input name="transaction_image" id="transaction_image" type="text" style="display:none"/>
                      <input type="file" id="upload_image" name="userfile" style="display:block"/>
                      <a href="#" id="change-image" title="Delete" style="display:none"><img src="https://pagodalabs.com/demo/facebook_app/assets/icons/delete.png" border="0"/></a>      
      </td>
  </tr>
        </div>
      
        <div class="span8"><label>User:</label>
 <select name="user_id" id="user_id" >
    <?php
	foreach($users as $user){
    ?>
    <option value="<?php echo $user['user_id'];?>" id="<?php echo $user['user_id'];?>" name="<?php echo $user['user_id'];?>"><?php echo $user['user_name'];?></option>
    <?php
	}
	?></select>
  <a href="<?php echo site_url('users/admin/users/add')?>" target="_blank">Add user</a>
        </div>
        <input type="hidden" id="transaction_id" name="transaction_id"/>     
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="btn-save" onclick="return transaction.save()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<script>


var transaction={
			add:function(){
						$('#transaction_id').val('');
						$('#transaction_image').val('');
						$('#user_id').val('');						
						$('#myModalLabel').html('Add Transaction');
						$('#myModal').modal();	
						$('#transaction_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('transaction/admin/transactions/getByIdJSON')?>',{id:id},function(data){
					$('#transaction_id').val(data.transaction_id);
					$('#transaction_image').val(data.transaction_image);
					$('#user_id').val(data.user_id);
					$('#myModal').modal();
				});				
			},
			save:function()
			{		$.post('<?php echo site_url('transaction/admin/transactions/save')?>',$('#transaction-form').serialize(),function(data){
						if(data.success)
						{
							//$('#myModal').modal('hide');
							//window.location.href='<?php //site_url('admin/transaction')?>';
							$('#myModal').modal('hide');
							transaction.list();
							
						}
						
					},'JSON');
					
					return false;
			},
			delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('transaction/admin/transactions/remove')?>/'+id,null,function(data){
						if(data.success)
						{
							transaction.list();
						}
					});
					
				}
				return false;
			},
			list:function()
			{
				$.get('<?php echo site_url('transaction/admin/transactions/lists')?>',null,function(data){
					$('#transaction-list-block').html(data);
				});			
			}
	};




$(document).on('ready',function()
{
	transaction.list();
	uploadReady();
});

	function uploadReady()
	{
		uploader=$('#upload_image');
		new AjaxUpload(uploader, {
			action: '<?php echo site_url('transaction/admin/transactions/upload_image')?>',
			name: 'userfile',
			responseType: "json",
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					//$.messager.show({title: 'Error',msg: 'Only JPG, PNG or GIF files are allowed'});
					alert('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				//status.text('Uploading...');
			},
			onComplete: function(file, response){
				if(response.error==null){
					var filename = response.file_name;
					$('#upload_image').hide();
					$('#transaction_image').val(filename);
					$('#upload_image_name').html(filename);
					$('#upload_image_name').show();
					$('#change-image').show();
				}
                else
                {
					alert(response.error);
					//$.messager.show({title: 'Error',msg: response.error});                
                }
			}		
		});		
	}


</script>

<h2>Transaction</h2>
<a href="javascript:void(0)"  onclick="transaction.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Transaction</a>


<!--Do Not Remove this DIV -->
<div id="transaction-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="transaction-form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="span8">
        <label>Transaction Image:</label>
        <input type="text" name="transaction_image" id="transaction_image" />
        </div>
        <div class="span8">
        <label>User</label>
        <input type="text" name="user_id" id="user_id" />
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
						$('#myModal').modal();	
						$('#transaction_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('transaction/admin/transactions/getByIdJSON')?>',{id:id},function(data){
					$('#transaction_id').val(data.transaction_id);
					$('#transaction_name').val(data.transaction_image);
					$('#transaction_description').val(data.user_id);
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
});

</script>

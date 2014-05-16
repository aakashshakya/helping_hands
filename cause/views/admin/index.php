<h2>Cauess</h2>
<a href="javascript:void(0)"  onclick="cause.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Causes</a>

<!--Do Not Remove this DIV -->
<div id="cause-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="cause-form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="span8">
        <label>Name:</label>
        <input type="text" name="cause_name" id="cause_name" />
        </div>
        <div class="span8">
        <label>Description:</label>
        <textarea name="cause_description" id="cause_description" ></textarea>
        </div>
        <div class="span8">
       <label>Beneficial:</label>
 <select name="beneficial_id" id="beneficial_id" >
    <?php
	foreach($beneficials as $beneficial){
    ?>
    <option value="<?php echo $beneficial['beneficial_id'];?>" id="<?php echo $beneficial['beneficial_id'];?>" name="<?php echo $beneficial['beneficial_id'];?>"><?php echo $beneficial['beneficial_name'];?></option>
    <?php
	}
	?></select>
    <a href="javascript:void(0)" onclick="cause.reloadBeneficial()">Refresh</a>
  <a href="<?php echo site_url('beneficial/admin/beneficials/add')?>" target="_blank">Add Beneficial</a>
        </div>
        <div class="span8">
        <label>Status:</label>
        <input type="radio" name="status" id="status_1" value="1" />Active
        <input type="radio" name="status" id="status_0" value="0" />Inactive        
        </div>  
        <input type="hidden" id="cause_id" name="cause_id"/>     
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="btn-save" onclick="return cause.save()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<script>


var cause={
			add:function(){
						$('#cause_id').val('');
						$('#cause_name').val('');
						$('#cause_description').val('');
						$('#beneficial_id').val('');
						$('#status_1').prop('checked',true);
						$('#myModalLabel').html('Add Cause');
						$('#myModal').modal();	
						$('#cause_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('cause/admin/causes/getByIdJSON')?>',{id:id},function(data){
					$('#cause_id').val(data.cause);
					$('#cause_name').val(data.beneficial_name);
					$('#cause_description').val(data.cause_description);
					$('#beneficial_id').val(data.beneficial_id);
					if(data.status=="1")
					{
						$('#status_1').prop('checked',true);
					}
					else
					{
						$('#status_0').prop('checked',true);
					}
					$('#myModalLabel').html('Edit Cause');
					$('#myModal').modal();
				});				
			},
			save:function()
			{		$.post('<?php echo site_url('cause/admin/causes/save')?>',$('#cause-form').serialize(),function(data){
						if(data.success)
						{
							//$('#myModal').modal('hide');
							//window.location.href='<?php //site_url('admin/beneficials')?>';
							$('#myModal').modal('hide');
							cause.list();
							
						}
						
					},'JSON');
					
					return false;
			},
			delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('cause/admin/causes/remove')?>/'+id,null,function(data){
						if(data.success)
						{
							beneficial.list();
						}
					});
					
				}
				return false;
			},
			list:function()
			{
				$.get('<?php echo site_url('cause/admin/causes/lists')?>',null,function(data){
					$('#cause-list-block').html(data);
				});			
			},
		
			reloadBeneficial:function()
			{
				$obj = $('#beneficial_id');
				$obj.html('<option value="">Select Beneficial</option>');
				$.getJSON('<?php echo site_url('beneficial/admin/beneficials/json')?>',null,function(data){
					$.each(data.beneficial,function(i,o){
						$obj.append('<option value="'+o.beneficial_id+'">'+o.beneficial_name+'</option>');
					});
				});				
			}
	};





$(document).on('ready',function()
{
	cause.list();
});

</script>

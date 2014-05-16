<h2>Beneficials</h2>
<a href="javascript:void(0)"  onclick="beneficial.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Beneficial</a>

<!--Do Not Remove this DIV -->
<div id="beneficial-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="beneficial-form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="span8">
        <label>Name:</label>
        <input type="text" name="beneficial_name" id="beneficial_name" />
        </div>
        <div class="span8">
        <label>Address:</label>
        <input type="text" name="beneficial_address" id="beneficial_address" />
        </div>
        <div class="span8">
       <label>Event:</label>
 <select name="event_id" id="event_id" >
 <option value="">Select Event</option>
    <?php
	foreach($events as $event){
    ?>
    <option value="<?php echo $event['event_id'];?>" id="<?php echo $event['event_id'];?>" name="<?php echo $event['event_id'];?>"><?php echo $event['event_name'];?></option>
    <?php
	}
	?></select>
  <a href="javascript:void(0)" onclick="beneficial.reloadEvent()">Refresh</a> <a href="<?php echo site_url('events/admin/events/add')?>" target="_blank">Add Event</a>
        </div>
        <div class="span8">
        <label>Status:</label>
        <input type="radio" name="status" id="status_1" value="1" />Active
        <input type="radio" name="status" id="status_0" value="0" />Inactive        
        </div>  
        <input type="hidden" id="beneficial_id" name="beneficial_id"/>     
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="btn-save" onclick="return beneficial.saveJson()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<script>


var beneficial={
			add:function(){
						$('#beneficial_id').val('');
						$('#beneficial_name').val('');
						$('#beneficial_address').val('');
						$('#event_id').val('');
						$('#status_1').prop('checked',true);
						$('#myModalLabel').html('Add Beneficial');
						$('#myModal').modal();	
						$('#beneficial_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('beneficial/admin/beneficials/getByIdJSON')?>',{id:id},function(data){
					$('#beneficial_id').val(data.beneficial_id);
					$('#beneficial_name').val(data.beneficial_name);
					$('#beneficial_address').val(data.beneficial_address);
					$('#event_id').val(data.event_id);
					if(data.status=="1")
					{
						$('#status_1').prop('checked',true);
					}
					else
					{
						$('#status_0').prop('checked',true);
					}
					$('#myModalLabel').html('Edit Beneficial');
					$('#myModal').modal();
				});				
			},
			saveJson:function()
			{		$.post('<?php echo site_url('beneficial/admin/beneficials/saveJson')?>',$('#beneficial-form').serialize(),function(data){
						if(data.success)
						{
							//$('#myModal').modal('hide');
							//window.location.href='<?php //site_url('admin/beneficials')?>';
							$('#myModal').modal('hide');
							beneficial.list();
							
						}
						
					},'JSON');
					
					return false;
			},
			delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('beneficial/admin/beneficials/remove')?>/'+id,null,function(data){
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
				$.get('<?php echo site_url('beneficial/admin/beneficials/lists')?>',null,function(data){
					$('#beneficial-list-block').html(data);
				});			
			},
			reloadEvent:function()
			{
				$obj = $('#event_id');
				$obj.html('<option value="">Select Event</option>');
				$.getJSON('<?php echo site_url('events/admin/events/json')?>',null,function(data){
					$.each(data.events,function(i,o){
						$obj.append('<option value="'+o.event_id+'">'+o.event_name+'</option>');
					});
				});				
			}
			
	};





$(document).on('ready',function()
{
	beneficial.list();
});

</script>

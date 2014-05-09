<h2>Type</h2>
<a href="javascript:void(0)"  onclick="t.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Type</a>

<!--Do Not Remove this DIV -->
<div id="type-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="type-form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Type</h4>
      </div>
      <div class="modal-body">
        <div class="span8">
        <label>Name:</label>
        <input type="text" name="type_name" id="type_name" />
        </div>
        <div class="span8">
        <label>Status:</label>
        <input type="radio" name="status" id="status_1" value="1" />Active
        <input type="radio" name="status" id="status_0" value="0" />Inactive        
        </div>  
        <input type="hidden" id="type_id" name="type_id"/>     
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="btn-save" onclick="return t.save()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<script>

function add(){
						$('#type_id').val('');
						$('#type_name').val('');
						$('#status_1').prop('checked',true);						
						$('#myModalLabel').html('Add Type');
						$('#myModal').modal();
						$('#type_name').focus();
			}
var t={

			add:function(){
						$('#type_id').val('');
						$('#type_name').val('');
						$('#status_1').prop('checked',true);
						$('#myModal').modal();	
						$('#type_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('type/admin/types/getByIdJSON')?>',{id:id},function(data){
					$('#type_id').val(data.type_id);
					$('#type_name').val(data.type_name);
					if(data.status=="1")
					{
						$('#status_1').prop('checked',true);
					}
					else
					{
						$('#status_0').prop('checked',true);
					}
					$('#myModal').modal();
				});				
			},
			save:function()
			{		$.post('<?php echo site_url('type/admin/types/save')?>',$('#type-form').serialize(),function(data){
						if(data.success)
						{
							//$('#myModal').modal('hide');
							//window.location.href='<?php //site_url('admin/type')?>';
							$('#myModal').modal('hide');
							t.list();
							
						}
						
					},'JSON');
					
					return false;
			},
			delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('type/admin/types/remove')?>/'+id,null,function(data){
						if(data.success)
						{
							t.list();
						}
					});
					
				}
				return false;
			},
			list:function()
			{
				$.get('<?php echo site_url('type/admin/types/lists')?>',null,function(data){
					$('#type-list-block').html(data);
				});			
			}
	};





$(document).on('ready',function()
{
	t.list();
});

</script>

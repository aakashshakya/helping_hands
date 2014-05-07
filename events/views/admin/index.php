<h2>Events</h2>
<a href="<?php echo site_url('events/admin/events/add')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Event</a>
<a href="javascript:void(0)" class="btn btn-primary" onclick="e"><span class="glyphicon glyphicon-plus"></span> 
Reload</a>

<!--Do Not Remove this DIV -->
<div id="type-list-block"></div>

<script>


var e={	
            delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('events/admin/events/remove')?>/'+id,null,function(data){
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
				$.get('<?php echo site_url('events/admin/events/lists')?>',null,function(data){
					$('#type-list-block').html(data);
				});			
			}
	};





$(document).on('ready',function()
{
	e.list();
});

</script>

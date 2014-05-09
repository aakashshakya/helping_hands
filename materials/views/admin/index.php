<h2>Material</h2>
<a href="<?php echo site_url('materials/admin/materials/add')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Materials</a>

<!--Do Not Remove this DIV -->
<div id="type-list-block"></div>



<script>


var material={	
            delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('materials/admin/materials/remove')?>/'+id,null,function(data){
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
				$.get('<?php echo site_url('materials/admin/materials/lists')?>',null,function(data){
					$('#type-list-block').html(data);
				});			
			}
	};





$(document).on('ready',function()
{
	material.list();
});

</script>
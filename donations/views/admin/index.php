<h2>Donations</h2>
<a href="<?php echo site_url('donations/admin/donations/add')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Donation</a>

<!--Do Not Remove this DIV -->
<div id="type-list-block"></div>



<script>


var donation={	
             delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('donations/admin/donations/remove')?>/'+id,null,function(data){
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
				$.get('<?php echo site_url('donations/admin/donations/lists')?>',null,function(data){
					$('#type-list-block').html(data);
				});			
			}
	};





$(document).on('ready',function()
{
	donation.list();
});

</script>

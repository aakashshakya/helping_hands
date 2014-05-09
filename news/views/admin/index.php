<h2>News</h2>
<a href="javascript:void(0)"  onclick="news.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add News</a>

<!--Do Not Remove this DIV -->
<div id="news-list-block"></div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="news-form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit News</h4>
      </div>
      <div class="modal-body">
        <div class="span8">
        <label>Name:</label>
        <input type="text" name="news_name" id="news_name" />
        </div>
        <div class="span8">
        <label>Description:</label>
        <textarea name="news_description" id="news_description"></textarea>
        </div>
        <div class="span8">
        <label>Status:</label>
        <input type="radio" name="status" id="status_1" value="1" />Active
        <input type="radio" name="status" id="status_0" value="0" />Inactive        
        </div>  
        <input type="hidden" id="news_id" name="news_id"/>     
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" id="btn-save" onclick="return news.save()">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<script>


var news={
			add:function(){
						$('#news_id').val('');
						$('#news_name').val('');
						$('#news_description').val('');
						$('#status_1').prop('checked',true);
						$('#myModal').modal();	
						$('#news_name').focus();
			},
			edit:function(id)
			{
				$.getJSON('<?php echo site_url('news/admin/news/getByIdJSON')?>',{id:id},function(data){
					$('#news_id').val(data.news_id);
					$('#news_name').val(data.news_name);
					$('#news_description').val(data.news_description);
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
			{		$.post('<?php echo site_url('news/admin/news/save')?>',$('#news-form').serialize(),function(data){
						if(data.success)
						{
							//$('#myModal').modal('hide');
							//window.location.href='<?php //site_url('admin/news')?>';
							$('#myModal').modal('hide');
							news.list();
							
						}
						
					},'JSON');
					
					return false;
			},
			delete:function(id)
			{
				if(confirm('Are you sure to delete?')){
					$.getJSON('<?php echo site_url('news/admin/news/remove')?>/'+id,null,function(data){
						if(data.success)
						{
							news.list();
						}
					});
					
				}
				return false;
			},
			list:function()
			{
				$.get('<?php echo site_url('news/admin/news/lists')?>',null,function(data){
					$('#news-list-block').html(data);
				});			
			}
	};





$(document).on('ready',function()
{
	news.list();
});

</script>

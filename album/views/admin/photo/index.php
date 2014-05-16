<h2>Album</h2>
<a href="javascript:void(0)"  onclick="photo.add()" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Photo</a>

<!--Do Not Remove this DIV -->
<table id="photo-table"  data-options="title:'Photos',collapsible:true,iconCls:'icon-add',fitColumns:true,pagination:true">
<thead>
  <tr>
    <th></th>
    <th width="30" field="photo_id">Id</th>
    <th width="200"  field="image">Image</th>
    <th width="150"  field="added_date">Added Date</th>
    <th width="80" field="status">Status</th>
    <th width="200" field="album_name">Album</th>
    <th width="100" field="photographer_name" formatter='formatPhotographer'>Photographer</th>
   
    <th width="300" field="action" formatter='getActions'>Action</th>
  </tr>
 </thead>
</table>

<script>
	$(document).on('ready',function(){
		$('#photo-table').datagrid({
			url:'<?php echo site_url('album/admin/photo/json')?>'
		});
	});
	
	function formatPhotographer(value,row,index)
	{
		//console.log(row);
		return '<a href="">'+row.first_name + ' ' + row.last_name + '</a>';
	}
	function getActions(value,row,index)
	{
		//console.log(row);
		var e='<a href="">Edit</a>';
		var d='<a href="">Delete</a>';
		return e+ ' ' + d;
		
	}	
</script>
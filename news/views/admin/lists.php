<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>News Name</th>
    <th>Description</th>
    <th>Created Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
 <?php foreach($news as $news){?>
  <tr>
  
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $news['news_id']?></td>
    <td><?php echo $news['news_name']?></td>
    <td><?php echo $news['news_description']?></td>
    <td><?php echo $news['created_date']?></td>
    <td><?php echo $news['status']?></td>
    <td><a href="javascript:void(0)" class="btn btn-info" onclick="news.edit('<?php echo $news['news_id']?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)<?php //echo site_url('admin/news/remove/'.$news['news_id'])?>" class="btn btn-danger" onclick="return news.delete('<?php echo $news['news_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>
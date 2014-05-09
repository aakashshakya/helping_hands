<body>
<h2><span class="label label-primary">Edit <?php echo $news['news_name']?></span></h2>
<form action="<?php echo site_url('admin/news/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">News Name</td>
    <td><label for="news_name"></label>
    
      <input type="text" name="news_name" id="news_name" class="form-control" value="<?php echo $news['news_name']?>" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Description:</td>
    <td><label for="news_description"></label>
      <textarea name="news_description" id="news_description" cols="45" rows="5" class="form-control" required><?php echo $news['news_description']?></textarea></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <input type="hidden" id="news_id" name="news_id" value="<?php echo $news['news_id'];?>"/>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="index.php">Cancel</a></td>
  </tr>
</table>
</div>
</form>
</body>
</html>

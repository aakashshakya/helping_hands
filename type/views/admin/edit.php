<body>
<h2><span class="label label-primary">Edit <?php echo $type['type_name']?></span></h2>
<form action="<?php echo site_url('admin/types/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Type Name</td>
    <td><label for="type_name"></label>
    
      <input type="text" name="type_name" id="type_name" class="form-control" value="<?php echo $type['type_name']?>" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <input type="hidden" id="type_id" name="type_id" value="<?php echo $type['type_id'];?>"/>
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

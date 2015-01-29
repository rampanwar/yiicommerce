<?php
/* @var $this AuthdataController */
/*
$this->breadcrumbs=array(
	'Authdata',
);
*/
?>
<style type="text/css">
.roleClass {
	width: 70px;
	float: left;
}
ul {
	list-style-type: none;
}
</style>
<h1>AuthData List<a href="<?php echo $this->createUrl("authdata/create"); ?>" style="font-size: 14px; margin-left: 15px;">Add</a></h1>
<div class="fullWidth">
	<ul style="width: 500px;">
   	<?php 
		foreach($authlist as $authRel){ ?>
    <li class="fullWidth"><div class="roleClass"><?php echo $authRel->parent;?></div><div class="fleft"><?php echo $authRel->child; ?></div><a href="<?php echo $this->createUrl("authdata/delete/id/".$authRel->child); ?>" style="float: right">Delete</a></li>
    <?php } ?>
  </ul>
</div>
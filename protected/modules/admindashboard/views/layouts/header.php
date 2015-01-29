<h1>Dashboard
  <div class="pull-right">
  <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
  <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
  <a class="btn btn-large tip-bottom" title="Manage Comments" style="position:relative"><i class="icon-comment"></i>
  <span style="position:absolute; border-radius:12px; top:-23%; height:16px; width:16px" class="label label-important">5</span></a>
  <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
  <a class="btn btn-large" title="" href="#"><i class="icon icon-user"></i> <span>Profile</span></a>
  <a class="btn btn-large" title="" href="#"><i class="icon icon-cog"></i> Settings</a>
  <a class="btn btn-large btn-danger" title="" href="<?php echo Yii::app()->createUrl($this->module->id.'/admin/logout'); ?>"><i class="icon-off"></i></a>
  </div>
</h1>
<div id="breadcrumb">
  <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" class="current">Dashboard</a>
</div>
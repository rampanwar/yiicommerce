<?php $this->beginContent('//layouts/main');
$ACTION = $this->getAction()->getId();
?>
<div class="row">
  
  <div id="sidebar" class="span3">
    <ul class="nav nav-tabs nav-stacked">
      <li id="index"><a href="<?php echo ($ACTION=='index' ? 'javascript:void(0);' : $this->createUrl('users/index')); ?>">My Account</a></li>
      <li id="orders"><a href="<?php echo ($ACTION=='orders' ? 'javascript:void(0);' : $this->createUrl('users/orders')); ?>">My Orders</a></li>
      <li id="address"><a href="<?php echo ($ACTION=='' ? 'javascript:void(0);' : $this->createUrl('users/changepassword')); ?>">Addresses</a></li>
      <li id="emailnotifications"><a href="<?php echo ($ACTION=='' ? 'javascript:void(0);' : $this->createUrl('users/changepassword')); ?>">Email Subscriptions</a></li>
      <li id="changepassword"><a href="<?php echo ($ACTION=='' ? 'javascript:void(0);' : $this->createUrl('users/changepassword')); ?>">Change Password</a></li>
      <li id="deleteaccount"><a href="<?php echo ($ACTION=='deletedaccount' ? 'javascript:void(0);' : $this->createUrl('users/deleteaccount')); ?>">Delete Account</a></li>
    </ul>
  </div>

  <div class="span9">
		<?php if(Yii::app()->user->hasFlash($ACTION)): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <?php echo Yii::app()->user->getFlash($ACTION); ?>
    </div>
    <?php endif; ?>
  	<div class="well well-small">
		<?php echo $content; ?>
    </div>
	</div>

</div>
<?php $this->endContent(); ?>
<script type="text/javascript">
$(document).ready(function(e) {
  var activeItem = $("#sidebar").find('#<?php echo $ACTION;?>');
	if(activeItem.length > 0) {
		activeItem.addClass('active').find('a').attr('href', 'javascript:void(0);');
	}
});
</script>
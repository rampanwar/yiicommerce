<?php

?>
<div id="header">
	<div class="container">
    
    <div id="welcomeLine" class="row">
      <div class="span6"><?php if(!Yii::app()->user->isGuest): ?>Welcome!<strong> <?php echo Yii::app()->user->name; ?></strong><?php endif; ?></div>
      <div class="span6">
      <div class="pull-right">
        <a href="product_summary.html"><span class="">Fr</span></a>
        <a href="product_summary.html"><span class="">Es</span></a>
        <span class="btn btn-mini">En</span>
        <a href="product_summary.html"><span>£</span></a>
        <span class="btn btn-mini">$155.00</span>
        <a href="product_summary.html"><span class="">$</span></a>
        <a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
      </div>
      </div>
    </div>

    <div id="logoArea" class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="<?php echo BASE_PATH; ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
        <form class="form-inline navbar-search" method="post" action="products.html">
          <input id="srchFld" class="srchTxt" type="text">
          <select class="srchTxt">
            <option>All</option>
            <option>CLOTHES </option>
            <option>FOOD AND BEVERAGES </option>
            <option>HEALTH &amp; BEAUTY </option>
            <option>SPORTS &amp; LEISURE </option>
            <option>BOOKS &amp; ENTERTAINMENTS </option>
          </select> 
          <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
        </form>
        <?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions'=>array('id'=>"topMenu", 'class'=>"nav pull-right"),
					'items'=>array(
						array('label'=>'Home', 'url'=>BASE_PATH),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Signup', 'url'=>array('/users/signup'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Login', 'url'=>array('/users/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Hi ('.Yii::app()->user->data['u_fname'].')', 'url'=>array('users/index'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Logout', 'url'=>array('/users/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
      </div>
    </div>

  </div>
</div>
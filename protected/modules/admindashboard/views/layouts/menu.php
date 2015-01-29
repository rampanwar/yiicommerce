<?php
$sectionID = $this->getId();
//pr($sectionID);
?>
<div id="sidebar"> 
  <h1 id="logo"><a href="index.php">Free Admin</a></h1>  
  <a href="<?php echo $this->createUrl("admin/index"); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?php echo $this->createUrl("admin/index"); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
    <li><a href="<?php echo $this->createUrl("authdata/index"); ?>"><i class="icon icon-tint"></i> <span>Auth Data</span></a></li>
    <li class="submenu <?php echo ($sectionID=='categories' ? 'open' : ''); ?>">
      <a href="<?php echo $this->createUrl("categories/admin"); ?>"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label">0</span></a>
      <ul style="<?php echo ($sectionID=='categories' ? 'display:block' : ''); ?>">
        <li><a href="<?php echo $this->createUrl("categories/admin"); ?>">List Categories</a></li>
        <li><a href="<?php echo $this->createUrl("categories/create"); ?>">Add Category</a></li>
      </ul>
    </li>
    <li class="submenu <?php echo ($sectionID=='subcategories' ? 'open' : ''); ?>">
      <a href="<?php echo $this->createUrl("subcategories/admin"); ?>"><i class="icon icon-th-list"></i> <span>Child Categories</span> <span class="label">0</span></a>
      <ul style="<?php echo ($sectionID=='subcategories' ? 'display:block' : ''); ?>">
        <li><a href="<?php echo $this->createUrl("subcategories/admin"); ?>">List ChildCategories</a></li>
        <li><a href="<?php echo $this->createUrl("subcategories/create"); ?>">Add ChildCategory</a></li>
      </ul>
    </li>
    <li class="submenu <?php echo ($sectionID=='attributes' ? 'open' : ''); ?>">
      <a href="<?php echo $this->createUrl("attrbutes/admin"); ?>"><i class="icon icon-th-list"></i> <span>Attributes</span> <span class="label">0</span></a>
      <ul style="<?php echo ($sectionID=='attributes' ? 'display:block' : ''); ?>">
        <li><a href="<?php echo $this->createUrl("attributes/admin"); ?>">List Attributes</a></li>
        <li><a href="<?php echo $this->createUrl("attributes/create"); ?>">Add Attributes</a></li>
      </ul>
    </li>
    <li class="submenu <?php echo ($sectionID=='attributes' ? 'open' : ''); ?>">
      <a href="<?php echo $this->createUrl("attrbutes/admin"); ?>"><i class="icon icon-th-list"></i> <span>Attributes</span> <span class="label">0</span></a>
      <ul style="<?php echo ($sectionID=='attributes' ? 'display:block' : ''); ?>">
        <li><a href="<?php echo $this->createUrl("attributes/admin"); ?>">List Attributes</a></li>
        <li><a href="<?php echo $this->createUrl("attributes/create"); ?>">Add Attributes</a></li>
      </ul>
    </li>
    <li><a href="#"><i class="icon icon-pencil"></i> <span>Interface Elements</span></a></li>
    <li><a href="#"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="#"><i class="icon icon-th-list"></i> <span>Grid Layout</span></a></li>
    <li class="submenu">
      <a href="#"><i class="icon icon-file"></i> <span>Sample pages</span> <span class="label">4</span></a>
      <ul>
        <li><a href="#">Invoice</a></li>
        <li><a href="#">Support chat</a></li>
        <li><a href="#">Calendar</a></li>
        <li><a href="#">Gallery</a></li>
      </ul>
    </li>
    <li>
      <a href="#"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a>
    </li>
    <li>
      <a href="#"><i class="icon icon-inbox"></i> <span>Widgets</span></a>
    </li>
  </ul>
</div>
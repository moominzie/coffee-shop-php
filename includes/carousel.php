<div id="menu" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#menu" data-slide-to="0" class="active"></li>
    <li data-target="#menu" data-slide-to="1"></li>
    <li data-target="#menu" data-slide-to="2"></li>
  </ol>

      <div class="carousel-inner">

      <div class="carousel-item active">
        <?php
        
    $sql = "SELECT bevbanner.Images as bev from bevbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->bev);?>" class="d-block w-100" alt="banner">
          <?php }} ?>
          
        </div>

        <div class="carousel-item">
        <?php
    $sql = "SELECT foodbanner.Images as food from foodbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->food);?>" class="d-block w-100" alt="banner">
          <?php }} ?>
        </div>

        <div class="carousel-item">
        <?php
    $sql = "SELECT breadbanner.Images as bread from breadbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->bread);?>" class="d-block w-100" alt="banner">
          <?php }} ?>
        </div>

      </div>

      <a class="carousel-control-prev" href="#menu" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#menu" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

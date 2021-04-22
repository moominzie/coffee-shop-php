  <!-- Site footer -->
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <h6>About</h6>

            <?php
$sql="SELECT ShopName,Address,MobileNumber,ShopEmail from  shop  ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<p class="text-justify"><?php echo htmlentities($result->ShopName);?></p>
<p class="text-justify"><?php echo htmlentities($result->Address);?></p>
<p class="text-justify"> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo htmlentities($result->MobileNumber);?> </p>
<p class="text-justify"> <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo htmlentities($result->ShopEmail);?></p>

<?php }} ?>
         
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="beverage.php">Beverage</a></li>
              <li><a href="fresh-bread.php">Fresh bread</a></li>
              <li><a href="toast.php">Toast</a></li>
              <li><a href="food.php">Food</a></li>
              
            </ul>
          </div>

          <?php if($_SESSION['login'])
{
?>  
          <div class="col-xs-6 col-md-3">
            <h6>Quick links</h6>
            <ul class="footer-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="account.php">Profile</a></li>
              <li><a href="logout.php">Sing out</a></li>
              <li><a href="mycart.php">My Cart &nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-2">
            <h6>Working to become resource positive</h6>
            <p>Stay up to date with what we’re doing to become a resource-positive company, giving back more than we take from the planet.</p>
          </div>

          <?php } else { ?>
            <div class="col-xs-6 col-md-3">
            <h6>Quick links</h6>
            <ul class="footer-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="contactus.php">Contact us</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-2">
            <h6>Staff</h6>
            <ul class="footer-links">
              <li><a href="loginadmin.php">Staff sign in &nbsp<i class="fas fa-user-tie"></i></a></li>
            </ul>
          </div>

          <?php } ?>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">CPE-SUT #22</a>.
            </p>
          </div>
        </div>
      </div>
</footer>
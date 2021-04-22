<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('loginmember.php');
}
if(isset($_POST["mid"]) && isset($_POST["mname"]) && isset($_POST["mprice"]) && isset($_POST["mimg"]))
{
    $id = $_POST["mid"];
    $name = $_POST["mname"];
    $price = $_POST["mprice"];
    $image = $_POST["mimg"];
    $qty = 1;

    $sql = "SELECT ProductId FROM cart WHERE ProductId=:id";
    $query = $dbh -> prepare($sql);
    $query->execute(array(":id"=>$id));
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $check_id = $results["id"];

    if(!$check_id)
    {
        $sql = "INSERT INTO cart(ProductName, ProductPrice, ProductImage, Quantity, TotalPrice) VALUES(:name,:price,:image,:qty,:total_price)";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->bindParam(':price',$price,PDO::PARAM_STR);
        $query->bindParam(':image',$image,PDO::PARAM_STR);
        $query->bindParam(':qty',$qty,PDO::PARAM_STR);
        $query->bindParam(':total_price',$total_price,PDO::PARAM_STR);
        $query->execute();

        echo '<div class="alert alert-success" role="alert">
               Product added to your cart
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
              Product is already in your cart now
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>';
    }
}
?>

<?php 
if(isset($_GET["cartItem"]) && isset($_GET["cartItem"])=="cart_item")
{
    $sql = "SELECT * FROM cart";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->rowCount();
    echo $results;
}
?>
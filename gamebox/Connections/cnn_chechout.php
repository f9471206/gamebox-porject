
<?php
// require_once 'Connections/cnn.php';

?>


<?php
session_start();
@$username = $_SESSION['username'];
@$userid = $_SESSION['userId'];

if (isset($_POST['submit'])) {
    //建立order
    $sql = "alter table `order` auto_increment=1;insert into `order`(user_id,order_date) values(:user_id,:order_date)";
    $stmt = $link->prepare($sql);
    $order_date = date('Y-m-d H:i:s');
    $stmt->bindPARAM(":user_id", $userid, PDO::PARAM_STR);
    $stmt->bindPARAM(":order_date", $order_date, PDO::PARAM_STR);
    $stmt->execute();

    //回傳order的流水號
    $sql = "SELECT LAST_INSERT_ID()";
    $stmt = $link->prepare($sql);
    $stmt->execute();
    $lastInsertId = $stmt->fetchColumn(); // 該清單的流水號
    // echo $lastInsertId;

    $vlarray = $_POST['proid']; //商品名稱
    $proquan = $_POST['proquan']; //商品數量
    $monyarr = $_POST['promoney']; //商品單價
    // print_r($monyarr);
    // echo "<br>";

    for ($i = 0; $i < count($vlarray); $i++) {
        $obj = new stdClass();
        $obj->proid = $vlarray[$i]; //商品名稱
        //商品名稱轉商品id
        $obj->proquan = $proquan[$i]; //商品數量
        $obj->promoney = $monyarr[$i]; //商品單價
        $result[] = $obj;
        $evaluate = 0;
    }
    foreach ($result as $item) {
        $sqlCheckout = "INSERT INTO `order_details`(order_id , pro_id, unitprice, quantity ,evaluate) VALUES(:order_id, :pro_id, :unitprice, :quantity, :evaluate)";
        $stmtCheckout = $link->prepare($sqlCheckout);
        $stmtCheckout->bindParam(":order_id", $lastInsertId, PDO::PARAM_INT);
        $stmtCheckout->bindParam(":pro_id", $item->proid, PDO::PARAM_INT);
        $stmtCheckout->bindParam(":unitprice", $item->promoney, PDO::PARAM_INT);
        $stmtCheckout->bindParam(":quantity", $item->proquan, PDO::PARAM_INT);
        $stmtCheckout->bindParam(":evaluate", $evaluate, PDO::PARAM_INT);
        $stmtCheckout->execute();
    }
    echo "<script>alert('訂單完成')</script>";
    echo "<script>localStorage.removeItem('list')</script>";
    echo '<script>location.href="index.php"</script>';

}

?>
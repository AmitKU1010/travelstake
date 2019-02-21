<?php 	
        require_once('dbConnect.php');
      $stmt = $con->prepare("SELECT product_id,brand,model,rate,quantity,discount,gst,amount FROM product_info ORDER BY id asc");
      $stmt->execute();
      $stmt->bind_result($product_id,$brand,$model,$rate,$quantity,$discount,$gst,$amount);

    while($stmt->fetch()){
 echo "<tr><td>".$product_id. "</td><td>".$brand."</td><td>".$model."</td><td>".$rate."</td><td>".$quantity."</td><td>".$discount."</td><td>".$gst."</td><td>".$amount."</td></tr>";
}
    ?>
	 <?php 
      $stmt = $con->prepare("SELECT SUM(amount) FROM product_info");
      $stmt->execute();
      $stmt->bind_result($total_amount);

    while($stmt->fetch()){
 echo "<hr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><b>"<button>.$total_amount.<button>"</b></td></tr>";
}
    ?>
<script type="text/javascript">
 $("#add").click(function(e) {
  e.preventDefault();
    var product_id = $("#id").val(); 
    var brand = $("#com").val();
    var model = $("#mod").val(); 
    var rate = $("#rate").val();
    var quantity = $("#quan").val(); 
    var discount = $("#dis").val();
    var gst = $("#gst").val(); 
    var amount = $("#amount").val();
    var dataString = 'product_id='+product_id+'&brand='+brand+'&model='+model+'&rate='+rate+'&quantity='+quantity+'&discount='+discount+'&gst='+gst+'&amount='+amount;
    $.ajax({
      type:'POST',
      data:dataString,
      url:'insert.php',
      success:function(data) {
        // alert(data);
         window.location.reload();
      }
    });
  });
  </script>
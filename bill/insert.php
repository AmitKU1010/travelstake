<?php

	 //if($_SERVER['REQUEST_METHOD']=='POST')
	{  
		require_once('dbConnect.php');
		
        $product_id = $_POST['product_id'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $rate = $_POST['rate'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
        $gst = $_POST['gst'];
        $amount = $_POST['amount'];
        
       
		$stmt = $con->prepare("INSERT INTO product_info (product_id,brand,model,rate,quantity,discount,gst,amount)
        VALUES (?,?,?,?,?,?,?,?)");
        

		$stmt->bind_param("ssssssss",$product_id,$brand,$model,$rate,$quantity,$discount,$gst,$amount);

		if ($stmt->execute() ) { 
               
                	echo "success";
            }
        else {
                // it didn't
                echo "failure";
            }
            
        $stmt->close();     
		mysqli_close($con);
			
	}
  ?>

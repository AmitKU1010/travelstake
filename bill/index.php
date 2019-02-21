<!DOCTYPE html>
<html lang="en">
<head>
  <title>Billing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Billing System</h2>     

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Brand</th>
        <th>Model</th>
		 <th>Rate</th>
        <th>Quantity</th>
        <th>Discount in %</th>
        <th>GST in %</th>
		<th>Amount</th>
		<th><button type="button" class="btn btn-primary" id="add" name="submit" value="submit">ADD</button></th>
      </tr>
    </thead>

      <tbody>


      <form role="form" method="post" action="index.php"> 
      <tr>
        <td><input type="text" class="form-control" name="i" id="id1" placeholder="Enter Product ID" required></td>
        <td><input type="text" class="form-control" name="c" id="com1" placeholder="Enter Brand" required></td>
        <td><input type="text" class="form-control" name="m" id="mod1" placeholder="Enter Model" required></td>
	      <td><input type="text" class="form-control" name="r" id="rate1" placeholder="Enter Rate" required></td>
        <td><input  type="text" class="form-control" name="q" id="quan1" placeholder="Enter Quantity" onKeyPress="quanValueKeyPress1()" onKeyUp="quanValueKeyPress1()" required></td>
        <td><input type="text" class="form-control" name="d" id="dis1" placeholder="Enter Discount" onKeyPress="disValueKeyPress1()" onKeyUp="disValueKeyPress1()" required></td>
        <td><input type="text" class="form-control" name="g" id="gst1" placeholder="Enter GST" onKeyPress="gstValueKeyPress1()" onKeyUp="gstValueKeyPress1()" required></td>
        <td><input type="text" class="form-control" name="a" id="amount1"  placeholder="Total Amount" required></td>
        <!-- <td><input type="submit" class="btn btn-primary" id="add" name="add" value="ADD"></td> -->
      </tr>
      <tr id="appy">
      </tr>
    
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
      <button type="button" class="btn btn-primary" id="final_Sumbit" name="sumbit" value="submit">Submit</button></td>
    </form>
    
    
  </tbody>

    <!-- </tbody> -->
  </table>
  </body>
  <script src="calculate.js"></script>
  <script type="text/javascript">
$counter=1;
$save_counter=0;
$("#add").click(function(){
   

$counter += 1;
$save_counter += 1;
    $("#appy").before("<tr><td><input type='text' class='form-control' name='i' id='id"+$counter+"' placeholder='Enter Product ID' required></td><td><input type='text' class='form-control' name='c' id='com"+$counter+"' placeholder='Enter Brand' required></td><td><input type='text' class='form-control' name='m' id='mod"+$counter+"' placeholder='Enter Model' required></td><td><input type='text' class='form-control' name='r' id='rate"+$counter+"' placeholder='Enter Rate' required></td><td><input  type='text' class='form-control' name='q' id='quan"+$counter+"' placeholder='Enter Quantity' onKeyPress='quanValueKeyPress"+$counter+"()' onKeyUp='quanValueKeyPress"+$counter+"()'' required></td><td><input type='text' class='form-control' name='d' id='dis"+$counter+"' placeholder='Enter Discount' onKeyPress='disValueKeyPress"+$counter+"()' onKeyUp='disValueKeyPress"+$counter+"()' required></td><td><input type='text' class='form-control' name='g' id='gst"+$counter+"' placeholder='Enter GST' onKeyPress='gstValueKeyPress"+$counter+"()' onKeyUp='gstValueKeyPress"+$counter+"() required></td><td><input type='text' class='form-control' name='aa' id='amounta"+$counter+"' placeholder='Total Amount' required></td><td><input type='text' class='form-control' name='a' id='amount"+$counter+"' placeholder='Total Amount' required></td></tr>");


    var product_id = $("#id"+$save_counter).val(); 
    var brand = $("#com"+$save_counter).val();
    var model = $("#mod"+$save_counter).val(); 
    var rate = $("#rate"+$save_counter).val();
    var quantity = $("#quan"+$save_counter).val(); 
    var discount = $("#dis"+$save_counter).val();
    var gst = $("#gst"+$save_counter).val(); 
    var amount = $("#amount"+$save_counter).val();
    var dataString = 'product_id='+product_id+'&brand='+brand+'&model='+model+'&rate='+rate+'&quantity='+quantity+'&discount='+discount+'&gst='+gst+'&amount='+amount;
    $.ajax({
      type:'POST',
      data:dataString,
      url:'insert.php',
      success:function(data) {
      }
    });


});
    function quanValueKeyPress1()
    {

        var rate = document.getElementById("rate1");
        var rateValue = rate.value;

        var quan = document.getElementById("quan1");
        var quanValue = quan.value;

        var amount = document.getElementById("amount1");
        amount.value = rateValue*quanValue;
      
    } 

    //function for discount
    function disValueKeyPress1()
    {

        var rate = document.getElementById("rate1");
        var rateValue = rate.value;

        var quan = document.getElementById("quan1");
        var quanValue = quan.value;

        var dis = document.getElementById("dis1");
        var disValue = dis.value;

      
        var amount = document.getElementById("amount1");
        amount.value = rateValue*quanValue-((rateValue*quanValue)*(disValue/100));

        
    }


    //function for gst
    function gstValueKeyPress1()
    {

        var rate = document.getElementById("rate1");
        var rateValue = rate.value;

        var quan = document.getElementById("quan1");
        var quanValue = quan.value;

        var dis = document.getElementById("dis1");
        var disValue = dis.value;

        var gst = document.getElementById("gst1");
        var gstValue = gst.value;


        var amount = document.getElementById("amount1");
        amount.value = (rateValue*quanValue-((rateValue*quanValue)*(disValue/100)))+((rateValue*quanValue)*(gstValue/100));
      
    }  



     //function for quantity
    function quanValueKeyPress2()
    {

        var rate2 = document.getElementById("rate2");
        var rateValue2 = rate2.value;

        var quan2 = document.getElementById("quan2");
        var quanValue2 = quan2.value;

        var amount2 = document.getElementById("amount2");
        amount2.value = rateValue2*quanValue2;
      
    } 

    //function for discount
    function disValueKeyPress2()
    {

        var rate2 = document.getElementById("rate2");
        var rateValue2 = rate2.value;

        var quan2 = document.getElementById("quan2");
        var quanValue2 = quan2.value;

        var dis2 = document.getElementById("dis2");
        var disValue2 = dis2.value;

      
        var amount2 = document.getElementById("amount2");
        amount2.value = rateValue2*quanValue2-((rateValue2*quanValue2)*(disValue2/100));
        
    }


    //function for gst
    function gstValueKeyPress2()
    {

        var rate2 = document.getElementById("rate2");
        var rateValue2 = rate2.value;

        var quan2 = document.getElementById("quan2");
        var quanValue2 = quan2.value;

        var dis2 = document.getElementById("dis2");
        var disValue2 = dis2.value;

        var gst2 = document.getElementById("gst2");
        var gstValue2 = gst2.value;


        var amount2 = document.getElementById("amount2");
        amount2.value = (rateValue2*quanValue2-((rateValue2*quanValue2)*(disValue2/100)))+((rateValue2*quanValue2)*(gstValue2/100));
      
    } 
     function quanValueKeyPress3()
    {

        var rate = document.getElementById("rate3");
        var rateValue = rate.value;

        var quan = document.getElementById("quan3");
        var quanValue = quan.value;

        var amount = document.getElementById("amount3");
        amount.value = rateValue*quanValue;
      
    } 

    //function for discount
    function disValueKeyPress3()
    {

        var rate = document.getElementById("rate3");
        var rateValue = rate.value;

        var quan = document.getElementById("quan3");
        var quanValue = quan.value;

        var dis = document.getElementById("dis3");
        var disValue = dis.value;

      
        var amount = document.getElementById("amount3");
        amount.value = rateValue*quanValue-((rateValue*quanValue)*(disValue/100));

        
    }


    //function for gst
    function gstValueKeyPress3()
    {

        var rate = document.getElementById("rate3");
        var rateValue = rate.value;

        var quan = document.getElementById("quan3");
        var quanValue = quan.value;

        var dis = document.getElementById("dis3");
        var disValue = dis.value;

        var gst = document.getElementById("gst3");
        var gstValue = gst.value;


        var amount = document.getElementById("amount3");
        amount.value = (rateValue*quanValue-((rateValue*quanValue)*(disValue/100)))+((rateValue*quanValue)*(gstValue/100));
      
    }  



     //function for quantity
    function quanValueKeyPress4()
    {

        var rate = document.getElementById("rate4");
        var rateValue = rate.value;

        var quan = document.getElementById("quan4");
        var quanValue = quan.value;

        var amount = document.getElementById("amount4");
        amount.value = rateValue*quanValue;
      
    } 

    //function for discount
    function disValueKeyPress4()
    {

        var rate = document.getElementById("rate4");
        var rateValue = rate.value;

        var quan = document.getElementById("quan4");
        var quanValue = quan.value;

        var dis = document.getElementById("dis4");
        var disValue = dis.value;

      
        var amount = document.getElementById("amount4");
        amount.value = rateValue*quanValue-((rateValue*quanValue)*(disValue/100));
        
    }


    //function for gst
    function gstValueKeyPress4()
    {

        var rate = document.getElementById("rate4");
        var rateValue = rate.value;

        var quan = document.getElementById("quan4");
        var quanValue = quan.value;

        var dis = document.getElementById("dis4");
        var disValue = dis.value;

        var gst = document.getElementById("gst4");
        var gstValue = gst.value;


        var amount = document.getElementById("amount4");
        amount.value = (rateValue*quanValue-((rateValue*quanValue)*(disValue/100)))+((rateValue*quanValue)*(gstValue/100));
      
    }  



 
   $("#final_Sumbit").click(function(e) {
  e.preventDefault();
    var product_id = $("#id"+$counter).val(); 
    var brand = $("#com"+$counter).val();
    var model = $("#mod"+$counter).val(); 
    var rate = $("#rate"+$counter).val();
    var quantity = $("#quan"+$counter).val(); 
    var discount = $("#dis"+$counter).val();
    var gst = $("#gst"+$counter).val(); 
    var amount = $("#amount"+$counter).val();
    var dataString = 'product_id='+product_id+'&brand='+brand+'&model='+model+'&rate='+rate+'&quantity='+quantity+'&discount='+discount+'&gst='+gst+'&amount='+amount;
    $.ajax({
      type:'POST',
      data:dataString,
      url:'insert.php',
      success:function(data) {
        alert("Data succesfully submitted");
         // window.location.reload();
      }
    });
  });
  </script>

</html>


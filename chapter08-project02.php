<?php
   include 'art-data.php';
   $subTotal = 0;

   function specials()
   {
   // loop thru specials
      for ($i = 1; $i <= 5; $i++)
      {
         echo '<li><a href="#">Special ' . $i . '</a></li>';
      }
   }

   function SubTotal($amount)
   {
      // calculate subtotal
      global $subTotal;
      $subTotal += $amount;
      return $subTotal;
   }

   function Tax ($subTotal)
   {
      // calculate tax
      global $subTotal;
      return $subTotal * .1;
   }
   
   function Shipping ($subTotal)
   {
      // calculate shipping
      $shipping = 100;
      if ($subTotal > 2000)
      {
         $shipping = 0;
      }
      return $shipping;
   }

   function outputSums ($class, $text, $amount)
   {
      // display subtotal, tax, shipping, and grand total
      printf ('<tr class="%s">', $class);
      printf ('   <td colspan="4" class="moveRight"> %s</td>', $text);
      printf ('   <td colspan="4" class="moveRight"> $%10.2f</td>', $amount); // added move right as all #'s are right justified
      printf ('</tr>');
   }
   
   function outPutCartRow ($file, $product, $quantity, $price)
   {
      // write table rows with variables
      // calculate the amount column of quantity times price each
      $amount = $quantity * $price;
      // the actual table row
      echo '<tr>';
      printf ('   <td><img class="img-thumbnail" src="images/art/tiny/%s" alt="..."></td>', $file);
      printf ('   <td>%s</td>', $product);
      printf ('   <td class="moveRight"> %d</td>', $quantity);     // added move right as all #'s are right justified
      printf ('   <td class="moveRight"> $%10.2f</td>', $price);   // added move right as all #'s are right justified
      printf ('   <td class="moveRight"> $%10.2f</td>', $amount);  // added move right as all #'s are right justified
      echo '</tr>';

      // update the subtotal with each added row
      $subTotal = SubTotal ($amount);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chapter 8 P2</title>

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="chapter08-project02.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_defaultTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_defaultTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>
   
<? include 'art-header.inc.php' ?>

<div class="container">

      <div class="page-header">
         <h2>View Cart</h2>
      </div>
         
      <table class="table table-condensed">
         <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
         </tr>

<?
         // go print each row
         outPutCartRow($file1, $product1, $quantity1, $price1);
         outPutCartRow($file2, $product2, $quantity2, $price2);

         // go print each agrigate row
         outputSums ("success strong", "Subtotal", $subTotal);
         outputSums ("active strong", "Tax", Tax ($subTotal));
         outputSums ("strong", "Shipping", Shipping($subTotal));
         outputSums ("warning strong text-danger", "Grand Total", $subTotal + $tax + $shipping);
?>

         <tr >
            <td colspan="4" class="moveRight"><button type="button" class="btn btn-primary" >Continue Shopping</button></td>
            <td><button type="button" class="btn btn-success" >Checkout</button></td>
         </tr>
      </table>         

</div>  <!-- end container -->

<? include 'art-footer.inc.php' ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
    <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>    
  </body>
</html>

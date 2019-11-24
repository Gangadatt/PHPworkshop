<?php
     // check to see if the empty cart form was submitted
     if (isset($_POST['empty'])) {
          // to empty cart set the cart cookie to false and the expiration to a time in the past
          setcookie('cart',false,time()-1000);
          // transfer to the cart page (this page) to trigger the cookie reset (note that you can't change a cookie and immediately see the results until the page is reloaded
          header("location: comp41cart.php");
          exit();
     }
     include 'functions.php';
    writeHead("Desired Comp4.1: Cookie Shopping Cart");
    // check to see if the cart cookie exists, if not, display the empty cart message
    if (!isset($_COOKIE['cart'])) {
          echo "<h3>Your Shopping Cart is empty</h3>";
     } else {
?>
        <div>
            <table>
                <tr><th>Track ID</th><th>Name</th><th>Unit Price</th><th>Quantity</th><th>Total</th></tr>
            <?php
                // connect to the database
               $conn = mysqli_connect("localhost","root", "",'chinook');
                // get the cart cookie to know how many items have been added to cart
               $itemcount = $_COOKIE['cart'];
               // initialize a cart total, cartqty and counter before the loop
               $cartTotal = 0;
               $cartqty = 0;
               $ctr = 1;
                // loop through cart cookies 
                while ($ctr <=$itemcount) {
                    // get track and quantity for each cookie using the ctr to identify which cookie to get
                    $track = $_COOKIE['item'.$ctr];
                    $qty = $_COOKIE['qty'.$ctr];
                // create the query to get the name and price from the Track table in the database
                    $query = "Select Name, UnitPrice from Track where TrackId = $track";
                // run the query
                    $result = mysqli_query($conn,$query);
                // check for errors
                   if (!$result) {
                    die(mysqli_error($conn));
                   }
               // get results and display
                   $row = mysqli_fetch_assoc($result);
                   echo "<tr><td>$track</td>";
                   echo "<td>".$row['Name']."</td>";
                   echo "<td>".$row['UnitPrice']."</td>";
                   echo "<td>$qty</td>";
                // calculate the total by multiplying the price times the quantity
                   $total = $qty * $row['UnitPrice'];
                // add the total and quantity to the cart totals
                   $cartTotal += $total;
                   $cartqty += $qty;
                // display the line total in the table
                   echo "<td align='right'>$total</td></tr>";
                // increment the counter
                   $ctr++;
                } // end while
              //write out the totals for the cart
               echo "<tr><td></td><td><b>Cart Total</b></td>";
               echo "<td></td><td><b>$cartqty</b></td><td align='right'><b>$ $cartTotal</b></td></tr>";
          } // end if
         ?>
            </table>
            <p><form action="comp41cart.php" method="post"><input type="submit" value="Empty Cart" name="empty"></form></p>
            <p><a href="labcomp4-1.php">Go to Order Form</a></p>
        </div>
        <?php 
                writeFoot();
        ?>


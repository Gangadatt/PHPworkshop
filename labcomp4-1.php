<?php

 
// buffer the output
     ob_start();
 include 'functions.php';
     // check to see if the form has been submitted
	
    if (isset($_POST['submit'])) {
        // Get the values from the form. 
        //If a valid quantity was not entered, default to 1
        if (!is_numeric($_POST['qty'])) {
             $qty = 1;
        } else {
             $qty = $_POST['qty'];
        } 
        $track = $_POST['track'];
        // check to see if the cart cookie exists
        if (isset($_COOKIE['cart'])) {
            // if cart cookie is found, add 1 to the cart value to get the number of items. Otherwise set items to 1
            $items = $_COOKIE['cart']+1;
        } else {
            $items = 1;
        }

        // create 3 cookies: cart, itemx and qtyx where x is the item number. Seet to expire in 48 hours
        setCookie('cart',$items,time()+(60*60*48));
        setCookie('item'.$items,$track,time()+(60*60*48));
        setCookie('qty'.$items,$qty,time()+(60*60*48));
     } //end if for form submission
 
    writeHead("Desired Comp4.1: Cookie Shopping Cart");
   ?>

        <div>
            <table>
                <tr><th>Track ID</th><th>Name</th><th>Unit Price</th><th> </th></tr>
            <?php
                // connect to the database
                $conn = mysqli_connect("localhost","root","",'chinook');
                // create the query
                $query = "Select Name, GenreId,  Composer, UnitPrice from Track limit 20";
                // run the query
                $result = mysqli_query($conn,$query);
                // check for errors
                if (!$result) {
                    die(mysqli_error($conn));
                }
                // check for results
                if (mysqli_num_rows($result)> 0) {
                    // loop through results and display
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>".$row['Name']."</td>";
                        echo "<td>".$row['GenreId']."</td>";
                        echo "<td>".$row['Composer']."</td>";
                  // add form for add to cart with a quantity input textbox, the trackid in a hidden field and a submit button
           ?>
               <td>
                    <form method='post' action='labcomp4-1.php'>
                       <label>Qty: <input type='text' name='qty' size='2'></label>
                       <input type='hidden' name='track' value="<?php echo $row['GenreId']; ?>">
                       <input type='submit' name='submit' value='Add to cart'>
                    </form></td></tr>

           <?php
                    } // end while loop
             } // end if


            ?>
            </table>
            <p><a href="comp41cart.php">View Shopping Cart</a></p>
        </div>
        <?php writeFoot(); ?>
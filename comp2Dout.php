<?php

 echo "<pre>";
 print_r($_GET);
 echo "</pre>";
    require_once 'functions.php';
    writeHead("Required Compitency 2A");
    ?>
                <p>
                    <?php
                        echo $_GET['AlbumnID']. " ".$_GET['AlbumnName']." by ".$_GET['ArtistName']." added on".date('l F d Y h:ia');
                    ?>
                </p>
                 <p><img src="<?php echo 'images/'.$_GET['file']; ?>" alt="profile picture"></p>
            </div>

            <?php writeFoot(); ?>
       
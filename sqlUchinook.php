<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Playlists</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>Playlists</h1>
        </header>
        <div>
            <table>
                <tr><th>ID</th><th>Name</th></tr>
            <?php
                // connect to the database
                $conn = mysqli_connect("localhost", "root", "",'chinook');
                // create the query
                $query = "Select * from playlist";
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
                        echo "<tr><td>".$row['PlaylistId']."</td><td>".$row['Name']."</td></tr>";
                    }
                }
            ?>
            </table>
        </div>
        <footer><p>Sample PHP MySQL Query Display</p></footer>
    </body>
</html>
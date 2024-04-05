<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}

?>
<?php

// Define the function to fetch videos by categories
function fetch_videos_by_categories($category_name) {
    // You need to implement the logic to fetch videos based on the category
    // For example, you can query the database to retrieve videos belonging to the specified category
    // and then display them on the page
    // Here's a placeholder implementation assuming you have a database connection available:
    
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "funolympic");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Prepare and execute SQL query
    $query = "SELECT * FROM videos WHERE category = '$category_name'";
    $result = mysqli_query($connection, $query);
    
    // Display the fetched videos
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each video using HTML or any desired format
        echo "<div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
    }
    
    // Close the database connection
    mysqli_close($connection);
}
?>

<title>HomePage: Enjoy every sports</title>
<?php include "header.php"?>
<div class="row justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>
        <?php
        if (!empty($category_name)){
            echo $category_name;
        }
        else{
            if(isset($_GET['live'])){
                echo "Live Videos";   
            }
            else{
                echo "Highlights";
            }
        }
        ?>
    </h2>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <form action="search.php" method="post">
        <div class="input-group">
            <input type="search" required name="search" id="" class="form-control" placeholder="Search" autocomplete="on">
            <button type="submit" name="btn-search" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
    </div>
</div>
<div class="row" style="padding:20px 50px">
    <?php
    // Assuming fetch_live_videos(), fetch_highlights(), and fetch_videos_by_categories() are defined somewhere in your code.
    if(empty($category_name)){
        if(isset($_GET['live'])){
            // Call the function to fetch live videos
            fetch_live_videos();
        }
        else{
            // Call the function to fetch highlights
            fetch_highlights();
        }
        
    }
    else{
        // Call the function to fetch videos by category
        fetch_videos_by_categories($category_name);
    }
    ?>
</div>
<?php include "footer.php"?>

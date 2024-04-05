<?php include "header.php" ?>

<div class="row" style="margin:80px 0">
    <div class="container">
        <?php
        
    // Establish a database connection
    $connection = mysqli_connect("localhost", "root", "", "funolympic");

    // Check if connection is successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
                        $query = "SELECT * FROM users WHERE username='$username'";
                        $select_user = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_user)) {
                            $username    = $row['username'];
                            $fullname    = $row['fullname'];
                            $email     = $row['email']; 
                            $phone     = $row['phone']; 
                            $nationality     = $row['nationality'];
                            $profile_image     = $row['profile_image'];
                        ?> }
        <div class="row" style="padding:10px 0">
            <div class="col-md-4">
                <div class="profile-img" style="">
                    <img src="images/<?php echo $profile_image ?>" alt="" width=200
                        style="border-radius:10%; border:2px grey solid; padding:2px">
                </div>
            </div>
            <div class="row" style="color: black;">
            <div class="col-md-8">
                <div class="row">
                    <h4><?php echo $fullname ?></h4>
                </div>
                <hr>
                <div class="row" style="color: black;"> <!-- Change font color to black -->
                    <div class="col-4">
                        <div class="row"><?php echo $username ?></div>
                        <div class="row"><?php echo $email ?></div>
                        <div class="row"><?php echo $phone ?></div>
                        <div class="row"><?php echo $nationality ?></div>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <a href="changepsw.php">Change Password</a>
                <hr>
                <br>
                <a href="" class="btn btn-danger">Deactivate</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>

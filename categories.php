<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://static8.depositphotos.com/1006472/1055/i/450/depositphotos_10558219-stock-photo-olympic-games.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ea540a;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(25px); /* Adjust the blur intensity as needed */
        }
        .jumbotron {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for the jumbotron */
            padding: 60px 0;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5); /* Soft shadow effect */
        }
        .word-link {
            color: black;
            text-decoration: none;
            font-size: 20px; /* Set font size */
            text-align: center; /* Center align */
            display: block;
            transition: transform 0.3s ease; /* Smooth transition for zoom effect */
        }
        .word-link:hover {
            transform: scale(1.1); /* Zoom effect on hover */
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="row jumbotron justify-content-center" style="margin-top: 80px;">
        <h2>Categories</h2>
    </div>
    <div class="Words">
        <div class="row" style="padding: 75px 0;">
            <?php
            $words = array("Basketball", "Football", "Ice Skating", "Skiing", "Bobsleigh", "Ice Hockey");
            foreach($words as $word) { ?>
                <div class="col-md-2" style="padding: 20px 10px;">
                    <a href="#" class="word-link"><?php echo $word ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>


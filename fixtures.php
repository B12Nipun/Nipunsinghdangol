<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures</title>
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
            backdrop-filter: blur(25px);
        }
        .jumbotron {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for the jumbotron */
            padding: 40px 0;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5); /* Soft shadow effect */
        }
        .card:hover {
            box-shadow: 0.75em 0.75em 1em rgba(186, 185, 185, 0.5); /* Shadow effect on hover */
        }
        .dropdown-menu {
            left: 50% !important; /* Adjusting dropdown to center */
            transform: translateX(-50%); /* Centering the dropdown */
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>

    <div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
        <h2>Fixtures</h2>
    </div>

    <?php include "category_filter.php" ?>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <hr>
                    <thead>
                        <tr>
                            <th>Fixture</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Countries</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM fixtures";
                        $select_fixtures = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_fixtures)) {
                            $fixture_title = $row['fixture_title'];
                            $fixture_date = $row['fixture_date'];
                            $fixture_time = $row['fixture_time'];
                            $fixture_category = $row['fixture_category'];
                            $fixture_countries = $row['fixture_countries'];
                            echo "<tr>
                                    <td>$fixture_title</td>
                                    <td>$fixture_date</td>
                                    <td>$fixture_time</td>
                                    <td>$fixture_category</td>
                                    <td>$fixture_countries</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>
</html>

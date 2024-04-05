<?php
include "header.php";

// Text to display
$textToShow = "Welcome to Fun Olympic News Gallery"; // You can change this text as needed

// List of photos with their descriptions
$photos = [
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/rxcti4jupi0sa0pqludt", "description" => "Nikhat Zareen, Lovlina Borgohain set to train abroad ahead of Paris 2024 Olympics"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w1460/f_auto/primary/vvwjih2e8fh1ia48zpll", "description" => "IWF World Cup 2024: Bindyarani Devi wins bronze medal"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w1460/f_auto/primary/rxb1p0zge3wy8n5zcvlv", "description" => "Wrestling Championships 2024 to focus on Paris Olympics"],
    // Additional images
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/i4xkfmldthbcwe5ylbcz", "description" => "MIRABAI CHANU MEETS FINAL CRITERIA FOR PARIS 2024 OLYMPICS QUALIFICATION AT IWF WORLD CUP"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/z0yoqvbxytn3y3nyotrg", "description" => "Alasan Ann: From gunshot survivor to earning a historic Olympic taekwondo spot for The Gambia"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/blmhdn3fcdqu1wrlrvw2", "description" => "IPL Orange Cap winners: Sachin Tendulkar, Virat Kohli, David Warner feature in star-studded list"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/imbff28xkr2brkjtuwpm", "description" => "JAPAN SWIMMING LEGEND AND FOUR-TIME OLYMPIAN IRIE RYOSUKE RETIRES"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/wsm1burb9kcewuuxlxec", "description" => "USA GYMNASTICS NAMES WOMEN'S TEAMS FOR JESOLO TROPHY, PACIFIC RIM CHAMPIONSHIPS"],
    ["url" => "https://img.olympics.com/images/image/private/t_s_16_9_g_auto/t_s_w960/f_auto/primary/qi9ltnujbraolveo0vbg", "description" => "Jessica Gadirova admits to tough and long journey ahead after suffering full ACL tear at World Championships"]
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Text and Photo Display</title>
    <style>
        /* CSS for grid layout */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(250px, 1fr));
            grid-gap: 10px;
            justify-items: center;
            align-items: start;
        }
        .photo-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .photo-container img {
            display: block;
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        .photo-container:hover img {
            transform: scale(1.1);
        }
        .photo-description {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            text-align: center;
            font-size: 14px;
        }
        .countdown-timer {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2><?php echo $textToShow; ?></h2>

<div class="countdown-timer" id="countdown"></div> <!-- Countdown Timer -->

<div class="photo-grid">
    <?php
    // Display photos with descriptions
    foreach ($photos as $photo) {
        echo '<div class="photo-container">';
        echo '<img src="' . $photo["url"] . '" alt="Photo">';
        echo '<p class="photo-description">' . $photo["description"] . '</p>';
        echo '</div>';
    }
    ?>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date();
    countDownDate.setDate(countDownDate.getDate() + 114); // Adding 114 days

    // Update the countdown every 1 second
    var x = setInterval(function() {
        // Get the current date and time
        var now = new Date().getTime();

        // Find the distance between now and the countdown date
        var distance = countDownDate.getTime() - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown").innerHTML = "Countdown to next Olympic: " + days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the countdown is finished, display a message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

</body>
</html>

<?php include "footer.php"; ?>

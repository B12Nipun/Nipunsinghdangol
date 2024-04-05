<?php 
  $videoURL1 = "https://www.youtube.com/watch?v=YQoTamp5m_w";
  $convertedURL1 = str_replace("watch?v=","embed/", $videoURL1);

  // Adding another video link
  $videoURL2 = "https://www.youtube.com/watch?v=eOFiUF0B9y4"; // Replace with your second video URL
  $convertedURL2 = str_replace("watch?v=","embed/", $videoURL2);

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <br><br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?php echo $convertedURL1; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
           <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?php echo $convertedURL2; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
          </div>
        </div>
      </div>    
    </section>
  </body>
</html>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/styles.css">

  <!-- Videojs -->
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>


  <title>Pablo Aritz Bideo streaming plataforma</title>
</head>

<body class="back">
  <?php
  $URL = "VoDPlayer.php?name=";
  $path = "../resources/VoD/";
  if ($_GET['name']) {
    $name = $_GET['name'];
    $video_path = $path . $name . ".mp4";
  }
  $player = '2';
  if ($_GET['type']) {
    $player = $_GET['type'];
  }
  ?>

  <div class="container">
    <div class="row text-center align-items-center">
      <div class="col">
        <h3><?php echo $name ?></h3>
      </div>
    </div>
    <div class="row text-center align-items-center">
      <div class="col">
        <?php if ($player == '1') : ?>
          <h5> HTML5 player erabiliz</h5>
      </div>
    </div>
    <div class="row text-center align-items-center">
      <div class="col">
        <video width="80%" height="auto" controls>
          <source src=<?php echo json_encode($video_path) ?> type="video/mp4">
        </video>
        <div class="row text-center align-items-center">
          <div class="col">
            <?php $URL .= $name . '&type=2' ?>
            <a href=<?php echo $URL ?> class="btn btn-primary">Ikusi - VideoJS</a>
          </div>
        </div>

      <?php endif ?>
      <?php if ($player == '2') : ?>
        <h5> VideoJS player erabiliz</h5>
      </div>
    </div>
    <div class="row text-center align-items-center">
      <div class="col">
        <video id="my-video" class="video-js" controls preload="auto" width="80%" height="80%" data-setup='{"fluid": true}'>
          <source src=<?php echo json_encode($video_path) ?> type="video/mp4">
        </video>
        <?php $URL .= $name . "&type=1" ?>
        <div class="row text-center align-items-center">
          <div class="col">
            <p></p>
            <a href=<?php echo $URL ?> class="btn btn-primary">Ikusi - HTML</a>
          </div>
        </div>
      <?php endif ?>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
</body>

</html>
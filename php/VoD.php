<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
crossorigin="anonymous">
<link rel="stylesheet" href="../styles/styles.css">

<!-- Scripts -->
<script src="../js/functions.js"></script>


<title>Pablo Aritz Bideo streaming plataforma</title>
</head>
<body class="back">
<div class='container'>
<h1>Video On Demand edukien zerrenda</h1>
<?php
$path='../resources/';
$i=0;
$files = glob('../resources/*.{mp4}', GLOB_BRACE);
echo '<div class=row>';
foreach($files as $file) {
    $i++;
    $video = substr($file, 13,-4);
    ?>
    <script>getVideoCover(<?php echo json_encode($file)?>, 0, <?php echo $i?> );</script>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow text-center align-items-center"  onClick=onClick(<?php echo json_encode($video)?>)>
              <p>

              </p>
                <img id=<?php echo $i?> class="img-thumbnail"></img>
                <div class="card-body">
                    <p class="card-text"><?php echo $video?></p>
                </div>
              </div>
            </div>

    <?php
    if ($i % 3 == 0) {echo '</div><div class="row">';}
    ?>
    <?php
}
?>

</div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
</body>


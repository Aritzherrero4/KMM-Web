<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <script type="text/javascript">
function onClick(file){
	window.location.href="VoDPlayer.php?name="+file;


}
function getVideoCover(file, seekTo = 0.0, id = 0) {
    console.log("getting video cover for file: ", file);
        // load the file to a video player
        const videoPlayer = document.createElement('video');
        videoPlayer.setAttribute('src', file);
        videoPlayer.load();
        videoPlayer.addEventListener('error', (ex) => {
            reject("error when loading video file", ex);
        });
        
        // load metadata of the video to get video duration and dimensions
        videoPlayer.addEventListener('loadedmetadata', () => {
            // seek to user defined timestamp (in seconds) if possible
            if (videoPlayer.duration < seekTo) {
                reject("video is too short.");
                return;
            }
             videoPlayer.currentTime = seekTo;
            // extract video thumbnail once seeking is complete
            videoPlayer.addEventListener('seeked', () => {
                console.log('video is now paused at %ss.', seekTo);
                // define a canvas to have the same dimension as the video
                const canvas = document.createElement("canvas");
                canvas.width = videoPlayer.videoWidth;
                canvas.height = videoPlayer.videoHeight;
                // draw the video frame to canvas
                const ctx = canvas.getContext("2d");
                ctx.drawImage(videoPlayer, 0, 0, canvas.width, canvas.height);
                // return the canvas image as a blob
		var dataURI = canvas.toDataURL('image/jpeg'); // can also use 'image/png'
		var x = document.getElementById(id);
		x.setAttribute("src", dataURI);
		x.setAttribute("width", "304");
		x.setAttribute("height", "228");

		return dataURI;

            });
        });
}
  </script>
  
  
  
  
  
  
    <h1>Hello, world!</h1>
    <div class='container'>

<?php
$path='../resources/';
$i=0;
$files = glob('../resources/*.{mp4}', GLOB_BRACE);
echo '<div class=row>';
foreach($files as $file) {
$i++;
?>
<div class='col-md'>
<div class='card'>
<?php $video = substr($file, 13,-4);?>

<img id=<?php echo $i?> onClick=onClick(<?php echo json_encode($video)?>)></img>
  		<script>getVideoCover(<?php echo json_encode($file)?>, 0, <?php echo $i?> );</script>
<?php
if ($i % 3 == 0) {echo '</div><div class="row">';}
?>
</div>
</div>
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


function onClick(file, type) {
    window.location.href = "VoDPlayer.php?name=" + file + "&type=" + type;
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

function dashVideo(URL) {
    const url = URL;
    var videoElement = document.querySelector(".videoContainer video");

    var player = dashjs.MediaPlayer().create();
    player.initialize(videoElement, url, true);
    var controlbar = new ControlBar(player);
    controlbar.initialize();
}
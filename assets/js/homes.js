//video promocional
const video_button = document.getElementById('video_button');
const video = document.getElementById('videoHome');

let segundo;
video.addEventListener('timeupdate', function(){
    segundo = video.currentTime.toFixed(0);
    video_button.style.display = segundo > 35 && segundo < 40  ? "block" : "none";
});
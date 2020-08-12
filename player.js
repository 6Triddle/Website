var songs = [];
var songPlay = [];

var songTitleList = [];
var nextSongTitleList = [];

var songTitle = document.getElementById('songTitle');
var songSlider = document.getElementById('songSlider');
var currentTime = document.getElementById('currentTime');
var duration = document.getElementById('duration');
var volumeSlider = document.getElementById('volumeSlider');
var nextSongTitle = document.getElementById('nextSongTitle');

var song = new Audio();
var currentSong = 0;

window.onload = loadSong;

function loadSong () {
	song.src = "Music/" + songs[currentSong];
	songTitle.textContent = (currentSong + 1) + ". " + songTitleList[currentSong];
	nextSongTitle.innerHTML = "<b>Next Song: </b>" + songTitleList[currentSong + 1 % songs.length];
	song.playbackRate = 1;
	song.volume = volumeSlider.value;
	song.play();
	setTimeout(showDuration, 1000);
}

setInterval(updateSongSlider, 1000);

function updateSongSlider () {
	var c = Math.round(song.currentTime);
	songSlider.value = c;
	currentTime.textContent = convertTime(c);
	if(song.ended){
		next();
	}
}

function convertTime (secs) {
	var min = Math.floor(secs/60);
	var sec = secs % 60;
	min = (min < 10) ? "0" + min : min;
	sec = (sec < 10) ? "0" + sec : sec;
	return (min + ":" + sec);
}

function showDuration () {
	var d = Math.floor(song.duration);
	songSlider.setAttribute("max", d);
	duration.textContent = convertTime(d);
}

function playOrPauseSong (img) {
	song.playbackRate = 1;
	if(song.paused){
		song.play();
		img.src = "images/pause.png";
	}else{
		song.pause();
		img.src = "images/play.png";
	}
}

function playSong (img) {
	song.src = "Music/" + songs[songPlay];
	songTitle.textContent = (songPlay + 1) + ". " + songTitleList[songPlay];
	nextSongTitle.innerHTML = "<b>Next Song: </b>" + songTitleList[songPlay + 1 % songs.length];
	song.playbackRate = 1;
	song.volume = volumeSlider.value;
	if(song.paused){
		song.play();
		img.src = "images/pause.png";
	}else{
		song.pause();
		img.src = "images/play.png";
	}
}


function next(){
	currentSong++;
    currentSong = (currentSong > 49) ? songs.length - 50 : currentSong;
    loadSong();
}

function previous() {
	currentSong--;
	currentSong = (currentSong < 0) ? songs.length - 1 : currentSong;
	loadSong();
}

function seekSong() {
	song.currentTime = songSlider.value;
	currentTime.textContent = convertTime(song.currentTime);
}

function adjustVolume() {
	song.volume = volumeSlider.value;
}

function increasePlaybackRate() {
	song.playbackRate += 0.5;
}

function decreasePlaybackRate() {
	song.playbackRate -= 0.5;
}


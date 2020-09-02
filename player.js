songID = 0

var songs = [];

var songTitleList = [];
var nextSongTitleList = [];
var songIDList = [];

var songTitle = document.getElementById('songTitle');
var songSlider = document.getElementById('songSlider');
var currentTime = document.getElementById('currentTime');
var duration = document.getElementById('duration');
var volumeSlider = document.getElementById('volumeSlider');
var nextSongTitle = document.getElementById('nextSongTitle');
var mainPlayOrPause = document.getElementById('mainPlayOrPause');
var prevID = 0;
var mainImg = 0;
var prevImg = 0;

var song = new Audio();
var currentSong = 0;

function loadSong () {
	song.src = "Music/" + songs[currentSong];
	songTitle.textContent = (currentSong + 1) + ". " + songTitleList[currentSong];
	song.playbackRate = 1;
	song.volume = volumeSlider.value;
	setTimeout(showDuration, 1000);
}

setInterval(updateSongSlider, 1000);

function updateSongSlider () {
	var c = Math.round(song.currentTime);
	songSlider.value = c;
	currentTime.textContent = convertTime(c);
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

function playOrPauseSong () {
	song.playbackRate = 1;
	if(song.paused){
		song.play();
		mainPlayOrPause.src = "images/mainPause.png";
		prevImg.src = "images/pause.png";
	}else{
		song.pause();
		mainPlayOrPause.src = "images/mainPlay.png";
		prevImg.src = "images/play.png";
		
	}
}

function playSong (img, song_ID) { 
	if (song_ID == prevID) { 
		if(song.paused){
			song.play();
			mainPlayOrPause.src = "images/MainPause.png";
			img.src = "images/pause.png";
		}else{
			song.pause();
			mainPlayOrPause.src = "images/MainPlay.png";
			img.src = "images/play.png";
			
		}
	}
	else {
		prevImg.src = "images/play.png";
		prevImg = img;
		img.src = "images/pause.png";
		mainPlayOrPause.src = "images/mainPause.png";
		prevID = song_ID;
		song_ID -= 1;
		song.src = "Music/" + songs[song_ID];
		songTitle.textContent = (song_ID + 1) + ". " + songTitleList[song_ID];
		song.playbackRate = 1;
		song.volume = volumeSlider.value;
		setTimeout(showDuration, 500);
		song.play();
	}

}


function next(){
	currentSong++;
	currentSong = (currentSong > 49) ? songs.length - 50 : currentSong;
	mainPlayOrPause.src = "images/mainPause.png";
	prevImg.src = "images/pause.png";
	loadSong();
	song.play();
}

function previous() {
	currentSong--;
	currentSong = (currentSong < 0) ? songs.length - 1 : currentSong;
	mainPlayOrPause.src = "images/mainPause.png";
	prevImg.src = "images/pause.png";
	loadSong();
	song.play();
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


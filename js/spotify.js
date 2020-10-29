function reload(trackid) {
    document.getElementById("iframe").src = `https://open.spotify.com/embed/track/${trackid}`;
} btn.onclick = reload;

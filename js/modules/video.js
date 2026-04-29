export function initVideoPlayer() {
    const player        = document.querySelector('#customPlayer');

    if (!player) {
        return;
    }

    const video         = document.querySelector('#hero-video');
    const overlay       = document.querySelector('#playerOverlay');
    const playLarge     = document.querySelector('#playBtnLarge');
    const playPause     = document.querySelector('#playPauseBtn');
    const muteBtn       = document.querySelector('#muteBtn');
    const volSlider     = document.querySelector('#volumeSlider');
    const fsBtn         = document.querySelector('#fullscreenBtn');
    const fill          = document.querySelector('#progressFill');
    const thumb         = document.querySelector('#progressThumb');
    const progBar       = document.querySelector('#progressBar');
    const currentTimeEl = document.querySelector('#currentTime');
    const durationEl    = document.querySelector('#duration');

    const iconPlay   = playPause.querySelector('.icon-play');
    const iconPause  = playPause.querySelector('.icon-pause');
    const iconVol    = muteBtn.querySelector('.icon-vol');
    const iconMute   = muteBtn.querySelector('.icon-mute');
    const iconFs     = fsBtn.querySelector('.icon-fs');
    const iconExitFs = fsBtn.querySelector('.icon-exit-fs');

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds - mins * 60).toString().padStart(2, '0');
        return mins + ':' + secs;
    }

    function togglePlay() {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
    }

    function handleLargePlay() {
        video.play();
        overlay.classList.add('hidden');
    }

    function handlePlayerClick(e) {
        if (e.target.closest('.player-controls') || e.target.closest('.player-overlay')) {
            return;
        }
        togglePlay();
    }

    function handleVideoPlay() {
        iconPlay.style.display = 'none';
        iconPause.style.display = '';
        player.classList.remove('paused');
    }

    function handleVideoPause() {
        iconPlay.style.display = '';
        iconPause.style.display = 'none';
        player.classList.add('paused');
    }

    function handleTimeUpdate() {
        if (!video.duration) {
            return;
        }
        const pct = (video.currentTime / video.duration) * 100;
        fill.style.width = pct + '%';
        thumb.style.left = pct + '%';
        currentTimeEl.textContent = formatTime(video.currentTime);
    }

    function handleMetadataLoaded() {
        durationEl.textContent = formatTime(video.duration);
    }

    function handleProgressClick(e) {
        const rect = progBar.getBoundingClientRect();
        const pct = (e.clientX - rect.left) / rect.width;
        video.currentTime = pct * video.duration;
    }

    function handleVolumeChange() {
        video.volume = volSlider.value;
        if (volSlider.value == 0) {
            video.muted = true;
            iconVol.style.display = 'none';
            iconMute.style.display = '';
        } else {
            video.muted = false;
            iconVol.style.display = '';
            iconMute.style.display = 'none';
        }
    }

    function handleMuteToggle() {
        if (video.muted) {
            video.muted = false;
            iconVol.style.display = '';
            iconMute.style.display = 'none';
            volSlider.value = video.volume;
        } else {
            video.muted = true;
            iconVol.style.display = 'none';
            iconMute.style.display = '';
            volSlider.value = 0;
        }
    }

    function handleFullscreen() {
        if (!document.fullscreenElement) {
            player.requestFullscreen();
            iconFs.style.display = 'none';
            iconExitFs.style.display = '';
        } else {
            document.exitFullscreen();
            iconFs.style.display = '';
            iconExitFs.style.display = 'none';
        }
    }

    playLarge.addEventListener('click', handleLargePlay);
    player.addEventListener('click', handlePlayerClick);
    playPause.addEventListener('click', togglePlay);
    video.addEventListener('play', handleVideoPlay);
    video.addEventListener('pause', handleVideoPause);
    video.addEventListener('timeupdate', handleTimeUpdate);
    video.addEventListener('loadedmetadata', handleMetadataLoaded);
    progBar.addEventListener('click', handleProgressClick);
    volSlider.addEventListener('input', handleVolumeChange);
    muteBtn.addEventListener('click', handleMuteToggle);
    fsBtn.addEventListener('click', handleFullscreen);
}
    <!DOCTYPE html>
    <html lang="en">

    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    	<link rel="stylesheet" href="<?=base_url('rofi/')?>style.css">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    	<title>Music Player Platform | AsmrProg</title>


    	<style>
    		/* Body */
    		body {
    			font-family: 'Arial', sans-serif;
    			background-color: #121212;
    			/* Dark background */
    			color: #eaeaea;
    			/* Light text for contrast */
    			margin: 0;
    			padding: 0;
    			display: flex;
    			justify-content: center;
    			align-items: center;
    			height: 100vh;
    		}

    		/* Audio Player Container */
    		.audio-player {
    			background-color: #181818;
    			/* Slightly lighter than body */
    			border-radius: 15px;
    			/* Soft rounded corners */
    			padding: 25px;
    			width: 350px;
    			text-align: center;
    			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    			/* Subtle shadow */
    			transition: transform 0.3s ease, box-shadow 0.3s ease;
    			/* Smooth hover effect */
    		}

    		/* Hover effect for the player container */
    		.audio-player:hover {
    			transform: scale(1.05);
    			/* Slight zoom on hover */
    			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8);
    			/* Larger shadow on hover */
    		}

    		/* Album Cover */
    		.album-cover img {
    			width: 100%;
    			height: auto;
    			border-radius: 10px;
    			transition: transform 0.3s ease-in-out;
    		}

    		/* Hover effect for album cover */
    		.album-cover img:hover {
    			transform: scale(1.1);
    			/* Slight zoom on hover */
    		}

    		/* Music Info */
    		.music-info {
    			margin-top: 20px;
    		}

    		.song-title {
    			font-size: 1.8rem;
    			font-weight: bold;
    			color: #ffffff;
    			/* White for better contrast */
    			margin-bottom: 10px;
    			text-transform: capitalize;
    		}

    		.artist-name {
    			font-size: 1.1rem;
    			color: #b0b0b0;
    			/* Light gray for artist name */
    			font-style: italic;
    		}

    		/* Audio Controls */
    		audio {
    			margin-top: 20px;
    			width: 100%;
    			height: 45px;
    			/* Fixed height for a neat look */
    			border-radius: 8px;
    			background-color: #333333;
    			/* Dark background for the audio controls */
    			outline: none;
    			cursor: pointer;
    			/* Pointer cursor for interaction */
    		}

    		/* Controls Panel */
    		audio::-webkit-media-controls-panel {
    			background-color: #222222;
    			border-radius: 8px;
    		}

    		/* Play Button */
    		audio::-webkit-media-controls-play-button {
    			background-color: #ff5733;
    			/* Bold play button color */
    			border-radius: 50%;
    			transition: background-color 0.3s ease, box-shadow 0.3s ease;
    			box-shadow: 0 0 6px rgba(255, 87, 51, 0.5);
    			/* Soft glowing effect */
    		}

    		audio::-webkit-media-controls-play-button:hover {
    			background-color: #e94e1b;
    			/* Darker shade on hover */
    			box-shadow: 0 0 12px rgba(255, 87, 51, 0.7);
    			/* Intense glowing on hover */
    		}

    		/* Progress Bar */
    		audio::-webkit-media-controls-timeline {
    			background-color: #444444;
    			/* Darker timeline */
    			border-radius: 5px;
    			height: 6px;
    			/* Slimmer progress bar */
    		}

    		/* Progress Bar Active (When dragging) */
    		audio::-webkit-media-controls-timeline:active {
    			background-color: #ff5733;
    			/* Bold active color */
    		}

    		/* Time Display */
    		audio::-webkit-media-controls-current-time-display,
    		audio::-webkit-media-controls-time-remaining-display {
    			color: #ffffff;
    			/* White color for time display */
    			font-size: 0.9rem;
    			/* Smaller time text */
    		}

    		/* Volume Slider */
    		audio::-webkit-media-controls-volume-slider {
    			background: #444444;
    			/* Dark background for the volume slider */
    		}

    		/* Overall Hover Effects */
    		audio:hover {
    			background-color: #3a3a3a;
    			/* Subtle hover effect for controls */
    		}

    		/* Time Display */
    		audio::-webkit-media-controls-time-remaining-display {
    			color: #ffffff;
    			/* Light text color */
    		}

    		/* Add a glowing effect to audio player on hover */
    		.audio-player:hover {
    			box-shadow: 0 15px 30px rgba(255, 87, 51, 0.3);
    			/* Soft glowing effect */
    		}

    	</style>
    </head>

    <body>

    	<div class="container">
    		<aside class="sidebar">
    			<div class="logo">
    				<button class="menu-btn" id="menu-close">
    					<i class='bx bx-log-out-circle'></i>
    				</button>
    				<i class='bx bx-pulse'></i>
    				<a href="#">ApanMusic</a>
    			</div>

    			<div class="menu">
    				<h5>Menu</h5>
    				<ul>
    					<li>
    						<i class='bx bxs-bolt-circle'></i>
    						<a href="<?=base_url('home/explore/')?>">Explore</a>
    					</li>
    					<li>
    						<i class='bi bi-house-door-fill'></i>
    						<a href="<?=base_url('home')?>">
    							Home
    						</a>
    					<li>
    				</ul>
    			</div>

    			<div class="menu">
    				<h5></h5>
    				<ul>
    					<li>
    						<i class></i>
    						<a href="#"></a>
    					</li>
    					<li>
    						<i class></i>
    						<a href="#"></a>
    					</li>
    					<li>
    						<i class></i>
    						<a href="#"></a>
    					</li>
    					<li>
    						<i class></i>
    						<a href="#"></a>
    					</li>

    				</ul>
    			</div>

    		</aside>

    		<main>


    			<div class="audio-player" style="position:relative;top:9rem;left:4rem;">
    				<div class="album-cover">
    					<img src="<?=base_url('upload/konten/' . $konten->foto)?>" alt="Album Cover">
    				</div>
    				<div class="music-info">
    					<h3 class="song-title"><?=$konten->judul?></h3>
    					<p class="artist-name"><?=$konten->keterangan?></p>
    				</div>
    				<audio controls="controls" autoplay="autoplay">
    					<source src="<?=base_url('upload/konten/' .$konten->audio)?>" type="audio/mp3">
    				</audio>
    			</div>

    		</main>

    		<div class="right-section">

    			<div class="profile">
    				<i class='bx bxs-bell'></i>
    				<i class='bx bxs-cog'></i>
    				<div class="user">
					<div class="left">
						<img src="<?=base_url('rofi/')?>assets/profile.png">
					</div><a href="<?= base_url('auth/index')?>">
					<div class="right">
						<h5>Free</h5>
					</div>
                    </a>
				</div>
    			</div>

    		</div>

    	</div>

    	<script src="<?=base_url('rofi/')?>script.js"></script>
    </body>
    <style>
    	/* Global Styles */
    	* {
    		margin: 0;
    		padding: 0;
    		box-sizing: border-box;
    		font-family: 'Arial', sans-serif;
    	}

    	body {
    		background-color: #f8f9fa;
    		color: #333;
    	}

    	/* Container */
    	.container {
    		display: flex;
    		justify-content: space-between;
    		height: 100vh;
    	}

    	/* Sidebar */
    	.sidebar {
    		background-color: #1a1a1d;
    		color: white;
    		width: 250px;
    		padding: 20px;
    		display: flex;
    		flex-direction: column;
    		justify-content: space-between;
    	}

    	.sidebar .logo {
    		display: flex;
    		align-items: center;
    		justify-content: space-between;
    		margin-bottom: 20px;
    	}

    	.sidebar .logo i {
    		font-size: 24px;
    	}

    	.sidebar .menu h5 {
    		margin-top: 20px;
    		color: #ccc;
    	}

    	.sidebar .menu ul {
    		list-style-type: none;
    	}

    	.sidebar .menu ul li {
    		padding: 10px;
    		display: flex;
    		align-items: center;
    		transition: background-color 0.3s;
    	}

    	.sidebar .menu ul li:hover {
    		background-color: #333;
    	}

    	.sidebar .menu ul li a {
    		text-decoration: none;
    		color: white;
    		margin-left: 10px;
    	}

    	.sidebar .playing {
    		margin-top: 30px;
    		text-align: center;
    		color: #ccc;
    	}

    	.sidebar .playing img {
    		width: 70px;
    		height: 70px;
    		object-fit: cover;
    		border-radius: 50%;
    	}

    	/* Music Player Section */
    	.music-player {
    		background-color: #fff;
    		border-radius: 10px;
    		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    		padding: 20px;
    		max-width: 300px;
    		margin: auto;
    		display: flex;
    		flex-direction: column;
    	}

    	.music-player .top-section {
    		display: flex;
    		flex-direction: column;
    		margin-bottom: 20px;
    		align-items: center;
    	}

    	.music-player .top-section .header {
    		font-size: 18px;
    		font-weight: bold;
    		color: #333;
    		margin-bottom: 10px;
    		display: flex;
    		align-items: center;
    		justify-content: space-between;
    	}

    	.music-player .song-info {
    		display: flex;
    		flex-direction: column;
    		align-items: center;
    		margin-bottom: 20px;
    	}

    	.music-player .song-info img {
    		width: 120px;
    		height: 120px;
    		border-radius: 10px;
    		object-fit: cover;
    		margin-bottom: 20px;
    	}

    	.music-player .song-info .description {
    		text-align: center;
    	}

    	.music-player .song-info .description h3 {
    		font-size: 20px;
    		font-weight: bold;
    		margin-bottom: 5px;
    	}

    	.music-player .song-info .description h5 {
    		font-size: 16px;
    		color: #666;
    		margin-bottom: 5px;
    	}

    	.music-player .song-info .description p {
    		font-size: 14px;
    		color: #999;
    	}

    	.music-player .progress {
    		width: 100%;
    		margin-bottom: 20px;
    	}

    	.music-player .progress audio {
    		width: 100%;
    		background-color: #f1f1f1;
    		border-radius: 5px;
    		outline: none;
    	}

    	.music-player .player-actions {
    		display: flex;
    		justify-content: space-between;
    		align-items: center;
    	}

    	.music-player .buttons i {
    		font-size: 24px;
    		color: #333;
    		cursor: pointer;
    		transition: color 0.3s;
    	}

    	.music-player .buttons i:hover {
    		color: #1a73e8;
    	}

    	.music-player .lyrics {
    		display: flex;
    		align-items: center;
    		color: #666;
    		cursor: pointer;
    	}

    	.music-player .lyrics i {
    		font-size: 20px;
    		margin-right: 5px;
    	}

    	.music-player .lyrics h5 {
    		font-size: 16px;
    	}

    	/* Responsive Design */
    	@media (max-width: 768px) {
    		.container {
    			flex-direction: column;
    			height: auto;
    		}

    		.sidebar {
    			width: 100%;
    			padding: 15px;
    		}

    		.music-player {
    			max-width: 100%;
    			margin: 20px 0;
    		}

    		.music-player .top-section .header {
    			font-size: 16px;
    		}
    	}

    </style>

    </html>

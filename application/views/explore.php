
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?=base_url('rofi/')?>style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Music Player Platform | ApanMusic</title>
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

            <div class="menu" style="position:relative;bottom:24rem;">
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
        </aside>

        <main>
            <header>
                <div class="nav-links">
                    <button class="menu-btn" id="menu-open">
                        <i class='bx bx-menu'></i>
                    </button>
                    <a href="<?= base_url('home/all')?>">Music</a>
                </div>

                <div class="search">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Type here to search" id="searchInput">
                </div>
            </header>
            <div class="playlist" style="width:1000px;">
                <div class="genre">

                    <div class="item">
                        <?php 
                        foreach ($konten as $kk) { ?>
                        <div class="item">
                            <a href="<?=base_url('home/detail/' . $kk['slug'])?>">
                                <img src="<?=base_url('upload/konten/' . $kk['foto'])?>" width="100">
                                <p class="item-title"><?=$kk['judul']?></p>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                   
                </div>
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

    <script>
    // Get the input field and the items container
    const searchInput = document.getElementById('searchInput');
    const items = document.querySelectorAll('.item .item-title'); // Select item titles within the container

    // Function to filter the search results
    function searchItems() {
        const query = searchInput.value.toLowerCase(); // Get the input text and convert to lowercase
        let hasResults = false;

        // Loop through all the items
        items.forEach(titleElement => {
            const parentItem = titleElement.closest('.item'); // Get the parent `.item` element

            if (titleElement.textContent.toLowerCase().includes(query)) {
                parentItem.style.display = ''; // Show item if it matches the query
                hasResults = true; // Mark that at least one result exists
            } else {
                parentItem.style.display = 'none'; // Hide item if it doesn't match
            }
        });

        // Handle empty search results
        const noResultsMessage = document.getElementById('no-results-message');
        if (!hasResults) {
            if (!noResultsMessage) {
                const message = document.createElement('p');
                message.id = 'no-results-message';
                message.textContent = 'No items found.';
                message.style.textAlign = 'center';
                message.style.color = '#666';
                document.querySelector('.item').appendChild(message);
            }
        } else if (noResultsMessage) {
            noResultsMessage.remove(); // Remove message if results exist
        }
    }

    // Add event listener to detect input changes
    searchInput.addEventListener('input', searchItems);
</script>

    <script src="<?=base_url('rofi/')?>script.js"></script>
</body>

</html>

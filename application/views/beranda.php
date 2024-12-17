<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?=base_url('rofi/')?>style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Music Player Platform | ApanMusic</title>
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
                    <input type="text" placeholder="Type here to search">
                </div>
            </header>

            <div class="trending">
                <div class="left">
                    <h5>Trending New Song</h5>
                    <div class="info">
                        <h2>White Ferrari</h2>
                        <h4>Frank Ocean</h4>
                        <h5>63 Million Plays</h5>
                        <div class="buttons">
                            <i class='bx bxs-heart'></i>
                        </div>
                    </div>
                </div>
                <img src="<?=base_url('rofi/')?>assets/trendd.jpg" alt="Trending New Song">
            </div>

            <div class="playlist">
                <div class="genres">
                    <div class="header">
                        <h5>Genres</h5>
                    </div>

                    <div class="items">
                        <?php foreach ($kategori as $kk) {?>
                        <div class="item">
                            <a href="<?=base_url('home/kategori/' . $kk['id_kategori'])?>">
                                <p><?=$kk['nama_kategori']?></p>
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <div class="music-list">
                    <div class="header">
                        <h5>Top Plays</h5>
                        <a href="#">See all</a>
                    </div>

                    <div class="items">
                        <?php foreach(array_slice($konten, 0, 5) as $kk) { ?>
                        <div class="item">
                            <div class="info">
                                <p><?=$kk['id_konten']?></p>
                                <img src="<?=base_url('upload/konten/' . $kk['foto'])?>" alt="<?=$kk['judul']?>">
                                <div class="details">
                                    <h5><?=$kk['judul']?></h5>
                                    <p><?=$kk['nama_kategori']?></p>
                                </div>
                            </div>
                            <br>
                            <div class="actions">
                                <a href="<?=base_url('home/detail/' . $kk['slug'])?>">
                                    <i style="font-size:30px;" class="bi bi-play-fill"></i>
                                </a>
                            </div>
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
                        <img src="<?=base_url('rofi/')?>assets/profile.png" alt="User Profile">
                    </div>
                    <a href="<?= base_url('auth/index')?>">
                        <div class="right">
                            <h5>Free</h5>
                        </div>
                    </a>
                </div>
            </div>
			<div class="queue">
    <h5>Queue</h5>
    <ul>
        <?php 
        // Shuffle the content
        $shuffled_konten = $konten;
        shuffle($shuffled_konten); // Randomize the array

        // Display shuffled content
        foreach (array_slice($shuffled_konten, 0, 5) as $kk) { ?>
        <li class="queue-item">
            <img src="<?= base_url('upload/konten/' . $kk['foto']) ?>" alt="<?= $kk['judul'] ?>">
            <div class="details">
                <h5><?= $kk['judul'] ?></h5>
                <p><?= $kk['keterangan'] ?></p>
            </div>
            <div class="actions">
                <a href="<?= base_url('home/detail/' . $kk['slug']) ?>">
                    <i style="font-size: 24px;" class="bi bi-play-fill"></i>
                </a>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>


        </div>
    </div>

    <script src="<?=base_url('rofi/')?>script.js"></script>
</body>

<style>
  /* Queue Section */
.queue {
    padding: 20px;
    background-color: #202026;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    max-width: 300px;
}

.queue h5 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #fff;
}

.queue ul {
    list-style: none;
    padding: 0;
}

.queue-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.queue-item:last-child {
    border-bottom: none;
}

.queue-item img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    object-fit: cover;
    margin-right: 15px;
}

.queue-item .details {
    flex: 1;
	color : #fff;
}

.queue-item .details h5 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #fff;
}

.queue-item .details p {
    font-size: 14px;
    color: #fff;
    margin: 0;
}

.queue-item .actions {
    margin-left: 10px;
}

.queue-item .actions a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
}

.queue-item .actions a:hover {
    color: #1a73e8;
}

</style>

</html>

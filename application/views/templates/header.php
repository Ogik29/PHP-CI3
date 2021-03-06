<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">

    <!-- jika di codeiginiter setiap key yang disimpan di array ketika dikirim ke viewnya otomatis akan di ekstrak menjadi variabel -->
    <title><?php echo $judul ?> Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>">CI App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- base_url() dapat dipanggil karena sudah di autoload yg terletak pada folder config dan file autoload.php pada bagian $autoload['helper'].
                    letak konfigurasi base_url terdapat di folder config dan file config.php -->
                    <a class="nav-link text-white pl-1" href="<?php echo base_url() ?>">Home</a>

                    <form action="<?php echo base_url() ?>waifugenshin" method="POST">
                        <button class="btn btn-outline-secondary text-white pl-1" type="submit" name="wg">Waifu Genshin</button>
                    </form>

                    <form action="<?php echo base_url() ?>waifunimex" method="POST">
                        <button class="btn btn-outline-secondary text-white pl-1" type="submit" name="wn">Waifu Nimex</button>
                    </form>

                    <form action="<?php echo base_url() ?>npc" method="POST">
                        <button class="btn btn-outline-secondary text-white pl-1" type="submit" name="npc">NPC</button>
                    </form>

                    <a class="nav-link text-white pl-1" href="<?php echo base_url() ?>about">About</a>
                </div>
            </div>
        </div>
    </nav>
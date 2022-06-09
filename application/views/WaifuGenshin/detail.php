<div class="container">

    <div class="card border-light bg-secondary text-white mt-4" style="width: 18rem;">
        <img src="<?php echo base_url() ?>assets/img/<?php echo $waifu['img'] ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Name: <?php echo $waifu['nama'] ?></h5>
            <p class="card-text"><?php echo $waifu['deskripsi'] ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-secondary text-white">Vision/Gnosis: <?php echo $waifu['vision'] ?></li>
            <li class="list-group-item bg-secondary text-white">Region: <?php echo $waifu['region'] ?></li>
        </ul>
        <div class="card-body">
            <h5><a href="<?php echo base_url() ?>WaifuGenshin" class="btn btn-info">Back</a></h5>
        </div>
    </div>

</div>
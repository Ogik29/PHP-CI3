<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md">
            <form action="" method="POST">
                <button class="btn btn-outline-dark mb-3" type="submit" name="tombolGacha">Gacha</button>
            </form>
            <h2>Ur Waifu is: <br><?php echo $waifu['nama']; ?></h2>
            <?php if (isset($_POST['tombolGacha'])) : ?>
                <img src="<?php echo base_url() ?>assets/img/<?php echo $waifu['img'] ?>" width="120px"> <br>
            <?php endif; ?>
            <a href="<?php echo base_url() ?>WaifuNimex" class="btn btn-dark btn-lg active mt-3" role="button">Back</a>
        </div>
    </div>

</div>
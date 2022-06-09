<div class="container mt-4">

    <!-- menampilkan alert add -->
    <?php if ($this->session->flashdata('flashAdd')) : ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Waifu Genshin data <strong>success</strong> <?php echo $this->session->flashdata('flashAdd') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- menampilkan alert delete -->
    <?php if ($this->session->flashdata('flashDelete')) : ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Waifu Genshin data <strong>success</strong> <?php echo $this->session->flashdata('flashDelete') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo base_url() ?>WaifuGenshin/add" class="btn btn-dark mb-4 mr-2">Add Waifu</a>
            <a href="<?php echo base_url() ?>WaifuGenshin/gacha" class="btn btn-info mb-4">Gacha Waifu</a>
        </div>
    </div>

    <!-- search -->
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Waifu name..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                        <a href="<?php echo base_url() ?>WaifuGenshin" class="btn btn-outline-secondary">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <h3>List Waifu</h3>
    <!-- jika waifu tidak ada -->
    <?php if (empty($waifu)) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            Waifu is not exist
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <!-- jika di codeiginiter setiap key yang disimpan di array ketika dikirim ke viewnya otomatis akan di ekstrak menjadi variabel -->
        <?php foreach ($waifu as $w) : ?>
            <div class="col-md-4 mb-4">
                <div class="card border-light bg-secondary text-light" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php echo $w['nama'] ?></h5>
                    </div>
                    <div class="card-body mb-5">
                        <h5><a href="<?php echo base_url() ?>WaifuGenshin/detail/<?php echo $w['id'] ?>" class="card-link badge badge-info">Waifu details</a></h5>
                        <h5><a href="<?php echo base_url() ?>WaifuGenshin/update/<?php echo $w['id'] ?>" class="card-link badge badge-success tombolUpdate mt-2">Update<a></h5>
                        <h5><a href="<?php echo base_url() ?>WaifuGenshin/delete/<?php echo $w['id'] ?>" class="card-link badge badge-danger mt-2" onclick="return confirm('Rill kh cuy?');">Delete</a></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php echo $this->pagination->create_links(); ?>

</div>
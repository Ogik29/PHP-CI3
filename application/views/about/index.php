<?php $this->session->unset_userdata('keyword'); ?>
<?php $this->session->unset_userdata('keywordNPC'); ?>

<div class="container mt-4">
    <h1>About me</h1>
    <img src="<?php echo base_url() ?>assets/img/EiSeggs.jpg" alt="not me, just there's my wife :v" width="200" class="rounded-circle shadow mt-2 mb-2">
    <p>Perkenalkan Nama saya <b><?php echo $nama ?></b>, watashi berumur <b><?php echo $umur ?></b> tahun, dan watashi adalah seorang
        <b><?php echo $role ?></b> /emotekemren <br> (btw yg difoto itu istri gwehj ygy :v)
    </p>
</div>
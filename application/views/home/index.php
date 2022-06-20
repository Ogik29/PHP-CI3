<?php $this->session->unset_userdata('keyword'); ?>
<?php $this->session->unset_userdata('keyword2'); ?>
<?php $this->session->unset_userdata('keywordNPC'); ?>

<div class="container mt-4">
    <div class="jumbotron bg-secondary text-light">
        <h1 class="display-4">Welcome to My Website</h1>
        <p class="lead">Welcome <?php echo $name ?></p>
        <hr class="mt-4">
        <p>hiduplah demi waifu niscaya hidupmu akan lebih berwarna :v</p>
        <a class="btn btn-primary btn-lg" href="<?php echo base_url() ?>about" role="button">About me</a>
    </div>
</div>
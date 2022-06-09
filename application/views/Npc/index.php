<div class="container mt-4">

    <!-- menampilkan alert delete -->
    <?php if ($this->session->flashdata('flashDelete')) : ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    NPC data <strong>success</strong> <?php echo $this->session->flashdata('flashDelete') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- menampilkan alert update -->
    <?php if ($this->session->flashdata('flashAdd')) : ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    NPC data <strong>success</strong> <?php echo $this->session->flashdata('flashUpdate') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-10">
            <a href="<?php echo base_url() ?>Npc/add" class="btn btn-dark mb-4">Add NPC</a>
        </div>
    </div>

    <!-- search -->
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search NPC name..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark" type="button">Search</button>
                        <a href="<?php echo base_url() ?>Npc" class="btn btn-outline-secondary">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10">

            <h3 class="bg-dark text-white pt-3 pb-3 pl-3">List of NPC</h3>

            <table class="table table-striped table-dark">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($npc as $n) : ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $n['name'] ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>Npc/detail/<?php echo $n['id'] ?>" class="badge badge-warning">detail</a>
                                <a href="<?php echo base_url() ?>Npc/update/<?php echo $n['id'] ?>" class="badge badge-success">update</a>
                                <a href="<?php echo base_url() ?>Npc/delete/<?php echo $n['id'] ?>" class="badge badge-danger" onclick="return confirm('Rill kh cuy?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php echo $this->pagination->create_links(); ?>

        </div>
    </div>
</div>
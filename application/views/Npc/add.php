<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header bg-secondary text-light">
                    Lak nge Add sg genah :v
                </div>
                <div class="card-body">

                    <!-- memunculkan pesan error secara keseluruhan -->
                    <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors() ?>
                        </div>
                    <?php endif; ?> -->

                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text text-danger"><?php echo form_error('name') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Country: </label>
                            <input type="text" class="form-control" id="country" name="country">
                            <small class="form-text text-danger"><?php echo form_error('country') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-2 float-right">Add</button>
                        <a href="<?php echo base_url() ?>npc" class="closeButton btn btn-secondary btn-md mt-2 float-right" role="button" aria-pressed="true">Close</a>
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>
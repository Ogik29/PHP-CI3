<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    Lak Update sg genah :v
                </div>
                <div class="card-body">

                    <!-- memunculkan pesan error secara keseluruhan -->
                    <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors() ?>
                        </div>
                    <?php endif; ?> -->

                    <form action="" method="POST" enctype="multipart/form-data">

                        <!-- mengupload gambar lama jika user tidak mengupdate gambar -->
                        <input type="hidden" name="oldimg" value="<?php echo $waifu['img'] ?>">

                        <!-- mengirim id untuk melakukan update -->
                        <input type="hidden" name="id" value="<?php echo $waifu['id'] ?>">

                        <div class="form-group">
                            <label for="nama">Name: </label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $waifu['nama'] ?>">
                            <small class="form-text text-danger"><?php echo form_error('nama') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Description: </label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $waifu['deskripsi'] ?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="single">Single? </label>
                            </div>
                            <select class="custom-select" id="single" name="single">
                                <?php foreach ($single as $s) : ?>
                                    <?php if ($s == $waifu['single']) : ?>
                                        <option value="<?php echo $s ?>" selected> <?php echo $s ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $s ?>"> <?php echo $s ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="anime">Anime: </label>
                            <input type="text" class="form-control" id="anime" name="anime" value="<?php echo $waifu['anime'] ?>">
                            <small class="form-text text-danger"><?php echo form_error('anime') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="img" class="labelimg">Image: <b>(Can't be bigger than 4 mb)</b></label> <br>
                            <img src="<?php echo base_url() ?>assets/img/<?php echo $waifu['img'] ?>" width="100px">
                            <input type="file" class="form-control-file mt-2" id="img" name="img">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-2 float-right">Update</button>
                        <a href="<?php echo base_url() ?>WaifuNimex" class="closeButton btn btn-secondary btn-md mt-2 float-right" role="button" aria-pressed="true">Close</a>
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
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
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?php echo form_error('nama') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Description: </label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="vision">Vision/Gnosis: </label>
                            <select multiple class="form-control" id="vision" name="vision">
                                <?php foreach ($vision as $v) : ?>
                                    <option value="<?php echo $v['vision'] ?>"> <?php echo $v['vision'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?php echo form_error('vision') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="region">Region: </label>
                            <select multiple class="form-control" id="region" name="region">
                                <option value="Mondstadt">Mondstadt</option>
                                <option value="Liyue">Liyue</option>
                                <option value="Inazuma">Inazuma</option>
                                <option value="Semeru">Semeru</option>
                                <option value="Fontaine">Fontaine</option>
                                <option value="Natlan">Natlan</option>
                                <option value="Snezhnaya">Snezhnaya</option>
                                <option value="Other">Other</option>
                            </select>
                            <small class="form-text text-danger"><?php echo form_error('region') ?></small> <!-- memunculkan pesan error -->
                        </div>

                        <div class="form-group">
                            <label for="img" class="labelimg">Image: <b>(Must to upload some image & can't be bigger than 4 mb)</b></label>
                            <input type="file" class="form-control-file" id="img" name="img">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mt-2 float-right">Add</button>
                        <a href="<?php echo base_url() ?>WaifuGenshin" class="closeButton btn btn-secondary btn-md mt-2 float-right" role="button" aria-pressed="true">Close</a>
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>
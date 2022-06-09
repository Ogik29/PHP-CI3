<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header bg-secondary text-light">
                    NPC Detail
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $npc['name'] ?></h5>
                    <p class="card-text">Country: <?php echo $npc['country'] ?></p>
                    <a href="<?php echo base_url() ?>Npc" class="btn btn-info">Back</a>
                </div>
            </div>

        </div>
    </div>
</div>
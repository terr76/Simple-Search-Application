<?php $this->layout('template') ?>

<div class="container">
    <div class="row">
        <?= $message ?>
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <?php $this->insert('_partials/loginScreen') ?>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
<?php 
$this->layout('template', [
	'title' 			=> 'Login',
	'user_logged_in' 	=> null
]) 
?>

<div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <?php $this->insert('_partials/loginScreen', ['message' => $message]) ?>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
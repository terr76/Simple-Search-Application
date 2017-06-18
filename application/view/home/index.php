<?php 
$this->layout('template', [
	'title' 			=> 'Home',
	'user_logged_in' 	=> $user_logged_in
]);
?>

<div class="jumbotron">
	<h1>Home Screen</h1>
	
	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. </p>
	<?php if($user_logged_in): ?>
		<h2>Welcome, <?=$this->e($name)?> </h2>
	<?php else: ?>
		<p><a class="btn btn-lg btn-success" href="/register" role="button">Sign up today</a></p>
	<?php endif ?>
</div>

<div class="row marketing">
	<div class="col-lg-12">
		<!-- Messeage if non-logged in user try to search -->
		<?php if((isset($_GET['search']) && strlen($_GET['search']) > 1) && ($user_logged_in != '1')): ?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>Please Login
			</div>
		<?php endif ?>	

		<!-- Search Form -->
		<?php $this->insert('_partials/searchForm') ?>

		<!-- Login Screen if non-logged in user try to search -->
		<?php if((isset($_GET['search']) && strlen($_GET['search']) > 1) && ($user_logged_in != '1')): ?>
			<?php $this->insert('_partials/loginScreen', ['message' => $message]) ?>
		
		<!-- Search Result for logged in user -->
		<?php elseif(isset($_GET['search']) && strlen($_GET['search']) > 1): ?>
			<?php $this->insert('_partials/searchResult', ['users' => $users]) ?>
		<?php endif ?>		

	</div>
</div>



	


	



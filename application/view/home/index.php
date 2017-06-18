<?php 
$this->layout('template', [
	'title' => 'Home',
	'name' => $this->e($name), 
	'user_logged_in' => $user_logged_in
]);
?>

<div class="jumbotron">
	<h1>Home Screen</h1>
	<p>Welcome, <?=$this->e($name)?> </p>
	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. </p>
	<p><a class="btn btn-lg btn-success" href="/register" role="button">Sign up today</a></p>
</div>

<div class="row marketing">
	<div class="col-lg-12">

		<?php if((isset($_GET['search']) && strlen($_GET['search']) > 1) && ($user_logged_in != '1')): ?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>Please Login
			</div>
		<?php endif ?>		

		<form action="/" method="get">
		  <div class="form-group">
			<h2>Search</h2>
			<div id="custom-search-input">
			    <div class="input-group col-md-12">
			        <input name="search" type="text" class="search-query form-control" placeholder="Search by Name or Email" />
			        <span class="input-group-btn">
			            <button class="btn btn-danger" type="submit">
			                <span class=" glyphicon glyphicon-search"></span>
			            </button>
			        </span>			    		
			    </div>
			</div>
		  </div>
		</form>

		<?php if((isset($_GET['search']) && strlen($_GET['search']) > 1) && ($user_logged_in != '1')): ?>
				<?php $this->insert('_partials/loginScreen', ['message' => $message]) ?>
			<?php elseif(isset($_GET['search']) && strlen($_GET['search']) > 1): ?>
				<?php $this->insert('home/result', ['users' => $users]) ?>
		<?php endif ?>		

	</div>
</div>



	


	



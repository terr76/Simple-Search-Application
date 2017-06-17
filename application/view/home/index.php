<div class="jumbotron">
	<h1>Home Screen</h1>
	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. </p>
	<p><a class="btn btn-lg btn-success" href="/register" role="button">Sign up today</a></p>
</div>

<div class="row marketing">
	<div class="col-lg-12">
		<form action="/" method="get">
		  <div class="form-group">

			<h2>Search</h2>
			<div id="custom-search-input">
			    <div class="input-group col-md-12">
			        <input name="search" type="text" class="search-query form-control" placeholder="Search" />
			        <span class="input-group-btn">
			            <button class="btn btn-danger" type="submit">
			                <span class=" glyphicon glyphicon-search"></span>
			            </button>
			        </span>			    		

			    </div>
			</div>

		  </div>
		</form>
	</div>

</div>

<?php
if(isset($user_logged_in) && $user_logged_in == '1') {
?>

<div class="table-responsive">
	<table class="table table-hover">
	    <thead>
	    <tr>
	        <td>Id</td>
	        <td>Name</td>
	        <td>Email</td>
	    </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($users as $user) { ?>
	        <tr>
	            <td><?php if (isset($user->id)) echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
	            <td><?php if (isset($user->name)) echo htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8'); ?></td>
	            <td><?php if (isset($user->email)) echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
	        </tr>
	    <?php } ?>
	    </tbody>
	</table>
</div>
<?php } else {
	if(isset($_GET['search']) && $_GET['search'] != null) {
		echo 'Please login';
	}
}
?>


<?php if($users): ?>
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
<?php else: ?>
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>No Result
	</div>
<?php endif ?>
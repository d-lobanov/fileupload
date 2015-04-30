<div class="loginForm">
	<form class="form-horizontal" action="login?login" method="POST" name="loginForm">
		<div id="legend">
			<legend class="">Login</legend>
		</div>
		<div class="control-group">
			<!-- Username -->
			<div class="controls error"><?= $error ?></div>
			<label class="control-label" for="username">Email</label>

			<div class="controls">
				<input id="username" name="email" type="email" required>
			</div>
		</div>

		<div class="control-group">
			<!-- Password-->
			<label class="control-label" for="password">Password</label>

			<div class="controls">
				<input name="password" type="password"
				       required pattern=".{8,}" title="Не меньше 8 символов">
			</div>
		</div>

		<div class="control-group">
			<!-- Button -->
			<div class="controls">
				<button class="btn btn-success" name="login">Login</button>
			</div>
		</div>

		<div class="col-md-12 control">
			<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
				Don't have an account!
				<a href="login?register">Sign Up Here</a>
			</div>
		</div>
	</form>
</div>
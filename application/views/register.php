<div class="span6">
	<div class="loginForm">
		<form class="form-horizontal" action="" method="POST">
			<div id="legend">
				<legend class="">Sign Up</legend>
			</div>
			<div class="control-group">
				<!-- Username -->
				<div class="controls error"><?= $errorMessage ?></div>
				<label class="control-label" for="email">Email</label>

				<div class="controls">
					<input name="email" type="email" required>
				</div>
			</div>

			<div class="control-group">
				<!-- Password-->
				<label class="control-label" for="password">Password</label>

				<div class="controls">
					<input name="password" placeholder="" type="password"
					       required
					       pattern=".{8,}" title="Не меньше 8 символов">
				</div>
			</div>

			<div class="control-group">
				<!-- Confirm Password-->
				<label class="control-label" for="conf-password">Confirm Password</label>

				<div class="controls">
					<input name="confirm" placeholder="" type="password"
					       required
					       pattern=".{8,}" title="Не меньше 8 символов">
				</div>
			</div>

			<div class="control-group">
				<!-- Button -->
				<div class="controls">
					<button class="btn btn-success" name="register">Sign up</button>
				</div>
			</div>

			<div class="col-md-12 control">
				<!-- Go Login -->
				<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
					Are you account?
					<a href="login?login">Login here</a>
				</div>
			</div>
		</form>
	</div>
</div>
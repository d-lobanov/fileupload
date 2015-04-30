<div class="jumbotron">
	<form enctype="multipart/form-data" method="post" action="put">
		<label class="controls success" for="file"><?= $success ?></label>
		<label class="controls error" for="file"><?= $error ?></label>
		<span class="btn btn-default btn-file">
			Browse <input type="file" name="file"/>
		</span>

		<p></p>
		<button class="btn btn-large btn-success" type="submit" name="put">Отправить</button>
	</form>
</div>
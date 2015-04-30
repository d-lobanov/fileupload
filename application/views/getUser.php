<div class="jumbotron">
	<table class="table">
		<tr>
			<th>Name</th>
			<th>Url</th>
		</tr>
		<?php foreach ($files AS $file): ?>
			<tr>
				<td><?= $file['name'] ?></td>
				<td><?= $file['url'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
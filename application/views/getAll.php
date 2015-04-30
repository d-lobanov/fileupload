<div class="jumbotron">
	<table class="table">
		<tr>
			<th>Name</th>
			<th>Url</th>
			<th>User</th>
		</tr>
		<?php foreach ($files AS $file): ?>
			<tr>
				<td><?= $file['name'] ?></td>
				<td><?= $file['url'] ?></td>
				<td><?= $file['email'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
			<div class="maintitle">
				<h3><?php if (!empty($search)) : ?>
						Suche nach: <em><?= $_GET['search'] ?></em>
					<?php else : ?>
						<?= ucfirst($category) ?> für die ganze Familie</h3>
					<?php endif; ?>
			</div>
			<div class="flexwrap">
				<?php require (__DIR__ .'/../travel_list.tpl.php') ?>
			</div>
		
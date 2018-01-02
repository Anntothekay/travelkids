			<?php foreach ($travels as $travel): ?>
				<div class="flexitem">
					<div class="shortinfo">
						<a href="index.php?controller=travel&amp;action=read&amp;id=<?= $travel->getId() ?>"><img alt="<?= clean($travel->getThumbnail()) ?>" src="img/thumbnails/<?= clean($travel->getThumbnail()) ?>" /></a>
						<h4><?= clean($travel->getTitle()) ?></h4>
						<p><?= purify(nl2br($travel->getTeaser(), false)) ?></p>
						<h3 class="price"><?= clean($travel->getPrice()) ?>&#8364;</h3><a href="index.php?controller=travel&amp;action=read&amp;id=<?= $travel->getId() ?>">Details</a> <a class="button" href="index.php?controller=booking&amp;action=add&amp;travel_id=<?= clean($travel->getId()) ?>">Buchen</a>
					</div>
				</div>
			<?php endforeach; ?>
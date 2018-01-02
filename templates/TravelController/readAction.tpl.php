			<div class="content spacing longinfo">
				<div class="titleimage">
					<a href="img/pictures/<?= $travel->getThumbnail() ?>" target="_blank"><img src="img/pictures/<?= $travel->getThumbnail() ?>" /></a>	
					<?php foreach (explode(",", $travel->getPictures()) as $picture): ?>
						<?php if ($picture !== $travel->getThumbnail()): ?>
						<a href="img/pictures/<?= clean($picture) ?>" target="_blank"><img src="img/thumbnails/<?= clean($picture) ?>" /></a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<div class="tripinfo">
					<h3><?= clean($travel->getTitle()) ?></h3>
					<h6>Region</h6>
					<p><?= clean($travel->getRegion()) ?></p>	
					<h6>Beschreibung</h6>
					<p><?= purify(nl2br($travel->getDescription(), false)) ?></p>
					<h6>Reisebeginn</h6>
					<p><?= clean($travel->getStart()->format('d.m.Y')) ?></p>
					<h6>Reiseende</h6>
					<p><?= clean($travel->getEnd()->format('d.m.Y')) ?></p>
					<h3 class="price"><?= clean($travel->getPrice()) ?>&#8364;</h3>		
					<a class="button" href="index.php?controller=booking&amp;action=add&amp;travel_id=<?= clean($travel->getId()) ?>">Buchen</a>
				</div>
			</div>
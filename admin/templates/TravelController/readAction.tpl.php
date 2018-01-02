<div class="travel">
	<h5><?= clean($travel->getTitle()) ?></h5>

	<div class="attribute">
		<p><b>Beginn: </b><?= clean($travel->getStart()->format('d.m.Y')) ?></p>
	</div>
	
	<div class="attribute">
		<p><b>Ende: </b><?= clean($travel->getEnd()->format('d.m.Y')) ?></p>
	</div>

	<div class="attribute">
		<p><b>Preis: </b><?= clean($travel->getPrice()) ?>&#8364;</p>
	</div>

	<div class="attribute">
		<p><b>Teaser: </b><?= clean($travel->getTeaser()) ?></p>
	</div>

	<div class="attribute">
		<p><b>Beschreibung: </b><?= purify(nl2br($travel->getDescription(), false)) ?></p>
	</div>

	<div class="attribute">
		<p class="nobreak"><b>Bild(er): </b></p>
			<?php foreach (explode(",", $travel->getPictures()) as $picture): ?>
				<a href="../img/pictures/<?= clean($picture) ?>" target=_blank><?= clean($picture) ?></a>
			 <?php endforeach; ?>
	</div>

	<div class="attribute">
		<p><b>Thumbnail: </b></p>
		<img src="../img/thumbnails/<?= clean($travel->getThumbnail()) ?>" alt="<?= clean($travel->getThumbnail()) ?>" />
	</div>

	<div class="attribute">
		<p><b>Region:</b> <?= clean($travel->getRegion()) ?></p>
	</div>

	<div class="attribute">
		<p><b>Kategorie: </b><?= clean($travel->getCategory()) ?></p>
	</div>

	<div class="attribute">
		<p><b>Angelegt am: </b><?= clean($travel->getCreatedAt()->format('d.m.Y')) ?></p>
	</div>
	
	<a href="index.php?controller=travel&amp;action=browse">Zurück</a><br />

	<a class="button" href="index.php?action=edit&amp;controller=travel&amp;id=<?= $travel->getId() ?>">Bearbeiten</a> <a class="button" href="index.php?action=delete&amp;controller=travel&amp;id=<?= $travel->getId(); ?>">Löschen</a>
</div>
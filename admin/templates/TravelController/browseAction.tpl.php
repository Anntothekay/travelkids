<h5>Alle Reisen</h5>
<p>Sortieren nach:
	<a class="<?= ($sort === 'createdAt') ? 'active' : ''; ?>" href="index.php?controller=travel&amp;action=browse&amp;sort=createdAt">Neu</a> 
	<a class="<?= ($sort === 'date') ? 'active' : ''; ?>" href="index.php?controller=travel&amp;action=browse&amp;sort=date">Start</a> 
	<a class="<?= ($sort === 'region') ? 'active' : ''; ?>" href="index.php?controller=travel&amp;action=browse&amp;sort=region">Region</a> 
	<a class="<?= ($sort === 'category') ? 'active' : ''; ?>" href="index.php?controller=travel&amp;action=browse&amp;sort=category">Kategorie</a>
</p>
<?php foreach ($travels as $travel): ?>
	<div class="travel">
		<h6><?= clean($travel->getTitle()) ?></h6>
		
		<div class="attribute">
			<p><b>Region: </b><?= clean($travel->getRegion()) ?></p>
		</div>
		
		<div class="attribute">
			<p><b>Kategorie: </b><?= clean($travel->getCategory()) ?></p>
		</div>

		<div class="attribute">
			<p><b>Starttermin: </b><?= clean($travel->getStart()->format('d.m.Y')) ?></p>
		</div>
		
		<div class="attribute">
			<p><b>Angelegt am: </b><?= clean($travel->getCreatedAt()->format('d.m.Y')) ?> (<?= clean($travel->getCreatedAt()->format('H:i:s')) ?>)</p>
		</div>
	
		<a class="button" href="index.php?action=read&amp;controller=travel&amp;id=<?= $travel->getId() ?>">Details</a>	
	 </div>
<?php endforeach; ?>

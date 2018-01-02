<div class="travel">
	<br />
	<p>
		Wollen Sie die Reise
		&quot;<?= clean($travel->getTitle()) ?>&quot;
		angelegt am <?= clean($travel->getCreatedAt()->format('d.m.Y')) ?>
		wirklich entfernen?
	</p>

	<form action="index.php?controller=travel&amp;action=delete" method="post">

		<input name="id" type="hidden" value="<?= clean($travel->getId(), false) ?>" />

		<input type="submit" class="button" value="Ja" />
		<a href="index.php?action=read&amp;controller=travel&amp;id=<?= $travel->getId(); ?>">Abbrechen</a>

	</form>
</div>
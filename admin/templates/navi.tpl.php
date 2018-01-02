<?php if (!isLoggedIn()): ?>
	<a class="topnavlink" href="index.php">Login</a>
<?php else: ?>
	<a class="topnavlink" href="index.php?controller=travel&amp;action=browse">Alle Reisen</a>
	<a class="topnavlink" href="index.php?controller=travel&amp;action=add">Reise anlegen</a>
	<a class="topnavlink" href="index.php?controller=booking&amp;action=browse">Alle Buchungen</a>
	<a class="topnavlink" href="index.php?action=logout">Logout</a>
<?php endif; ?>

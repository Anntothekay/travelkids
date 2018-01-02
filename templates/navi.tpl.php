			<ul>
				<li>
					<a class="topnavlink" href="index.php?controller=travel&amp;action=browse">Familienreisen</a>
					<ul>
						
						
						<li>
							<a class="subnavlink" href="index.php?controller=travel&amp;action=browse&amp;category=pauschalreisen">Pauschalreisen</a>
						</li>
						
						
						<li>
							<a class="subnavlink" href="index.php?controller=travel&amp;action=browse&amp;category=kreuzfahrten">Kreuzfahrten</a>
						</li>
						<li>
							<a class="subnavlink" href="index.php?controller=travel&amp;action=browse&amp;category=tagesausflüge">Tagesausflüge</a>
						</li>
						<li>
							<a class="subnavlink" href="index.php?controller=travel&amp;action=browse&amp;category=bauernhofurlaub">Bauernhofurlaub</a>
						</li>
					</ul>
				</li>
			</ul><a class="topnavlink" href="index.php?action=impressum">Impressum</a> <a class="topnavlink" href="index.php?action=contact">Kontakt</a>
			<form class ="searchform" action="index.php" method="get">
				<input type="hidden" name="action" value="browse" />
				<input type="hidden" name="controller" value="travel" />
				<input id="search" name="search" placeholder="Suche" type="search" autocomplete="off" 
					<?php if (!empty($search)): ?>
					   value="<?= clean($search, false) ?>"
            		<?php endif; ?> 
					   >
				<div class="suggests">
					<ul class="suggest-list">
					</ul>
				</div>
			</form>
			
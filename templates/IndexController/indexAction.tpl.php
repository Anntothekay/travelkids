				<script src="javascript/teaser.js" defer="defer"></script>

				<div class="slider">
				
				<div class="teaserwrap">
					
					<?php foreach ($randoms as $random): ?>
						<?php $counter++ ?>
						<div class="slide <?= ($counter === 1) ? 'active' : '' ?>" id="travel_<?= $counter ?>">
							<div class="teaserimg"><img alt="" src="img/pictures/<?= clean($random->getThumbnail()) ?>"></div>
							<div class="teasertext">
								<a href="index.php?controller=travel&amp;action=read&amp;id=<?= $random->getId() ?>">
									<h1><?= clean($random->getTitle()) ?></h1>
								</a>
								<h2 class="price">ab <?= clean($random->getPrice()) ?> &#8364;</h2>
								<a href="index.php?controller=travel&amp;action=read&amp;id=<?= $random->getId() ?>">
									<h3 class="button">Details</h3>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
					
					
					<div class="prev hidden">
						<i aria-hidden="true" class="fa fa-arrow-circle-o-left"></i>
					</div>
					<div class="next hidden">
						<i aria-hidden="true" class="fa fa-arrow-circle-o-right"></i>
					</div>
					
				</div>
				
			</div>
			
			<div class="maintitle">
				<h3>Aktuelle Reiseangebote</h3>
			</div>
			<div class="flexwrap">
				<?php require (__DIR__ .'/../travel_list.tpl.php') ?>
			</div>			
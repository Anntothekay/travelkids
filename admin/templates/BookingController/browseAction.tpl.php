<h5>Buchungen</h5>
<?php foreach ($bookings as $booking): ?>
	<div class="travel">
		<div class="attribute">
			<h6><?= clean($booking->getTravel()->getTitle()) ?></h6>
		</div>
		<div class="attribute">
			<p><strong>Gesamtpreis: </strong><?= (clean($booking->getPeople()) * (clean($booking->getTravel()->getPrice()))) ?>&#8364; (<?= clean($booking->getPeople()) ?> Person(en))</p>
		</div>		
		<div class="attribute">
			<p><strong>Gebucht von: </strong><?= clean($booking->getFirstName()) ?> <?= clean($booking->getLastName()) ?> (<?= clean($booking->getStreetName()) ?> <?= clean($booking->getStreetNumber()) ?>, <?= clean($booking->getPostalCode()) ?> <?= clean($booking->getCity()) ?>)</p>
		</div>
		<div class="attribute">
			<p><strong>Telefon: </strong><?= clean($booking->getPhone()) ?> <strong>Email: </strong><?= clean($booking->getEmail()) ?></p>
		</div>
		<div class="attribute">
			<p><b>Gebucht am: </b><?= clean($booking->getBookingDate()->format('d.m.Y')) ?> (<?= clean($booking->getBookingDate()->format('H:i:s')) ?>)</p>
		</div>	
	 </div>
<?php endforeach; ?>

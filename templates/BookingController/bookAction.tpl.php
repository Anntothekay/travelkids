			<div class="content booking">			   
              <form action="index.php?controller=booking&amp;action=book" method="post">
				   	<div class="bookingflexwrap">
						<fieldset class="bookingsummary">
							<legend>Ihre Daten</legend>							
							
							<p><b>Personenanzahl: </b><?= clean($booking->getPeople()) ?></p>
							
							<p><b>Anrede: </b><?= clean($booking->getFormOfAddress()) ?></p> 
							
							<p><b>Vorname: </b><?= clean($booking->getFirstName()) ?></p>
							
							<p><b>Nachname: </b><?= clean($booking->getLastName()) ?></p>
							
							<p><b>Geburtsdatum: </b><?= $booking->getBirthdate()->format('d.m.Y') ?></p>							
						   	
						    <p><b>Straße: </b><?= clean($booking->getStreetName()) ?></p>
							
							<p><b>Hausnummer: </b><?= clean($booking->getStreetNumber()) ?></p> 
							
							<p><b>Postleitzahl: </b><?= clean($booking->getPostalCode()) ?></p>
							
							<p><b>Wohnort: </b><?= clean($booking->getCity()) ?></p>

						    <p><b>Email: </b><?= clean($booking->getEmail()) ?></p>
							
							<p><b>Telefonnummer: </b><?= clean($booking->getPhone()) ?></p> 
							
							<p><b>Anmerkungen: </b><?= clean($booking->getComment()) ?></p>
						</fieldset>

						<fieldset class="bookingsummary">
							<input
								name="travel_id" type="hidden" id="travel_id"
								value="<?= $travel->getId() ?>"
							/>
							<legend>Ihre Reise</legend>
							<h4><?= clean($travel->getTitle()) ?></h4>
							<h6>Beschreibung</h6>
							<p><?= purify(nl2br($travel->getDescription(), false)) ?></p>
							<h6>Reisebeginn</h6>
							<p><?= clean($travel->getStart()->format('d.m.Y')) ?></p>
							<h6>Reiseende</h6>
							<p><?= clean($travel->getEnd()->format('d.m.Y')) ?></p>
							<h6>Gesamtpreis</h6>
							<h2 class="price"><?= (clean($travel->getPrice()) * clean($booking->getPeople())) ?>&#8364;</h2>
						</fieldset>
				  	</div>
                    <p>
						<input type="checkbox" name="agb" id="agb" required>
						<label for="agb">Hiermit bestätige ich, dass ich die <a href="index.php?action=agb" target="_blank">AGB</a> gelesen habe und akzeptiere.</label><br /><br />
						<a class="button" href="index.php?action=add&amp;controller=booking&amp;travel_id=<?= $travel->getId() ?>">Daten bearbeiten</a>
                       	<input class="button" type="submit" value="Jetzt Buchen" name="submit" id="submit" />
				  	</p>
                </form>
			</div>
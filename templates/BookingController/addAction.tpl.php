			<div class="content booking">			   
              <form action="index.php?controller=booking&amp;action=add" method="post">
				   	<div class="bookingflexwrap">
						<fieldset class="personaldata">
							<legend>Persönliche Daten</legend>							
							<p>	
								<label for="people">Personenanzahl:*</label><br />
								<input type="number" name="people" id="people" placeholder="z.B. 2" min="1" 
									   value="<?= clean($booking->getPeople(), false) ?>" 
									   autocomplete="off" required />
							</p>
							<p>
								<label for="form_of_address">Anrede:*</label><br />
								<select name="form_of_address" id="form_of_address" size="1" >
									<option
								    <?php if ($booking->getFormOfAddress() === 'Herr'): ?>
                    					selected="selected"
                					<?php endif; ?>		
									>Herr</option>
									<option
									<?php if ($booking->getFormOfAddress() === 'Frau'): ?>
                    					selected="selected"
                					<?php endif; ?>		
									>Frau</option>
								</select>
							</p> 
							<p>
								<label for="first_name">Vorname:*</label><br />
								<input type="text" name="first_name" id="first_name" placeholder="Ihr Vorname"
									   value="<?= clean($booking->getFirstName(), false) ?>"
									   autocomplete="off" required />
							</p>
							<p>
								<label for="last_name">Nachname:*</label><br />
								<input type="text" name="last_name" id="last_name" placeholder="Ihr Nachname" 
									   value="<?= clean($booking->getLastName(), false) ?>"
									   autocomplete="off" required />
							</p>                        
							<p>
								<label for="birthdate">Geburtsdatum:*</label><br />
								<input type="date" name="birthdate" id="birthdate" 
									   value="<?= clean($booking->getBirthdate()->format('Y-m-d'), false) ?>"
									   autocomplete="off" required />
							</p>
					   </fieldset>
					   <fieldset class="personaldata">
							<legend>Anschrift</legend>
							<p>
								<label for="street_name">Straße:*</label><br />
								<input type="text" name="street_name" id="street_name" placeholder="z.B. Lindenallee" 
									   value="<?= clean($booking->getStreetName(), false) ?>"
									   autocomplete="off" required />
							</p>
							 <p>
								<label for="street_number">Hausnummer:*</label><br />
								<input type="text" name="street_number" id="street_number" placeholder="z.B. 12b"
									   value="<?= clean($booking->getStreetNumber(), false) ?>"
									   autocomplete="off" required />
							</p>
							<p>
								<label for="postal_code">Postleitzahl:*</label><br />
								<input type="text" name="postal_code" id="postal_code" placeholder="z.B. 12345" 
									   value="<?= clean($booking->getPostalCode(), false) ?>"
									   autocomplete="off" required />                            
							</p>
							<p>
								<label for="city">Wohnort:*</label><br />
								<input type="text" name="city" id="city" placeholder="z.B. Berlin" 
									   value="<?= clean($booking->getCity(), false) ?>"
									   autocomplete="off" required />                            
							</p>
					   </fieldset>
					   <fieldset class="personaldata">
							<legend>Kontakt</legend>
							<p>
								<label for="email">Email:*</label><br />
								<input type="email" name="email" id="email" placeholder="Ihre Email Adresse" 
									   value="<?= clean($booking->getEmail(), false) ?>"
									   autocomplete="off" required />
							</p>
							<p>
								<label for="phone">Telefonnummer:*</label><br />
								<input type="tel" name="phone" id="phone" placeholder="Ihre Telefonnummer" 
									   value="<?= clean($booking->getPhone(), false) ?>"
									   autocomplete="off" required />
							</p>
							<p>
								<label for="comment">Anmerkungen:</label><br />
								<textarea name="comment" id="comment" rows="5" cols="20" maxlength="255" placeholder="Schreiben Sie Ihren Kommentar hier (optional)"><?= clean($booking->getComment(), false) ?></textarea>
							</p>
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
							<h6>Preis p.P.</h6>
							<h3 class="price"><?= clean($travel->getPrice()) ?>&#8364;</h3>
						</fieldset>
				  	</div>
                    <p>
                        <input class="button" type="reset" value="Zurücksetzen" name="reset" id="reset" />
                        <input class="button" type="submit" value="Daten prüfen" name="submit" id="submit" />
				  </p>
                </form>
			</div>
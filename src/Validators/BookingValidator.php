<?php

namespace Validators;

use Webmasters\Doctrine\ORM\EntityValidator;
use Webmasters\Doctrine\ORM\Util;

class BookingValidator extends EntityValidator
{	
	public function validateBirthdate($birthdate)
    {
		$now = new Util\Datetime('now');
		$old_enough = new Util\Datetime('-18 years');
		
		if (!$birthdate->isValid()) {
			$this->addError('Das Feld Geburtsdatum muss einen korrekten Datumswert beinhalten.');
        } else if (!$birthdate->isValidClosingDate($now)) {
			$this->addError('Das Geburtsdatum darf nicht in der Zukunft liegen.');			
		} else if ($old_enough->format('Y-m-d') < $birthdate->format('Y-m-d')) {
			$this->addError('Das Mindestalter beträgt 18 Jahre.');	
		}
    }
	
	public function validatePeople($people)
    {
		if ($people < 1) {
            $this->addError('Mindestens eine Person muss mitreisen.');
        }
    }
	
    public function validateFirstName($firstName)
    {
        if (empty($firstName)) {
            $this->addError('Das Feld Vorname ist leer.');
        }
    }
	
    public function validateLastName($lastName)
    {
        if (empty($lastName)) {
            $this->addError('Das Feld Nachname ist leer.');
        }
    }

    public function validateStreetName($streetName)
    {
        if (empty($streetName)) {
            $this->addError('Das Feld Straße ist leer.');
        } else if (!preg_match("/^[a-zA-Z\.\-äÄöÖüÜß\s]*$/", $streetName)) {
			$this->addError('Das Feld Straße darf nur aus Buchstaben bestehen.');
		}
    }
	
    public function validateStreetNumber($streetNumber)
    {
        if (empty($streetNumber)) {
            $this->addError('Das Feld Hausnummer ist leer.');
        }
    }
	
	public function validatePostalCode($postalCode)
    {
        if (!preg_match("/^[0-9]{5}$/",$postalCode)) {
            $this->addError('Die Postleitzahl muss aus 5 Ziffern bestehen.');
        }
    }
	
    public function validateCity($city)
    {
        if (empty($city)) {
            $this->addError('Das Feld Wohnort ist leer.');
        }
    }

    public function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('Sie haben keine korrekte Email-Adresse eingegeben.');
        }
    }

    public function validatePhone($phone)
    {
        if (empty($phone)) {
            $this->addError('Das Feld Telefonnummer ist leer.');
        }
    }
}

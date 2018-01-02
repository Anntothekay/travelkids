<?php

namespace Validators;

use Webmasters\Doctrine\ORM\EntityValidator;
use Webmasters\Doctrine\ORM\Util;

class TravelValidator extends EntityValidator
{	
	public function validateStart($start)
    {
		$now = new Util\Datetime('now');
		
		if (!$start->isValid()) {
			$this->addError('Das Feld Beginn muss einen korrekten Datumswert beinhalten.');
        } else if (!$now->isValidClosingDate($start)) {
			$this->addError('Das Datum darf nicht in der Vergangenheit liegen.');			
		}
    }
	
	public function validateEnd($end)
    {
		if ($end < $this->entity->getStart()) {
            $this->addError('Das Enddatum darf nicht vor dem Startdatum liegen.');
        }
    }
	
    public function validateTitle($title)
    {
        if (empty($title)) {
            $this->addError('Das Feld Title ist leer.');
        }
    }

    public function validateTeaser($teaser)
    {
        if (empty($teaser)) {
            $this->addError('Das Feld Teaser ist leer.');
        }
    }
	
	public function validatePrice($price)
    {
        if ($price <= 0) {
            $this->addError('Der Preis darf nicht kleiner oder gleich 0 sein.');
        }
    }

    public function validateDescription($description)
    {
        if (empty($description)) {
            $this->addError('Das Feld Beschreibung ist leer.');
        }
    }

    public function validateRegion($region)
    {
        if (empty($region)) {
            $this->addError('Es wurde keine Region ausgewählt.');
        }
    }
	
	public function validateCategory($category)
    {
        if (empty($category)) {
            $this->addError('Es wurde keine Kategorie ausgewählt.');
        }
    }
	
	public function validatePictures()
    {
        if (!(isset($_POST['pictures']))) {
            $this->addError('Es wurde kein Bild ausgewählt.');
        }
    }
	
	public function validateThumbnail()
    {
        if (!(isset($_POST['thumbnail']))) {
            $this->addError('Es wurde kein Thumbnail ausgewählt.');
        }
    }
}

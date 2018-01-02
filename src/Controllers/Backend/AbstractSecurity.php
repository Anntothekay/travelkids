<?php

namespace Controllers\Backend;

use Doctrine\ORM\EntityManager;

abstract class AbstractSecurity extends AbstractBase
{
    public function run($action)
    {
        if (!(in_array($action, ['logout', 'index'])) && !isLoggedIn()) {
            $this->redirect();
        } else if (in_array($action, ['index']) && isLoggedIn()) {
			$this->redirect('browse', 'travel');
		}

        parent::run($action);
    }
}

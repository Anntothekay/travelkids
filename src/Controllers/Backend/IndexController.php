<?php

namespace Controllers\Backend;

use Entities\Travel;

class IndexController extends AbstractSecurity
{
    public function indexAction()
    {
        $em = $this->getEntityManager();

        if ($_POST) {
            $user = $em
                ->getRepository('Entities\User')
                ->findOneByName($_POST['name'])
            ;

            if ($user && ($user->getPassword() == $_POST['password'])) {
                logIn($user->getId());

                $this->setMessage('User wurde eingeloggt.');
                $this->redirect('browse', 'travel');
            }

            $this->addContext('errors', ['Fehlerhafte Logindaten!']);
        }
    }

    public function logoutAction()
    {
        logOut();
        $this->setMessage('User wurde ausgeloggt.');
        $this->redirect();
    }
}

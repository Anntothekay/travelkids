<?php

namespace Controllers\Backend;

use Entities\Travel;

class TravelController extends AbstractSecurity
{	
	
	public function browseAction()
    {
		$em = $this->getEntityManager();

		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'createdAt';
		
        $query = $em
            ->createQueryBuilder()
            ->select('r, t, c')
            ->from('Entities\Travel', 't')
            ->leftJoin('t.region', 'r')
            ->leftJoin('t.category', 'c');
		
		if ($sort === 'region') {
            $query = $query->addOrderBy('r.name', 'ASC')
				  ->getQuery()
        	;
       		$travels = $query->getResult();
	
		} else if ($sort === 'category') {
			$query = $query->addOrderBy('c.name', 'ASC')
			->getQuery()
        	;
        	$travels = $query->getResult();
			
		} else if ($sort === 'date') {
			$query = $query->addOrderBy('t.start', 'ASC')
			->getQuery()
       	 	;
        	$travels = $query->getResult();
			
		} else if ($sort === 'createdAt') {
			$query = $query->addOrderBy('t.id', 'DESC')
			->getQuery()
       	 	;
        	$travels = $query->getResult();
    	}
			
		saveTravelData($travels);

		
		$this->addContext('travels', $travels);
		$this->addContext('sort', $sort);
	}
	
	public function readAction()
    {
        $em = $this->getEntityManager();
        $travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$_REQUEST['id'])
        ;

        $travel || $this->render404();

        $this->addContext('travel', $travel);
    }

    public function editAction()
    {
        $em = $this->getEntityManager();
        $travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$_REQUEST['id'])
        ;

        $travel || $this->render404();

        $regions = $em
            ->getRepository('Entities\Region')
            ->findAll()
        ;
		
        $categories = $em
            ->getRepository('Entities\Category')
            ->findAll()
        ;
		
		$imgdir = "../img/pictures";
		$thumbnaildir = "../img/thumbnails";
		
		$pictures = array_diff(scandir($imgdir), array('..', '.'));
		$thumbnails = array_diff(scandir($thumbnaildir), array('..', '.'));
		
		sort($pictures, SORT_NUMERIC);
		sort($thumbnails, SORT_NUMERIC);

        if ($_POST) {
            $travel->mapFromArray($_POST);

			$region = isset($_POST['region']) ? $_POST['region'] : [];
            $travel->setRegion(
                    $em->getRepository('Entities\Region')->find((int)$region)
                );
			
			$category = isset($_POST['category']) ? $_POST['category'] : [];
            $travel->setCategory(
                    $em->getRepository('Entities\Category')->find((int)$category)
                );
            
            $validator = $em->getValidator($travel);
            if ($validator->isValid()) {
                $em->persist($travel);
                $em->flush();

                $this->setMessage('Reise wurde aktualisiert.');
                $this->redirect();
            }

            $this->addContext('errors', $validator->getErrors());
        }

        $this->addContext('travel', $travel);
        $this->addContext('regions', $regions);
        $this->addContext('categories', $categories);
		$this->addContext('pictures', $pictures);
		$this->addContext('thumbnails', $thumbnails);
    }

    public function addAction()
    {
        $em = $this->getEntityManager();
        $travel = new Travel();
        $regions = $em
            ->getRepository('Entities\Region')
            ->findAll()
        ;
		$categories = $em
            ->getRepository('Entities\Category')
            ->findAll()
        ;
		
		$imgdir = "../img/pictures";
		$thumbnaildir = "../img/thumbnails";
		
		$pictures = array_diff(scandir($imgdir), array('..', '.'));
		$thumbnails = array_diff(scandir($thumbnaildir), array('..', '.'));
		
		sort($pictures, SORT_NUMERIC);
		sort($thumbnails, SORT_NUMERIC);

        if ($_POST) {
			
            $travel->mapFromArray($_POST);
			
			$region = isset($_POST['region']) ? $_POST['region'] : [];
			$travel->setRegion(
                    $em->getRepository('Entities\Region')->find((int)$region)
                );
			
			$category = isset($_POST['category']) ? $_POST['category'] : [];
            $travel->setCategory(
                    $em->getRepository('Entities\Category')->find((int)$category)
                );

            $validator = $em->getValidator($travel);
            if ($validator->isValid()) {
                $em->persist($travel);
                $em->flush();

                $this->setMessage('Reise wurde gespeichert.');
                $this->redirect();
            }

            $this->addContext('errors', $validator->getErrors());
        }
		
        $this->addContext('travel', $travel);
        $this->addContext('regions', $regions);
        $this->addContext('categories', $categories);
		$this->addContext('pictures', $pictures);
		$this->addContext('thumbnails', $thumbnails);
        $this->setTemplate('editAction');
    }

    public function deleteAction()
    {
        $em = $this->getEntityManager();
        $travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$_REQUEST['id'])
        ;

        $travel || $this->render404();

        if ($_POST) {
            $em->remove($travel);
            $em->flush();

            $this->setMessage('Reise wurde entfernt.');
            $this->redirect();
        }

        $this->addContext('travel', $travel);
    }
}

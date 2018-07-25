<?php

namespace AppBundle\Entity;

/**
 * CategoryRepository
 *
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{

    public function getWithJobs()
    {
	    $query = $this->getEntityManager()->createQuery(
	        'SELECT c FROM AppBundle:Category c LEFT JOIN c.jobs j WHERE j.expiresAt > :date AND j.isActivated = :activated'
	    )->setParameter('date', date('Y-m-d H:i:s', time()))->setParameter('activated', 1);
	    return $query->getResult();
    }

}

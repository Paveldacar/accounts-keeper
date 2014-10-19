<?php

namespace Paveldacar\AccountsKeeperBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ExpenseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExpenseRepository extends EntityRepository
{
    /**
     * @param string $month
     * @param string $year
     * @return array
     */
    public function findByMonth($month, $year){
        $queryBuilder = $this->createQueryBuilder('expense');

        $queryBuilder->where('MONTH(expense.spentAt) = :month')
            ->andWhere('YEAR(expense.spentAt) = :year')
            ->setParameter('month', $month)
            ->setParameter('year', $year);

        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }
}

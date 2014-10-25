<?php

namespace Paveldacar\AccountsKeeperBundle\Controller;

use Paveldacar\AccountsKeeperBundle\Entity\Expense;
use Paveldacar\AccountsKeeperBundle\Entity\ExpenseRepository;
use Paveldacar\AccountsKeeperBundle\Utils\DateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function seeAllAction($month, $year)
    {
        /** @var DateFormatter $dateFormatter */
        $dateFormatter = $this->get('paveldacar_accounts_keeper.date_formatter');

        $monthNumber = $dateFormatter->getMonthNumber($month);
        $month = $dateFormatter->getMonthString($month);
        $year = $dateFormatter->getYear($year);

        /** @var ExpenseRepository $repository */
        $repository = $this->getDoctrine()->getManager()->getRepository('PaveldacarAccountsKeeperBundle:Expense');
        $expenses = $repository->findByMonth($monthNumber, $year);

        $total = $repository->countTotalByMont($monthNumber, $year);

        return $this->render('PaveldacarAccountsKeeperBundle:Expense:seeAll.html.twig', [
            'month'    => $month,
            'year'     => $year,
            'expenses' => $expenses,
            'total'    => $total
        ]);
    }

    public function seeExpenseAction($id)
    {
        return $this->render('PaveldacarAccountsKeeperBundle:Expense:seeExpense.html.twig', [
            'id' => $id
        ]);
    }

    public function addAction()
    {
        $expense = new Expense();

        $form = $this->createForm('paveldacar_accountskeeperbundle_expense', $expense);

        return $this->render('PaveldacarAccountsKeeperBundle:Expense:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id)
    {
        return $this->render('PaveldacarAccountsKeeperBundle:Expense:edit.html.twig', [
            'id' => $id
        ]);
    }

    public function deleteAction($id)
    {
        $seeAllUrl = $this->get('router')->generate('paveldacar_accounts_keeper_expense_see_all');

        return $this->redirect($seeAllUrl);
    }
}

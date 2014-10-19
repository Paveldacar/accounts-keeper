<?php

namespace Paveldacar\AccountsKeeperBundle\Controller;

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

        return $this->render('PaveldacarAccountsKeeperBundle:Expense:seeAll.html.twig', [
            'month' => $month,
            'year'  => $year,
            'expenses' => $expenses
        ]);
    }

    public function seeExpenseAction($id)
    {
        $content = $this->renderView('PaveldacarAccountsKeeperBundle:Expense:add.html.twig', [
            'id' => $id
        ]);

        return new Response($content);
    }

    public function addAction()
    {
        $content = $this->renderView('PaveldacarAccountsKeeperBundle:Expense:add.html.twig', []);

        return new Response($content);
    }

    public function editAction($id)
    {
        $content = $this->renderView('PaveldacarAccountsKeeperBundle:Expense:add.html.twig', []);

        return new Response($content);
    }

    public function deleteAction($id)
    {
        $seeAllUrl = $this->get('router')->generate('paveldacar_accounts_keeper_expense_see_all');

        return $this->redirect($seeAllUrl);
    }
}

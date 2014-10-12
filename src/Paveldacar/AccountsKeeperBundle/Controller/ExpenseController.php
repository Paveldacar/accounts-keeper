<?php

namespace Paveldacar\AccountsKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function seeAllAction($month, $year)
    {
        if ($month == null) {
            $month = date('m');
        }

        $month = $month - 1;

        $months = [
            'janvier',
            'février',
            'mars',
            'avril',
            'mai',
            'juin',
            'juillet',
            'août',
            'septembre',
            'octobre',
            'novembre',
            'décembre'
        ];

        if ($year == null) {
            $year = date('Y');
        }

        $content = $this->renderView('PaveldacarAccountsKeeperBundle:Expense:seeAll.html.twig', [
            'month' => $months[$month],
            'year'  => $year
        ]);

        return new Response($content);
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

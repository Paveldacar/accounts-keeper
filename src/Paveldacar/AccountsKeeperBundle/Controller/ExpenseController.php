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

        $content = $this->get('templating')->render('PaveldacarAccountsKeeperBundle:Expense:seeAll.html.twig', [
            'month' => $months[$month],
            'year'  => $year
        ]);

        return new Response($content);
    }

    public function seeExpenseAction($id)
    {
        return new Response("Affichage de la dépense d'id : " . $id);
    }

    public function addAction()
    {
        return new Response("Cette page permettra l'ajout d'une nouvelle dépense à l'aide d'un formulaire.");
    }

    public function editAction($id)
    {
        return new Response("Cette page permettra de modifier la dépense d'id " . $id . " à l'aide d'un formulaire.");
    }

    public function deleteAction($id)
    {
        return new Response("Cette page permettra de supprimer la dépense d'id " . $id . ".");
    }
}

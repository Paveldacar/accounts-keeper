<?php

namespace Paveldacar\AccountsKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function seeAllAction()
    {
        $content = $this->get('templating')->render('PaveldacarAccountsKeeperBundle:Expense:seeAll.html.twig', [
            'month' => 'septembre',
            'user'  => 'Paul'
        ]);
        return new Response($content);
    }
}

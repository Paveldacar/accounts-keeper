<?php

namespace Paveldacar\AccountsKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaveldacarAccountsKeeperBundle:Default:index.html.twig', array('name' => $name));
    }
}

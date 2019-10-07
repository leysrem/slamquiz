<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function index()
    {

    /**
     * @Route("/",name="default")
     */

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
     * @Route("/user",name="default_user")
     */
    public function user() {

        $first_name = "LEYS";
        $last_name = "REMI";
        return $this->render('default/user.html.twig', [
            'first_name'=>$first_name,
            'last_name'=>$last_name,
        ]);
    }
}
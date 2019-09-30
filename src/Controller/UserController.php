<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/user")
 */

class UserController extends AbstractController {

/**
 * @Route("/index", name="user_index")
 */

    public function index () {
        $users_list = array();
        $users_list[0]['first_name'] = 'Michel';
        $users_list[0]['last_name'] = 'DUPOND';

        $users_list[1]['first_name'] = 'Nabil';
        $users_list[1]['last_name'] = 'nan nan';

        return $this->render('user/user.html.twig', [
            'users_list' => $users_list,
        ]);
    }
}
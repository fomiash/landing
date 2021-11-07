<?php

namespace App\Controller;


use App\Logic\ActivityLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return new Response(
            '<html><body>Landing index page</body></html>'
        );
    }

    /**
    * @Route("/admin/admin")
    */
    public function admin(): Response
    {
        $data = (new ActivityLoader())->get();

        return $this->render('admin/admin.html.twig', [
            'page' => 1,
            'limit' => 50,
            'activityData' => print_r($data, true)
        ]);
    }
}
<?php

namespace App\Controller;


use App\Logic\ActivityLoader;
use App\Logic\Pagination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingController extends AbstractController
{
    const DEFAULT_LIMIT = 50;

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
     * @Route("/admin/activity")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function admin(Request $request): Response
    {
        $page = $request->query->get('page', 1);

        $limit = self::DEFAULT_LIMIT;

        $data = (new ActivityLoader())->get($page, $limit);

        return $this->render('admin/admin.html.twig', [
            'page' => $page,
            'limit' => $limit,
            'activityData' => (new Pagination())->getData($data['result']['data'] ?? [], $page, $limit) ?? []
        ]);
    }
}


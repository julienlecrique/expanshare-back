<?php

namespace App\Controller;

use App\Entity\Expense;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

/**
 *Class DashboardComposer
 * @package App/Controller
 * @Route("/dashboard")
 */
class DefaultController extends BaseController
{
    /**
     * @Route("/", name="dashboard", methods="GET")
     * @param \Symfony\Component\HttpFoundation\Response $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response {
        $dashboard = $this->getDoctrine()->getRepository(Expense::class)
            ->findAll();

        if ($request->isXMLHttpRequest()) {
            return $this->json($dashboard);
        }
    }
}

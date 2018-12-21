<?php

namespace App\Controller;

use App\Entity\Debt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 *Class DebtComposer
 * @package App/Controller
 * @Route("/debt")
 */
class DebtController extends BaseController
{
    /**
     * @Route("/", name="debt", methods="GET")
     * @param \Symfony\Component\HttpFoundation\Response $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response {
        $debt = $this->getDoctrine()->getRepository(Debt::class)
            ->createQueryBuilder('d')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXMLHttpRequest()) {
            return $this->json($debt);
        }
    }
}

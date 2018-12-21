<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 *Class CategoryComposer
 * @package App/Controller
 * @Route("/category")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/", name="category", methods="GET")
     * @param \Symfony\Component\HttpFoundation\Response $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response {
        $category = $this->getDoctrine()->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getArrayResult();

        if ($request->isXMLHttpRequest()) {
            return $this->json($category);
        }
    }
}

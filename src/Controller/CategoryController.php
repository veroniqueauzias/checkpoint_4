<?php


namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoryController extends AbstractController
{
    /**
     * @Route ("/categories", name="categories")
     * @return Response
     */
    public function showCategories(): Response
    {
        $catetories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('categories.html.twig', [
            'categories' => $catetories
        ]);
    }
}
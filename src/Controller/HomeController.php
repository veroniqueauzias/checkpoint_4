<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        $catetories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('home.html.twig', [
            'categories' => $catetories
        ]);
    }
}
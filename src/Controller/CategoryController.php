<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CategoryController extends AbstractController
{
    /**
     * @Route ("/categories", name="categories")
     * @return Response
     */
    public function index(): Response
    {
        $catetories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('categories.html.twig', [
            'categories' => $catetories
        ]);
    }

    /**
     * @Route("/category/{id}", name="categorie")
     * @param int $id
     * @return Response
     */
    public function showCategory(int $id): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);
        if(!$category)
            throw new NotFoundHttpException('Cette catégorie n\'existe pas');

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['category' => $category], ['id'=>'desc']);

        return $this->render('category.html.twig', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }


}
<?php


namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends AbstractController
{
    /**
     * @Route ("/articles", name="articles")
     * @return Response
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        return $this->render('articlesList.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/article/{id}", name="article")
     * @param int $id
     * @return Response
     */
    public function showArticle(int $id): Response
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);
        if(!$article)
            throw new NotFoundHttpException('Cet article n\'existe pas');

        return $this->render('articles.html.twig', [
            'article' => $article,
        ]);
    }

}
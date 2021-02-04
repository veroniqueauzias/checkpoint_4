<?php


namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/articles/new", name="newArticle")
     * @return Response
     */
    public function new(Request $request) : Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('articles');


        }

        return $this->render('newArticle.html.twig', [
            "form" => $form->createView(),
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

        return $this->render('article.html.twig', [
            'article' => $article,
        ]);
    }

}
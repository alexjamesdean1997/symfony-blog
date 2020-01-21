<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{

    /**
     * @var NewsRepository
     */

    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        $articles = $this->repository->findAll();
        dump($articles);
        return $this->render('blog/home.html.twig', [
            'articles' => $articles
        ]);
    }
}

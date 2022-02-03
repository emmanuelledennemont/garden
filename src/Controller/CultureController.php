<?php

namespace App\Controller;

use App\Entity\Culture;
use App\Form\CultureType;
use Doctrine\ORM\EntityManager;
use App\Controller\CultureController;
use App\Repository\CultureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/culture", name="culture_")
 */
class CultureController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CultureRepository $cultureRepository, Request $request): Response
    {

        return $this->render('culture/index.html.twig', [
            'cultures' =>$cultureRepository->findAll(),
            
        ]);
    }

    /**
     * @Route("/{id}", name="show")
     */
    public function show(Culture $culture): Response
    {
        return $this->render('culture/show.html.twig', [
            'culture' => $culture,
        ]);
    }   

}

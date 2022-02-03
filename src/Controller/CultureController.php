<?php

namespace App\Controller;

use App\Entity\Culture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CultureType;
use Doctrine\ORM\EntityManager;
use App\Repository\CultureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/show", name="show")
     */
    public function show(Culture $culture): Response
    {
        return $this->render('culture/show.html.twig', [
            'culture' => $culture,
        ]);
    }
}

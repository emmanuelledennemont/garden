<?php

namespace App\Controller\Admin;

use App\Entity\Culture;
use App\Form\CultureType;
use App\Repository\CultureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/culture")
 */
class CultureController extends AbstractController
{
    /**
     * @Route("/", name="admin_culture_index", methods={"GET"})
     */
    public function index(CultureRepository $cultureRepository): Response
    {
        return $this->render('admin/culture/index.html.twig', [
            'cultures' => $cultureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_culture_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $culture = new Culture();
        $form = $this->createForm(CultureType::class, $culture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($culture);
            $entityManager->flush();

            return $this->redirectToRoute('admin_culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/culture/new.html.twig', [
            'culture' => $culture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_culture_show", methods={"GET"})
     */
    public function show(Culture $culture): Response
    {
        return $this->render('admin/culture/show.html.twig', [
            'culture' => $culture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_culture_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Culture $culture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CultureType::class, $culture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/culture/edit.html.twig', [
            'culture' => $culture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_culture_delete", methods={"POST"})
     */
    public function delete(Request $request, Culture $culture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$culture->getId(), $request->request->get('_token'))) {
            $entityManager->remove($culture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_culture_index', [], Response::HTTP_SEE_OTHER);
    }
}

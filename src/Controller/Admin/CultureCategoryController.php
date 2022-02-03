<?php

namespace App\Controller\Admin;

use App\Entity\CultureCategory;
use App\Form\CultureCategoryType;
use App\Repository\CultureCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/culture/category")
 */
class CultureCategoryController extends AbstractController
{
    /**
     * @Route("/", name="admin_culture_category_index", methods={"GET"})
     */
    public function index(CultureCategoryRepository $cultureCategoryRepository): Response
    {
        return $this->render('admin/culture_category/index.html.twig', [
            'culture_categories' => $cultureCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_culture_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cultureCategory = new CultureCategory();
        $form = $this->createForm(CultureCategoryType::class, $cultureCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cultureCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_culture_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/culture_category/new.html.twig', [
            'culture_category' => $cultureCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_culture_category_show", methods={"GET"})
     */
    public function show(CultureCategory $cultureCategory): Response
    {
        return $this->render('admin/culture_category/show.html.twig', [
            'culture_category' => $cultureCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_culture_category_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CultureCategory $cultureCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CultureCategoryType::class, $cultureCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_culture_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/culture_category/edit.html.twig', [
            'culture_category' => $cultureCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_culture_category_delete", methods={"POST"})
     */
    public function delete(Request $request, CultureCategory $cultureCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cultureCategory->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cultureCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_culture_category_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Form\ActuType;
use App\Repository\ActuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/actu")
 */
class ActuController extends AbstractController
{
    /**
     * @Route("/", name="actu_index", methods={"GET"})
     */
    public function index(ActuRepository $actuRepository): Response
    {
        return $this->render('actu/index.html.twig', [
            'actus' => $actuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="actu_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actu = new Actu();
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actu);
            $entityManager->flush();

            return $this->redirectToRoute('actu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('actu/new.html.twig', [
            'actu' => $actu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{slug}", name="actu_show", methods={"GET"})
     */
    public function show(Actu $actu): Response
    {
        return $this->render('actu/show.html.twig', [
            'actu' => $actu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actu_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Actu $actu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('actu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('actu/edit.html.twig', [
            'actu' => $actu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="actu_delete", methods={"POST"})
     */
    public function delete(Request $request, Actu $actu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($actu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('actu_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Articulo;
use App\Form\ArticuloType;
use App\Repository\ArticuloRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controlador CRUD para la entidad Articulo.
 *
 * @package App\Controller
 */
#[Route('/articulo')]
final class ArticuloController extends AbstractController
{
    /**
     * Muestra el listado de artículos.
     *
     * @param ArticuloRepository $articuloRepository Repositorio de artículos
     * @return Response Vista con el listado
     */
    #[Route(name: 'app_articulo_index', methods: ['GET'])]
    public function index(ArticuloRepository $articuloRepository): Response
    {
        return $this->render('articulo/index.html.twig', [
            'articulos' => $articuloRepository->findAll(),
        ]);
    }

    /**
     * Crea un nuevo artículo.
     *
     * @param Request $request Petición HTTP
     * @param EntityManagerInterface $entityManager Gestor de entidades
     * @return Response Formulario o redirección
     */
    #[Route('/new', name: 'app_articulo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $articulo = new Articulo();
        $form = $this->createForm(ArticuloType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articulo);
            $entityManager->flush();

            return $this->redirectToRoute('app_articulo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('articulo/new.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    /**
     * Muestra un artículo concreto.
     *
     * @param Articulo $articulo Artículo a mostrar
     * @return Response Vista del artículo
     */
    #[Route('/{id}', name: 'app_articulo_show', methods: ['GET'])]
    public function show(Articulo $articulo): Response
    {
        return $this->render('articulo/show.html.twig', [
            'articulo' => $articulo,
        ]);
    }

    /**
     * Edita un artículo existente.
     *
     * @param Request $request Petición HTTP
     * @param Articulo $articulo Artículo a editar
     * @param EntityManagerInterface $entityManager Gestor de entidades
     * @return Response Formulario o redirección
     */
    #[Route('/{id}/edit', name: 'app_articulo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Articulo $articulo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticuloType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_articulo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('articulo/edit.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    /**
     * Elimina un artículo.
     *
     * @param Request $request Petición HTTP
     * @param Articulo $articulo Artículo a eliminar
     * @param EntityManagerInterface $entityManager Gestor de entidades
     * @return Response Redirección al listado
     */
    #[Route('/{id}', name: 'app_articulo_delete', methods: ['POST'])]
    public function delete(Request $request, Articulo $articulo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articulo->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($articulo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_articulo_index', [], Response::HTTP_SEE_OTHER);
    }
}
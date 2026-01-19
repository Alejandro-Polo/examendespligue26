<?php

namespace App\Controller;

use App\Repository\ArticuloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controlador API de Artículos
 * Expone los artículos en formato JSON para consumo externo (React).
 * 
 * @package App\Controller
 */
#[Route('/api/articulos', name: 'api_articulos_')]
class ApiArticuloController extends AbstractController
{
    /**
     * Devuelve un listado de artículos en formato JSON.
     *
     * @param ArticuloRepository $articuloRepository Repositorio de artículos
     * @return JsonResponse Respuesta JSON con los datos de los artículos
     */
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(ArticuloRepository $articuloRepository): JsonResponse
    {
        $articulos = $articuloRepository->findAll();

        $data = [];

        foreach ($articulos as $articulo) {
            $data[] = [
                'id' => $articulo->getId(),
                'nombre' => $articulo->getNombre(),
                'descripcion' => $articulo->getDescripcion(),
                'foto' => $articulo->getFoto(),
                'precio' => $articulo->getPrecio(),
                'valoracion' => $articulo->getValoracion(),
            ];
        }

        return $this->json($data);
    }
}

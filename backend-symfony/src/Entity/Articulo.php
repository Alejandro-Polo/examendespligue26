<?php

namespace App\Entity;

use App\Repository\ArticuloRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entidad Articulo
 * Representa un artículo de la tienda.
 *
 * @package App\Entity
 */
#[ORM\Entity(repositoryClass: ArticuloRepository::class)]
class Articulo
{
    /**
     * Identificador único del artículo.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * Nombre del artículo.
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

     /**
     * URL del archivo de la foto.
     *
     * @var string|null
     */
    #[ORM\Column(length: 255)]
    private ?string $foto = null;

    /**
     * Descripción del artículo.
     *
     * @var string|null
     */
    #[ORM\Column(type: Types::TEXT)]
    private ?string $descripcion = null;

    /**
     * Precio del artículo.
     *
     * @var int|null
     */
    #[ORM\Column]
    private ?int $precio = null;

    /**
     * Valoración del artículo.
     *
     * @var int|null
     */
    #[ORM\Column]
    private ?int $valoracion = null;

    /**
     * Obtiene el identificador del artículo.
     *
     * @return int|null Identificador único del artículo
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre del artículo.
     *
     * @return string|null Nombre del artículo
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * Establece el nombre del artículo.
     *
     * @param string $nombre Nombre del artículo
     * @return static Devuelve la instancia actual
     */
    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Obtiene la foto del artículo.
     *
     * @return string|null URL o nombre del archivo de la foto
     */
    public function getFoto(): ?string
    {
        return $this->foto;
    }

    /**
     * Establece la foto del artículo.
     *
     * @param string $foto URL o nombre del archivo de la foto
     * @return static Devuelve la instancia actual
     */
    public function setFoto(string $foto): static
    {
        $this->foto = $foto;

        return $this;
    }

     /**
     * Obtiene la descripción del artículo.
     *
     * @return string|null Descripción del artículo
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * Establece la descripción del artículo.
     *
     * @param string $descripcion Descripción del artículo
     * @return static Devuelve la instancia actual
     */
    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

     /**
     * Obtiene el precio del artículo.
     *
     * @return int|null Precio del artículo
     */
    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    /**
     * Establece el precio del artículo.
     *
     * @param int $precio Precio del artículo
     * @return static Devuelve la instancia actual
     */
    public function setPrecio(int $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Obtiene la valoración del artículo.
     *
     * @return int|null Valoración del artículo
     */
    public function getValoracion(): ?int
    {
        return $this->valoracion;
    }

    /**
     * Establece la valoración del artículo.
     *
     * @param int $valoracion Valoración del artículo
     * @return static Devuelve la instancia actual
     */
    public function setValoracion(int $valoracion): static
    {
        $this->valoracion = $valoracion;

        return $this;
    }
}

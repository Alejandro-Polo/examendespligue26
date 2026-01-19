import { useEffect, useState } from "react";
import { getArticulos } from "../services/api";

/**
 * Componente que muestra una lista de artículos obtenidos desde la API.
 *
 * Realiza una llamada al backend al cargarse el componente y renderiza
 * una tarjeta por cada artículo recibido.
 *
 * @component
 * @returns {JSX.Element} Lista de artículos en formato tarjetas
 */
export default function ListaArticulos() {
  /**
   * Estado que almacena la lista de artículos.
   * @type {Object[]}
   */
  const [articulos, setArticulos] = useState([]);
  /**
   * Estado que almacena el mensaje de error.
   * @type {(string|null)}
   */
  const [error, setError] = useState(null);

  /**
   * Efecto que se ejecuta al montar el componente.
   * Obtiene los artículos desde la API.
   */
  useEffect(() => {
    getArticulos()
      .then(setArticulos)
      .catch((err) => setError(err.message));
  }, []);

  if (error) return <p className="text-danger text-center">{error}</p>;

  return (
    <div className="row mt-4">
      {articulos.map((a) => (
        <div key={a.id} className="col-md-4 mb-4">
          <div className="card h-100 shadow-sm">
            <img src={a.foto} className="card-img-top" alt={a.nombre} />
            <div className="card-body">
              <h5 className="card-title">{a.nombre}</h5>
              <p className="card-text">{a.descripcion}</p>
              <div className="d-flex justify-content-between align-items-center">
                <span className="fw-bold text-primary">{a.precio} €</span>
                <span>{"⭐".repeat(a.valoracion)}</span>
              </div>
            </div>
          </div>
        </div>
      ))}
    </div>
  );
}

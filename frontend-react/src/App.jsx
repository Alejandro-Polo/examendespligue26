import ListaArticulos from "./assets/components/ListaArticulos";

/**
 * Componente raíz de la aplicación React.
 *
 * Se encarga de estructurar la aplicación y mostrar el listado
 * de artículos obtenido desde el backend Symfony.
 *
 * @component
 * @returns {JSX.Element} Estructura principal de la aplicación
 */
export default function App() {
  return (
    <div className="container py-4">
      <h1 className="text-center text-primary mb-4">🛍️ Tienda React + Symfony (Bootstrap)</h1>
      <ListaArticulos />
    </div>
  );
}

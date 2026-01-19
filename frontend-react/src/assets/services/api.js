/**
 * URL base de la API de artículos.
 *
 * @constant {string}
 */
const API_URL = "http://localhost:8000/api/articulos";

/**
 * Obtiene la lista de artículos desde la API backend.
 *
 * @async
 * @function getArticulos
 * @returns {Promise<Array<Object>>} Promesa con la lista de artículos
 * @throws {Error} Si la respuesta HTTP no es correcta
 *
 * @example
 * getArticulos().then(articulos => console.log(articulos));
 */
export async function getArticulos() {
  const response = await fetch(API_URL);
  if (!response.ok) throw new Error("Error al obtener los artículos");
  return await response.json();
}
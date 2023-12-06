# C4-Relations

Ejemplo practico para comprender como se lleva adelante la codificación para diversos escenarios de relaciones en base de datos, dado un esquema relacional.

## Requisitos

- [CodeIgniter](https://codeigniter.com/) (Versión 4.x)
- [PHP](https://www.php.net/) (Versión 7.4.x)

## Instalación

1. Clona el repositorio: `git clone https://github.com/fmontenegro0510/c4-relations.git`
2. Configura la base de datos en `application/config/database.php` o desde el archivo .env
3. Ejecuta el script de la base de datos ubicado en `sql/database.sql`, o corre las migraciones.
4. Inicia el servidor: `php spark serve` (o utiliza tu servidor web favorito).

## Estructura del Proyecto

- `application/`: Contiene los archivos de la aplicación CodeIgniter.
  - `controllers/`: Controladores de la aplicación.
  - `models/`: Modelos de la aplicación.
  - `views/`: Vistas de la aplicación.
- `sql/`: Scripts SQL para la configuración de la base de datos.
- `assets/`: Archivos estáticos como CSS, JavaScript, etc.
- `system/`: Archivos del sistema de CodeIgniter.

## Configuración

- Ajusta la configuración de la base de datos en `application/config/database.php`, o en el apartado database del archivo .env
- Otros ajustes de configuración pueden encontrarse en `application/config/config.php` y `application/config/autoload.php`, o en el archivo .env

## Relaciones

El proyecto utiliza las siguientes relaciones entre entidades:

- Usuario (User) tiene un perfil (Profile) con una relación uno a uno.
- Departamento (Department) tiene varios empleados (Employee) con una relación uno a muchos.
- Curso (Course) tiene varios estudiantes (Student) con una relación uno a muchos.

Asegúrate de consultar el modelo UML, el cual se encuentra en la carpeta, docs del proyecto. O tambien podes verla a continuacion:
![ModeloUML](https://github.com/fmontenegro0510/c4-relations/assets/8129084/de9a6637-7343-4120-9877-73cb898a9ea6)

## Uso de Rutas

Las rutas principales de la aplicación son:

- `/users`: Listado de usuarios.
- `/users/view/{id}`: Ver detalles de un usuario específico.
- `/users/create`: Crear un nuevo usuario.
- `/users/edit/{id}`: Editar un usuario existente.

- `/departments`: Listado de departamentos.
- `/departments/view/{id}`: Ver detalles de un departamento específico.
- `/departments/create`: Crear un nuevo departamento.
- `/departments/edit/{id}`: Editar un departamento existente.

- `/courses`: Listado de cursos.
- `/courses/view/{id}`: Ver detalles de un curso específico.
- `/courses/create`: Crear un nuevo curso.
- `/courses/edit/{id}`: Editar un curso existente.
- `/courses/students/{id}`: Ver estudiantes matriculados en un curso.

## Contribuciones

Si deseas contribuir al proyecto, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama: `git checkout -b feature/nueva-funcionalidad`
3. Realiza tus cambios y haz un commit: `git commit -am 'Añade nueva funcionalidad'`
4. Haz push a la rama: `git push origin feature/nueva-funcionalidad`
5. Envía un pull request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE.md](LICENSE.md) para más detalles.

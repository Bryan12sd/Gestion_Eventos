# Sistema de Gestión de Eventos

Este proyecto es una aplicación web desarrollada en PHP y MySQL utilizando XAMPP. El sistema permite gestionar eventos, contactos y ubicaciones, ofreciendo una interfaz intuitiva y funcional para los usuarios.

## Características

### Funcionalidades Principales

1. **Autenticación de Usuarios**

   - Inicio de sesión seguro.
   - Registro de nuevos usuarios.

2. **Gestión de Eventos**

   - Visualización de eventos organizados.
   - Creación de nuevos eventos con detalles como título, fecha, lugar y descripción.

3. **Gestión de Ubicaciones**

   - Visualización de ubicaciones registradas.
   - Registro de nuevas ubicaciones para eventos.

4. **Gestión de Contactos**

   - Visualización de contactos asociados.
   - Creación de nuevos contactos con detalles como nombre, correo electrónico y fotografía.

5. **Cierre de Sesión**
   - Opción segura para cerrar la sesión del usuario.

### Cumplimiento de Normas de HCI

El sistema ha sido diseñado siguiendo principios de Interacción Humano-Computadora (HCI) para garantizar:

- Navegación clara y coherente.
- Interfaz intuitiva y amigable.
- Retroalimentación en tiempo real.
- Compatibilidad con dispositivos móviles.

## Requisitos

- **Servidor Local:** XAMPP (PHP 7.4+ y MySQL).
- **Navegador Web:** Compatible con Chrome, Firefox, Edge o similares.
- **Sistema Operativo:** Windows, Linux o macOS.

## Instalación

1. Clonar el repositorio en tu máquina local:
   ```bash
   git clone https://github.com/Bryan12sd/Gestion_Eventos.git
   ```

## Configuración del Entorno

1. **Mover la carpeta del proyecto:**

   - Copiar la carpeta del proyecto al directorio `htdocs` de XAMPP.

2. **Configurar la base de datos:**
   - Editar el archivo `db/config.php` y actualizar las credenciales de la base de datos según tu configuración local.

## Importar la Base de Datos

1. **Acceder a phpMyAdmin:**

   - Abrir phpMyAdmin desde el navegador (`http://localhost/phpmyadmin`).

2. **Crear una nueva base de datos:**

   - Ingresar el nombre de la base de datos y seleccionarlo.

3. **Importar las tablas necesarias:**
   - Hacer clic en la pestaña `Importar`.
   - Seleccionar el archivo `db/schema.sql` del proyecto.
   - Hacer clic en `Continuar`.

## Iniciar el Servidor

1. **Abrir el Panel de Control de XAMPP:**

   - Ejecutar el Panel de Control de XAMPP.

2. **Iniciar los servicios de Apache y MySQL:**
   - Hacer clic en `Start` para ambos servicios.

## Acceder a la Aplicación

1. **Abrir el navegador:**
   - Ingresar la URL: `http://localhost/sistema-gestion-eventos`.

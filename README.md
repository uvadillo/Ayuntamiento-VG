# Permisos y Obras para el Ayuntamiento de Vitoria-Gasteiz
<p align="center">
  <img src="https://github.com/uvadillo/Ayuntamiento-VG/blob/master/public/img/logo%20degradado.png">
</p>

# Reto 3 📋

Vuestro tercer y último cliente es el ayuntamiento de Vitoria-Gasteiz que quiere
digitalizar los procedimientos relacionados con la tramitación de permisos de obra. Para ello
ha pensado que la mejor forma es realizar el desarrollo de una aplicación web.
Cuando una persona quiere realizar una obra, debe realizar una solicitud al ayuntamiento
indicando los siguientes datos:
- Datos del solicitante: nombre, apellidos, DNI, fecha y lugar de nacimiento, dirección
postal donde reside(calle, número, piso, mano, código postal, población, municipio,
provincia), email y teléfono de contacto.
- Datos de la obra:
    - Tipo de edificio: piso, casa, local, garaje, trastero, edificio
    - Tipo de obra: nueva construcción, reforma
    - Lugar (calle, número, piso, mano, código postal, población, municipio,
provincia)
    - Fecha de inicio y fin
    - Descripción de la obra
    - Plano en formato JPG, PNG o PDF
 
 
Cualquier usuario que quiera hacer la solicitud tendrá que darse de alta en la aplicación con
los datos de solicitante mencionados anteriormente. Una vez el usuario se ha dado de alta,
deberá crear la solicitud, la cuál se registrará y quedará pendiente de resolución. También
podrá acceder en cualquier momento a la aplicación para realizar nuevas solicitudes o
consultar el estado de las realizadas anteriormente (creada, pendiente de resolución,
denegada o autorizada).
Por parte del ayuntamiento, participan dos tipos de trabajadores distintos:
- Coordinador: su labor principal es la de recibir las solicitudes de los usuarios y
asignárselas a un técnico, pudiendo cambiar el técnico asignado a una solicitud en
cualquier momento (por ejemplo, cuando un técnico está de baja). Para realizar su
tarea de forma eficiente, necesita disponer de datos, gráficas y estadísticas que de
una forma visual le muestren aspectos como (número de solicitudes recibidas por
periodos, por tipo, por estado, carga de trabajo de cada técnico, etc.). El coordinador
también puede consultar toda la información de solicitantes, técnicos, detalle de las
solicitudes e inspecciones. Desde el Ayuntamiento quieren también que los
coordinadores sean los encargados de dar de alta técnicos y otros coordinadores en
la aplicación.
- Técnico: cuando le asignan una solicitud, la analiza, se desplaza al lugar de la obra si
fuese necesario y la resuelve (autorizar o denegar). A la hora de hacer la resolución,
puede ir añadiendo comentarios (resolver una solicitud puede llevarle semanas, por lo
que cada comentario que añada tiene registrar la fecha, el técnico que lo realiza, texto
e incluso les parecería interesante que se pudiese adjuntar al menos una fotografía).
Puede consultar los datos de los usuarios y solicitudes .
Una característica comentan que puede ser útil, aunque no imprescindible, es poder
visualizar en un mapa las solicitudes, para que así el coordinador a la hora de asignar el
técnico pueda tener en cuenta la localización de cada obra


## Herramientas 🛠️
Framework:
* [Laravel](https://laravel.com/)
    * [Blade](https://laravel.com/docs/8.x/blade)

La interfaz gráfica utilizada:
* [Visual Studio Code](https://code.visualstudio.com/) 
+ [PhpStorm](https://www.jetbrains.com/es-es/phpstorm/) 

Organizacion:
* [Slack](https://slack.com/intl/es-es/)
* [Trello](https://trello.com/es)

Servidor web:
* [Heroku app](https://www.heroku.com/)

Base de datos:
* [Google cloud](https://cloud.google.com/products/databases)
* [ClearDB MySQL / Heroku](https://www.cleardb.com/)

Plantilla:
* [Plantilla bootstrap](https://startbootstrap.com/theme/sb-admin-2)

Librerias:

* [JQuery](https://jquery.com/)
* [Bootstrap](https://getbootstrap.com/)
* [ChartJS](https://www.chartjs.org/)
* [Modo Oscuro](https://coliff.github.io/dark-mode-switch/)
* [Lugares](https://community.algolia.com/places/)
* [Mapa](https://leafletjs.com/)

Lenguaje de extension:
* [Sass](https://sass-lang.com/)

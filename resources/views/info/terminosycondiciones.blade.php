
    <!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
    @extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')

<main class="main">




<style>

.container2 {
    background-color: #ffffff; /* Fondo blanco para simular la hoja */
    width: 210mm; /* Ancho de una hoja A4 */
    min-height: 297mm; /* Altura de una hoja A4 */
    padding: 20mm; /* Márgenes internos */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para simular elevación */
    border: 1px solid #cccccc; /* Borde sutil */
    border-radius: 5px; /* Bordes ligeramente redondeados */
}

.container2 h2 {
    font-size: 24px;
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 20px;
    color: #333;
}

.container2 h3 {
    font-size: 18px;
    margin-top: 20px;
    margin-bottom: 10px;
    color: #444;
    border-bottom: 1px solid #ccc; /* Línea decorativa debajo del título */
    padding-bottom: 5px;
}

.container2 p,
.container2 li {
    font-size: 14px;
    line-height: 1.6;
    color: #333;
}

.container2 ul {
    margin-left: 20px; /* Sangría para listas */
    padding-left: 0;
}

.container2 li {
    margin-bottom: 10px; /* Espaciado entre elementos de la lista */
}

.container2 a {
    color: #0078d7; /* Color azul típico de enlaces en Word */
    text-decoration: none;
}

.container a:hover {
    text-decoration: underline;
}
</style>

<section class="container container2">
   <h2> Términos y Condiciones</h2>
   <h3>1. Introducción</h3>
   <p>
       Bienvenido al sitio web del Instituto Superior Tecnológico [Nombre del Instituto]. Este sitio web tiene como propósito proporcionar información oficial sobre la institución, sus programas educativos, servicios y actividades. Al acceder y utilizar este sitio, usted acepta cumplir con los presentes términos y condiciones.
   </p>
   <h3>2. Propósito del Sitio</h3>
   <ul>
       <li>Informar sobre los programas académicos ofrecidos.</li>
       <li>Facilitar el acceso a recursos educativos y administrativos.</li>
       <li>Promover las actividades y eventos institucionales.</li>
   </ul>
   <h3>3. Uso Aceptable</h3>
   <ul>
       <li>Usar este sitio únicamente para fines legales y educativos.</li>
       <li>No realizar acciones que puedan comprometer la seguridad del sitio, como la introducción de virus, intentos de hackeo o uso indebido de los recursos tecnológicos.</li>
       <li>No distribuir contenido inapropiado, ofensivo o ilegal a través de las plataformas ofrecidas por el sitio.</li>
   </ul>
   <h3>4. Propiedad Intelectual</h3>
   <p>
       Todo el contenido publicado en este sitio, incluyendo textos, imágenes, logotipos, gráficos, videos y documentos, es propiedad exclusiva del Instituto Superior Tecnológico [Nombre del Instituto], salvo que se indique lo contrario. Está prohibida su reproducción, distribución o modificación sin autorización previa y por escrito de la institución.
   </p>
   <h3>5. Enlaces Externos</h3>
   <p>
       Este sitio puede incluir enlaces a sitios web externos para fines informativos. El Instituto no se responsabiliza por el contenido, la precisión o la disponibilidad de dichos sitios. El acceso a estos enlaces es bajo su propio riesgo.
   </p>
   <h3>6. Protección de Datos Personales</h3>
   <p>
       El Instituto respeta la privacidad de los usuarios y cumple con las normativas locales sobre protección de datos. La información personal recopilada a través del sitio será utilizada únicamente para fines administrativos, educativos o de comunicación institucional. Para más información, consulte nuestra <a href="#">[Política de Privacidad]</a>.
   </p>
   <h3>7. Limitación de Responsabilidad</h3>
   <ul>
       <li>Errores o inexactitudes en la información publicada.</li>
       <li>Daños ocasionados por el uso del sitio web o por la imposibilidad de acceder al mismo.</li>
       <li>Cualquier interrupción o problema técnico en el servicio del sitio.</li>
   </ul>
   <h3>8. Modificaciones en los Términos y Condiciones</h3>
   <p>
       El Instituto se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Las modificaciones serán publicadas en este sitio, y su uso continuado implica la aceptación de los cambios.
   </p>
   <h3>9. Legislación Aplicable</h3>
   <p>
       Estos términos y condiciones se rigen por las leyes vigentes de Ecuador. Cualquier controversia será resuelta en los tribunales competentes de Esmeraldas/San Lorenzo.
   </p>
   <h3>10. Contacto</h3>
   <p>
       Para consultas relacionadas con estos términos y condiciones, puede contactarnos a través de:<br>
       Correo electrónico: <a href="mailto:secretariageneralistae@gmail.com">secretariageneralistae@gmail.com</a><br>
       Teléfono: [0996566160]<br>
       Dirección: AV. Carchi, Instalaciones de la Unidad educativa Fiscomisional San Lorenzo
   </p>
</section>











  </main>



@endsection

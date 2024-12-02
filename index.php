<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login con  PHP - Bootstrap 4</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="assets/Stylem1.css">
        <link rel="stylesheet" href="assets/StyleM2.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
    <header id="header">
  <section class="price">   
    <ul><a href="#modal1" class="price__cta">Términos y Condiciones</a></ul>
    <ul><a href="#modal2" class="price__cta">Contáctenos</a></ul>
    <ul><a href="#modal3" class="price__cta">Acerca De</a></ul>

    <div class="modals-container"> <!-- Contenedor de las modales -->
      <!-- Modal 1 -->
      <div id="modal1" class="modalmask">
        <div class="modalbox movedown">
          <a href="#close" title="Close" class="close">X</a>
          <div class="wrapper">
            <header>Stock Control</header>
            <section>
              <div class="content content-1">
                <div class="title">Políticas de Privacidad<br><br>
                Fecha de última actualización: 2/12/2024</div>
                <p><br><br>
1. Introducción
Bienvenido a Stock Control. Estamos comprometidos a proteger la privacidad de nuestros usuarios y asegurar la confidencialidad de la información que recopilamos. Esta Política de Privacidad explica cómo recopilamos, utilizamos y protegemos tu información cuando usas nuestra plataforma de gestión de inventarios.
<br><br>
2. Información que Recopilamos
Recopilamos los siguientes tipos de información:
Información Personal: Esto incluye tu nombre, dirección de correo electrónico y cualquier otra información que proporciones al registrarte en nuestra plataforma.
Información de la Empresa: Incluye detalles de tu empresa, como nombre, dirección, datos fiscales y otros datos relacionados con el negocio.
Datos del Inventario: Registramos los detalles de los productos, inventario disponible, precios, proveedores y otros datos relacionados con la gestión de inventarios.
Información de Uso: Información sobre cómo utilizas nuestra plataforma, como las funciones que accedes y la frecuencia de uso.
<br><br>
3. Uso de la Información
Utilizamos tu información para los siguientes fines:
<br><br>
Operación de la Plataforma: Para permitirte gestionar tus inventarios, actualizar registros y realizar otras actividades relacionadas con la administración de inventarios.
Soporte al Cliente: Para brindarte asistencia y soporte técnico en caso de problemas.
Mejora de los Servicios: Para analizar patrones de uso y mejorar la funcionalidad y la experiencia del usuario en nuestra plataforma.
Comunicación: Para enviarte actualizaciones, notificaciones y otra información relevante a tu cuenta y uso de nuestra plataforma.
<br><br>
4. Compartición de Información
No compartimos tu información personal con terceros, excepto en los siguientes casos:
<br><br>
Proveedores de Servicios: Trabajamos con empresas que nos proporcionan servicios tecnológicos, como almacenamiento de datos y análisis, y les proporcionamos acceso a la información solo en la medida necesaria para prestar sus servicios.
Obligaciones Legales: Podemos compartir información cuando sea requerido por la ley o en respuesta a un proceso legal, orden judicial u otra solicitud gubernamental.
<br><br>
</p>
              </div>
            </section>
          </div>
        </div>
      </div>

      <!-- Modal 2 -->
      <div id="modal2" class="modalmask">
        <div class="modalbox movedown">
          <a href="#close" title="Close" class="close">X</a>
          <div class="wrapper">
            <header>Stock Control</header>
            <section>
              <div class="content content-2">
                <div class="title">Contáctenos</div>
                
Correo: StockControl24091@gmail.com
<br><br>
WhatsApp: +573127070540
<br><br>
Fijo: 5001-0720-24
<br><br>
Instagram: @StockControl24
<br><br></p>
              </div>
            </section>
          </div>
        </div>
      </div>

      <!-- Modal 3 -->
      <div id="modal3" class="modalmask">
        <div class="modalbox movedown">
          <a href="#close" title="Close" class="close">X</a>
          <div class="wrapper">
            <header>Stock Control</header>
            <section>
              <div class="content content-3">
                <div class="title">Acerca De</div>
                <p>Stock Control es una solución integral de gestión de inventario diseñada para facilitar el control y
                   administración de los productos en almacenes y centros de distribución. Este sistema permite a los  usuarios llevar un seguimiento preciso de las existencias.
                   <br><br>
                  Alertas de reabastecimiento: Notificaciones automáticas cuando los niveles de stock alcanzan un 
                  umbral mínimo, evitando rupturas de stock y mejorando la planificación de compras.
                  <br><br>
                  Seguimiento en tiempo real: Monitoreo constante de entradas y salidas de productos, ofreciendo una
                   visión actualizada del inventario en cualquier momento.
                   <br><br>
                  Stock Control es ideal para empresas que buscan mejorar la eficiencia operativa, minimizar pérdidas y optimizar el espacio de almacenamiento,
                   adaptándose a las necesidades de distintos sectores como el comercio minorista, la manufactura y la distribución.
".</p>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div> <!-- Fin del contenedor de modales -->
  </section>
</header>
      <div class="container-login">
          <div class="wrap-login">
              <form class="login-form validate-form" id="formLogin" action="" method="post">
                  <span class="login-form-title">Stock Control</span>
                  
                  <div class="wrap-input100" data-validate = "Usuario incorrecto">
                      <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                      <span class="focus-efecto"></span>
                  </div>
                  
                  <div class="wrap-input100" data-validate="Password incorrecto">
                      <input class="input100" type="password" id="password" name="password" placeholder="Password">
                      <span class="focus-efecto"></span>
                  </div>
                  
                  <div class="container-login-form-btn">
                      <div class="wrap-login-form-btn">
                          <div class="login-form-bgbtn"></div>
                          <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>     
        
        
      <script src="jquery/jquery-3.3.1.min.js"></script>    
      <script src="bootstrap/js/bootstrap.min.js"></script>    
      <script src="popper/popper.min.js"></script>    
      <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
      <script src="codigo.js"></script>    
    </body>
</html>

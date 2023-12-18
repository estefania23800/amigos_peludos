<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\View\css\index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Nuestros Peludos</title>
</head>

<body>
    <header>
        <div class="bg-image container-header" style="background-image: url('../View/img/hero8.webp');">
            <div class="row justify-content-between p-0 m-0 navbar">
                <div class="col-auto mt-1">
                    <a href="../Controller/index.php" style="text-decoration: none;">AMIGOS PELUDOS</a>
                </div>
                <div class="col-auto">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">

                                        <?php
                                        if (isset($_SESSION['session'])) {
                                        ?>
                                            <li class="nav-item">
                                                <a class="nav-link active fw-bold mx-2" aria-current="page" href="../Controller/MisMascotas.php">Mis Mascotas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active fw-bold mx-2" aria-current="page" href="../Controller/Solicitudes.php">Solicitudes</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <li class="nav-item">
                                            <a class="nav-link active fw-bold mx-2" aria-current="page" href="../Controller/Peludos.php">Peludos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active fw-bold mx-2" aria-current="page" href="../Controller/Conocenos.php">Conócenos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active fw-bold mx-2" aria-current="page" href="../Controller/Contactanos.php">Contáctanos</a>
                                        </li>
                                        <?php

                                        if (isset($_SESSION['session'])) {
                                        ?>
                                            <li class="nav-item">
                                            <a href="../Controller/logout.php"><button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#InicioModal" type="button">Cerrar Sesión</button></a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <!-- login -->
                                            <li class="nav-item">
                                                <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#InicioModal" type="button">Inicia Sesión</button>
                                                <div class="modal fade formulario-modal" id="InicioModal" tabindex="-1" aria-labelledby="IncioModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="InicioModalLabel">Inicio Sesión
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body fomulario-modal d-flex justify-content-center">
                                                                <form action="..\Controller\sesion.php" method="POST">
                                                                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                                                                    <br>
                                                                    <input type="password" id="clave" name="clave" placeholder="Contraseña" required>
                                                                    <br>
                                                                    <input type="submit" id='login' value="Acceder">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- registro -->
                                            <li class="nav-item">
                                                <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#RegistroModal" type="button">Regístrate</button>
                                                <div class="modal fade formulario-modal" id="RegistroModal" tabindex="-1" aria-labelledby="RegistroModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="RegistroModalLabel">Regístrate
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body fomulario-modal d-flex justify-content-center">
                                                                <form action="../Controller/Añadir Usuario.php" method="POST">
                                                                    <input type="text" id="nombre" name="nombre" placeholder="Usuario" required>
                                                                    <br>
                                                                    <input type="email" id="email" name="email" placeholder="Email" required>
                                                                    <br>
                                                                    <input type="password" id="clave" name="clave" placeholder="Contraseña" required>
                                                                    <br>
                                                                    <input type="tel" id="telefono" placeholder="Teléfono" name="telefono" required>
                                                                    <br>
                                                                    <input type="text" id="localidad" placeholder="Localización" name="localidad" required>
                                                                    <br>
                                                                    <label for="rol">Tipo Usuario:</label>
                                                                    <select id="rol" name="rol" required>
                                                                        <option value="1">Usuario</option>
                                                                        <option value="2">Protectora</option>
                                                                    </select>
                                                                    <br>
                                                                    <input type="submit" value="Acceder">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="Text-Hero p-5 d-flex align-items-end fw-bold">
                <h1>Nos alegramos de verte de nuevo, <b><?php echo $_SESSION['session']->getNombreUsuario() ?> </b>
                    ¿Revisando solicitudes?
                </h1>
            </div>
        </div>
    </header>
    <main>
        <div class="tablaP w-100">
            <h1 class="ps-5 mt-3 fs-1">Nuevo Peludo</h1>
            <div class="NuevoPeludo-formulario w-100">
                <form class="w-75 mt-4 m-auto mb-5" action="../Controller/Añadir Mascota.php" method="POST" enctype="multipart/form-data">
                    <div class="NuevoPeludo-formulario-div p-5">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Nombre*</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="Nombre">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3 mt-3">
                                <label class="form-label">Edad*</label>
                                <input type="text" id="edad" name="edad" class="form-control" aria-describedby="edad">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Tiempo*</label>
                                <select class="form-select" aria-label="Select tiempo" id="tiempo" name="tiempo">
                                    <option value="Meses">Meses</option>
                                    <option value="Años">Años</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Sexo*</label>
                                <select class="form-select" aria-label="Select sexo" id="sexo" name="sexo">
                                    <option value="Hembra">Hembra</option>
                                    <option value="Macho">Macho</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="">Tamaño*</label>
                                <select class="form-select" aria-label="Select tamaño" id="tamaño" name="tamaño">
                                    <option value="Pequeño">Pequeño</option>
                                    <option value="Mediano">Mediano</option>
                                    <option value="Grande">Grande</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="">Tipo*</label>
                                <select class="form-select" aria-label="Select tipo" id="tipo" name="tipo">
                                    <option value="Perro">Perro</option>
                                    <option value="Gato">Gato</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Subir Imagen*</label>
                            <input type="file" id="imagen" name="imagen" required>
                        </div>
                    </div>
                    <div class="NuevoPeludo-formulario-Submit w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg mt-3">Confirmar</button>
                    </div>
                </form>
            </div>

            <!-- PAGINACION -->
        </div>
        <div class="frase-Pie p-5 d-flex align-items-end fw-bold justify-content-center">
            <h1>¡Estamos deseando conocer al nuevo integrante!</h1>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="footer-logo-datos">
                <div class="footer-logo"><img src="../View/img/logo.webp" alt=""></div>
                <div class="footer-datos ms-4">
                    <h3><b>Fundación Amigos Peludos</b></h3>
                    <h6>Inventada, Nº 77 <br>
                        Código Postal, 12345</h6>
                </div>
            </div>
            <div class="footer-RRSS me-5">
                <h3><b>Síguenos</b></h3>
                <div class="footer-RRSS-iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
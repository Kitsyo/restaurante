<body>
    <div class="rounded container reg-principal d-flex justify-content-center">
        <div class="row d-flex align-content-center">
            <div class="col d-none d-md-block">
                <div class="d-flex justify-content-center align-content-center">
                    <h3 class="reg-st mt-1">Escoja una opción para entrar</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center mt-4">
                    <a href="#" class="cod-acc">Recibir código de acceso por e-mail</a>
                </div>
                <div class="d-flex justify-content-center align-content-center mt-4">
                    <a href="<?=url."?controller=producto&action=inicioUser"?>" class="cod-acc">Entrar con e-mail y contraseña</a>
                </div>
            </div>
            <div class="col">
                <h3 class="reg-st d-flex justify-content-center mt-1">Registrate</h3>
                        <form method="post">
                            <div class="d-flex justify-content-center align-items-center ms-4 mt-4">
                                <label for="exampleFormControlInput1" class="form-label" ></label>
                                <input class="long-inp" type="text" name="correo" class="form-control" id="exampleFormControlInput1" placeholder="  Ej.:ejemplo@gmail.com">
                            </div>
                            <div class="ms-4">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input class="long-inp" placeholder="Contraseña" name="contraseña" type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                        
                    <div class="container row d-flex justify-content-center align-items-center">
                        <div class="ms-3 mt-1 col d-flex justify-content-start">
                            <a class="container rounded" href="<?=url."?controller=producto&action=inicioUser"?>" type="submit">Volver</a>
                        </div>
                        <div class="ms-4 mt-1 col d-flex justify-content-end">
                            <button class="container d-flex justify-content-center align-items-center boton-reg2 rounded boton-hover" action="" name="registro" type="submit">Enviar
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro - Ayuntamiento Vitoria</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/personalizado.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bgregister"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="dni"
                                           placeholder="DNI" name="dni" value="{{ old("dni") }}">
                                    {!!   $errors->first('dni','<small>:message</small>') !!}
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="email"
                                           placeholder="Correo electronico" name="email" value="{{ old("email") }}">
                                    {!!   $errors->first('email','<small>:message</small>')!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="nombre"
                                           placeholder="Nombre" name="name" value="{{ old("name") }}">
                                    {!!   $errors->first('name','<small>:message</small>')!!}
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="apellido"
                                           placeholder="Apellido" name="surname" value="{{ old("surname") }}">
                                    {!!   $errors->first('surname','<small>:message</small>')!!}

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" placeholder="Contraseña" name="password">
                                    {!!   $errors->first('password','<small>:message</small>')!!}

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="password2" placeholder="Repetir contraseña" name="password_confirmation">
                                    {!!   $errors->first('password_confirmation','<small>:message</small>')!!}

                                </div>





                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Provincia de nacimiento
                                    <select id="provincia" aria-label="Escoge una provincia" class="form-select" name="place_of_birth">
                                        <option disabled selected>Seleccione la provincia</option>
                                        <option value="Álava">Álava</option>
                                        <option value="Albacete">Albacete</option>
                                        <option value="Alicante">Alicante</option>
                                        <option value="Almería">Almería</option>
                                        <option value="Asturias">Asturias</option>
                                        <option value="Ávila">Ávila</option>
                                        <option value="Badajoz">Badajoz</option>
                                        <option value="Baleares">Baleares</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Burgos">Burgos</option>
                                        <option value="Cáceres">Cáceres</option>
                                        <option value="Cádiz">Cádiz</option>
                                        <option value="Cantabria">Cantabria</option>
                                        <option value="Castellón">Castellón</option>
                                        <option value="Ceuta">Ceuta</option>
                                        <option value="Ciudad Real">Ciudad Real</option>
                                        <option value="Córdoba">Córdoba</option>
                                        <option value="Cuenca">Cuenca</option>
                                        <option value="Girona">Girona</option>
                                        <option value="Granada">Granada</option>
                                        <option value="Guadalajara">Guadalajara</option>
                                        <option value="Guipuzkoa">Guipuzkoa</option>
                                        <option value="Huelva">Huelva</option>
                                        <option value="Huesca">Huesca</option>
                                        <option value="Jaén">Jaén</option>
                                        <option value="A Coruña">A Coruña</option>
                                        <option value="La Rioja">La Rioja</option>
                                        <option value="Las Palmas">Las Palmas</option>
                                        <option value="León">León</option>
                                        <option value="Lérida">Lérida</option>
                                        <option value="Lugo">Lugo</option>
                                        <option value="Madrid">Madrid</option>
                                        <option value="Málaga">Málaga</option>
                                        <option value="Melilla">Melilla</option>
                                        <option value="Murcia">Murcia</option>
                                        <option value="Navarra">Navarra</option>
                                        <option value="Ourense">Ourense</option>
                                        <option value="Palencia">Palencia</option>
                                        <option value="Pontevedra">Pontevedra</option>
                                        <option value="Salamanca">Salamanca</option>
                                        <option value="Segovia">Segovia</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Soria">Soria</option>
                                        <option value="Tarragona">Tarragona</option>
                                        <option value="Tenerife">Tenerife</option>
                                        <option value="Teruel">Teruel</option>
                                        <option value="Toledo">Toledo</option>
                                        <option value="Valencia">Valencia</option>
                                        <option value="Valladolid">Valladolid</option>
                                        <option value="Vizcaya">Vizcaya</option>
                                        <option value="Zamora">Zamora</option>
                                        <option value="Zaragoza">Zaragoza</option>
                                    </select>
                                    {!!   $errors->first('place_of_birth','<small>:message</small>')!!}

                                </div>
                                <div class="col-sm-6">
                                    Fecha de nacimiento:<input type="date" class="form-control form-control-user" id="fecha_nac" name="birthdate">
                                    {!!   $errors->first('birthdate','<small>:message</small>')!!}

                                </div>
                            </div>

                            <div class="form-group ">

                                <input type="search" class="form-control form-control-user" id="address-input" name="direccion"
                                       placeholder="Direccion...">
                                <input type="text" id="city" name="city" placeholder="city" hidden>
                                {!!   $errors->first('city','<small>:message</small>')!!}

                                <input type="text" id="province" name="province" placeholder="province" hidden>
                                {!!   $errors->first('province','<small>:message</small>')!!}

                                <input type="text" id="postal_code" name="postal_code" placeholder="postal_code" hidden>
                                {!!   $errors->first('postal_code','<small>:message</small>')!!}

                                <input type="text" id="street_name" name="street_name" placeholder="street_name" hidden>
                                {!!   $errors->first('street_name','<small>:message</small>')!!}



                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input placeholder="Portal" type="text" class="form-control form-control-user" id="portal" name="number" value="{{ old("number") }}">
                                    {!!   $errors->first('number','<small>:message</small>')!!}

                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Piso" type="text" class="form-control form-control-user" id="piso" name="floor" value="{{ old("floor") }}">
                                    {!!   $errors->first('floor','<small>:message</small>')!!}

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select required id="mano" class="form-select selector" name="door">
                                        <option disabled selected>Seleccione una</option>
                                        <option value="Izquierda">Izquierda</option>
                                        <option value="Centro">Centro</option>
                                        <option value="Derecha">Derecha</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="null">Ninguna de las anteriores</option>

                                    </select>
                                    {!!   $errors->first('door','<small>:message</small>')!!}

                                </div>

                                <div class="col-sm-6">
                                    <input type="number" placeholder="Telefono" class="form-control form-control-user" id="ntel" name="phone" value="{{ old("phone") }}">
                                    {!!   $errors->first('phone','<small>:message</small>')!!}

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" id="registrar">
                                Registrarse
                            </button>


                            <hr>
                            <a href="/index" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Registrar con Google
                            </a>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route("login") }}">¿Tienes una cuenta? ¡Inicia sesión!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('ts/login.js')}}"></script>


<!-- Core plugin JavaScript-->
<script src="{{asset('node_modules/jquery.easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('node_modules/places.js/dist/cdn/places.min.js')}}"></script>
<script src="{{asset('js/address.js')}}"></script>


<!-- Core plugin JavaScript-->
<script src="{{asset('node_modules/jquery.easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/address.js')}}"></script>

</body>

</html>


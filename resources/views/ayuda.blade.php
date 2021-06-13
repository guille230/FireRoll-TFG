@include('header')

    <div class="container ayudaCont">
        <div class="row">
            <div class="col">
                <h1 class="text-center titleAyuda">Ayuda</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1 clas>Creación de cuentas y login</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Cuando te creas una cuenta los datos rellenados serán: usuario, nombre,correo,contraseña,ciudad,calle,país.</p>
                <p>Al crearte la cuenta ya quedarás registrado en nuestra base de datos, lo que te dejará logearte con tu nombre de usuario y contraseña manteniendo todos tus ajustes.</p>
                <p>En cuanto a tu perfil dispones de una selección de iconos y de banners que nosotros proporcionamos para que puedas elegir cualquiera a tu gusto. 
                    Además de esto dispondrás de una biografía para poder presentarte a los otros jugadores
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>Creación y unión a partidas</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Nuestra página se centra en que los jugadores puedan buscar partidas acordes a sus gustos, así que en nuestro buscador de partidas podrás filtrar por cosas como sistema, duración... </p>
                <p>Cuando encuentres una partida que te guste puedes pinchar en ella para ver mas detalles y así ver si te gustaría jugar o no. </p>
                <p>Cuando le des a jugar se te llevará a una llamada de discord (necesitas una cuenta antes) para ponerte en contacto con los otros jugadores. Si no tienes cuenta puedes registrarte aquí https://discord.com/register
                </p>
                <p>Si, en cambio, lo que quieres es crear una partida, entonces podrás darle al botón de creación donde tendrás que rellenar el formulario con datos sobre la partida como el sistema a usar, duración...</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>Blog</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>¡En nuestro blog encontrarás todas las últimas noticias relacionadas con el mundo del roleo!</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>Tienda</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>En nuestra tienda podrás adquirir desde manuales hasta simples dados para que tu experiencia para el roleo sea mas placentera y completa.</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>¿Necesitas mas ayuda?</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Si quieres mas ayuda puedes ponerte en contacto con nosotros utilizando este pequeño formulario</p>
            </div>
        </div>

        <div class="row my-3 mx-3">
            <div class="col-12 bg-white shadow py-3 px-3">
                <form action="{{route('ayudaEnviada')}}" method="POST">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="email">
                      <div id="emailHelp" class="form-text">Introduce aqui tu email</div>
                    </div>
                    <div class="mb-3">
                      <label for="asunto" class="form-label">Asunto</label>
                      <input type="text" class="form-control" id="asunto">
                      <div id="emailHelp" class="form-text">Introduce aqui el asunto del email</div>
                    </div>
                    <div class="mb-3">
                        <label for="cuerpo" class="form-label">Cuerpo</label>
                        <textarea class="form-control" id="cuerpo" rows="3"></textarea>
                        <div id="emailHelp" class="form-text">Introduce aqui tu problema</div>
                    </div>
                    <input class="enviar rounded" type="submit" value="Enviar">
                  </form>
            </div>
        </div>
    </div>
@include('footer')
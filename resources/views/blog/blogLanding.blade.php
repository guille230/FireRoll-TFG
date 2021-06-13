@include('header')

<div class="container-fluid fondoGradienteBlog">
    <div class="introBlog-container container d-flex justify-content-center">
        <div class="background-title-blogs margenDerecha d-flex justify-content-center" style=""><h1 class="titleLanding titulo headline-blog-detail">FireBlog</h1></div>
        
    <div class="row">
        <div class="col-12 col-md-7 videoCol">
            <div class="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/V1FqLT43lvg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="frame"></iframe>
            </div>
        </div>

        <div class="col-11 col-md-4 mx-4 col-sm-5">
            <h1 class="titulo textoBlog">¡Bienvenido!</h1>
            <div class="textoBlog">
                <p class="cuerpoIntroBlog">¡Bienvenido a nuestro blog de noticias sobre Rol! Aquí encontraras lo último de lo último en noticias sobre manuales, nuevos manuales... ¡Pero no te preocupes si vemos algo relacionado con el rol que sea interesante te lo contaremos! Entra y disfruta de tu estancia. <br> Si te encuentras mas perdido que un ogro en una sastrería... No busques mas lejos que te ponemos un video sobre lo que es rolear y de incluso los orígenes de la palabra para que aumentes tu inteligencia a nivel máximo.</p>
            </div>
        </div>
    </div>
</div>
    <div class="entradas-container container">

    
    <div class="row d-flex justify-content-center text-center align-content-center blogsList" id="rowColumnas">
            <div class="d-flex formRow">
                <form id="formu">
                    <select name="category" id="cat" class="form-select">
                        <option value="0">Selecciona una categoria...</option>
                        <option value="tutorial">Tutoriales</option>
                        <option value="noticia">Noticias</option>
                        <option value="colaboracion">Colaboraciones</option>
                    </select>
                    @csrf
                </form>
                
            </div>
        
            @foreach ($entradas as $entrada)
            <div class="col-12 my-5 mx-auto justify-content-center d-flex justify-content-center col-sm-6">
                <div class="card" style="width: 25rem;">
                <img class="card-img-top" src="{{$entrada->image}}" alt="Card image cap" style="height: 15rem">
                <div class="card-body">
                  <h5 class="card-title tituloEntrada">{{$entrada->headline}}</h5>
                  <p class="card-text">{{$entrada->body}}</p>
                  <form action="{{route('blogDetail')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$entrada->id}}">
                    <input type="submit" value="Leer" class="btn btn-secondary" style="padding: 0.5rem 1.3rem;">
                  </form>
                </div>
              </div>
            </div>
            @endforeach
    </div>
 </div>

</div>
@include('footer')
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $("#cat").on('change',function(e){
        e.preventDefault();
        var cat = $('#cat').val() ;

        $.ajax({
              url: '/getCat',
              type: 'post',
              data: {_token: CSRF_TOKEN, cat: cat},
              contentType: "application/json; charset=utf-8",
              dataType: 'json',
              success: function(response){
                console.log(response);
                 createCol(response);
            }    
    });
    });
    

    function createCol(response){
        var len = 0;

        if(response['data'] != null){
         len = response['data'].length;
      }

      if(len > 0){
        for(var i=0; i<len; i++){

            var id = response['data'][i].id;
            var img = response['data'][i].image;
            var headline = response['data'][i].headline;
            var body = response['data'][i].body;

            var ap = ` 
                            <div class="col-6 my-5 mx-auto justify-content-center d-flex justify-content-center">
                            <div class="card" style="width: 25rem;">
                            <img class="card-img-top" src="`+ img +`" alt="Card image cap" style="height: 15rem">
                            <div class="card-body">
                              <h5 class="card-title">`+ headline `+</h5>
                              <p class="card-text">`+ body `+</p>
                              <form action="{{route('productDetail')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="`+ id `+">
                                <input type="submit" value="Leer" class="btn btn-secondary" style="padding: 0.5rem 1.3rem;">
                              </form>
                            </div>
                          </div>
                        </div> `

            $("#rowColumna").append(ap);
        }
    }
}

</script>

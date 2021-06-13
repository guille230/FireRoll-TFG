@include('header')

    <div class="container d-flex justify-content-center mt-5 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg    ">
        @include('shop.carrito')
        <div class="row d-flex flex-row">
            <div class="col-12 col-md-5 align-content-center justify-center text-center my-5">
                <div class="imageProductoContainer img-hover-zoom">
                    <img src="{{$producto->image}}" alt="a" class="img-fluid ">
                </div>
            </div>
            <div class="col-12 col-md-6 my-5 ">
                <h2 class="productTitle border-top border-bottom border-secondary text-center">{{$producto->name}}</h2>
                <div class="d-flex justify-content-around textoProductos mt-3">
                    <p>Precio: {{$producto->cost}}€</p>
                    <p class="dealer">Distribudor:{{$producto->dealer}}</p>
                </div>
                <p class="textoProductos text-center mt-4">Descripcion:</p>
                <p class="productoDescription text-center">"{{$producto->description}}"</p>
                <form action="{{route('añadirCarrito')}}" method="POST">
                    @csrf
                    <input type="hidden" name="idProducto" value="{{$producto->id}}">
                    <div class="d-flex justify-content-center">
                        <button class="enviarCarrro purchase text-center rounded">Añadir al carrito</button>
                    </div>
                    
                </form>
        </div>
        </div>
        
    </div>
@include('footer')
<STYLE>


/* [2] Transition property for smooth transformation of images */
.img-hover-zoom img {
  transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.img-hover-zoom:hover img {
  transform: scale(1.3);
}
</STYLE>
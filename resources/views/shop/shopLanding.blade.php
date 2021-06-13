@include('header')
<style>
  footer{
    position: relative;
    margin-bottom: 100%;
  }

  </style>
 <div class="container">
  @include('sidebar')
  @if (session()->has('user'))
    @include('shop.carrito')
  @endif
    <div class="row d-flex text-center">
            @foreach ($productos as $articulo)
            <div class="col-4 my-3 d-flex justify-content-center ">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top producto" src="{{$articulo->image}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title nombreProducto border-top border-bottom">{{$articulo->name}}</h5>
                  <?php
                        $original = $articulo->description;
                        $cortado = substr($original, 0, 40) . "...";
                        ?>
                  <p class="card-text textoProductos"><?php echo($cortado);?></p>
                  <h4 class="card-text textoProductos">{{$articulo->cost}}€</h4>
                  <form action="{{route('productDetail')}}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id" value="{{$articulo->id}}">
                    <input class="enviar rounded" type="submit" value="Comprar"> 
                  </form>
                </div>
              </div>
            </div>
            @endforeach
    </div>
</div>
@include('footer')

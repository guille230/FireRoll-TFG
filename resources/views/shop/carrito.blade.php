<style>
    .dropdown-menu.show {
      top: 0% !important;
      left: 8% !important;
  }
  
  .dropdown-menu{
      min-width: 0rem !important;
      position: absolute !important;
  }
  .dropdown-menu[data-bs-popper] {
      left: 8% !important;
  }
  </style>
  
  @php
   $cart = session('carrito');
   $us = session('user'); 
   $total = session('total');
   $cartSerialized = base64_encode(serialize($cart));
  @endphp
  
  <div class="dropdown-thin">
    
    <a id="dropdownMenuButton1" class="carrito" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-shopping-cart carritoIcon hvr-grow"></i>
    </a>

    <table class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @if (session()->has('carrito'))
        <th>
          <h1 class="text-center text-uppercase" style="font-size: 1.5rem;">Carrito</h1>
        </th>
        @foreach ($cart as $prod)
        @php
          $item = DB::table('productos')->where('id', $prod['id_producto'])->first();
        @endphp
        <tr class="border-bottom dropdown-item">
          <td class="productoCart align-items-center">
            <img src="{{$item->image}}" alt="img" height="170" width="170" class="mx-1">
          </td>
          <td>
            <span class="mx-1 align-items-center text-center">{{$item->name}}</span>
          </td>
          <td>
            <span class="fw-bold align-items-center">x{{$prod['cantidad']}}</span> 
          </td>
        </tr>
        @endforeach
        <tr class="dropdown-item">
          <td class="productoCart d-flex justify-content-between">
            <span class="fw-bold align-self-center fs-3">Total:{{$total}}€</span>
            <form action="{{route('purchase')}}" method="POST">
              @csrf
              <input type="hidden" name="productos" value="{{$cartSerialized}}">
              <input type="hidden" name="total" value="{{$total}}">
              <input type="hidden" name="idus" value="{{$us->id}}">
              <input type="submit" value="comprar" class="btn btn-success">
            </form>
          </td>
      </tr>
      @else
      <tr>
        <td class="dropdown-item" style="padding: 10px">Añade Productos al carrito</td>
      </tr>
      @endif
      </table> 
</div>
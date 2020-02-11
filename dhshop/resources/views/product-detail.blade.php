@extends('layouts.template')

@section('title', 'DHShop - contacto')

@section('css')
    {{ '/css/product-detail.css' }}
@endsection


@section('main')
<section class="row product-detail">
  <img class="img-fluid img-thumbnail main-image row col-12 col-md-4" src="/product_img/{{$Product->image}}" alt="">

  
  <article class="col-12 col-md-8 product-info">
    <h2>{{$Product->name}}</h2>
    <h3>${{$Product->price}}</h3>

    <div class="stock-div">
      @if($Product->stock > 0)
        <span class="stock">En stock </span>
      @else
        <span class="ofstock">Sin stock</span>
      @endif
    </div>


    <form action="" method="post">
      @csrf

      <input type="hidden" value="{{$Product->id}}" name="product_id">

      <div>
        <label for="">Cantidad: </label>
        <input type="number" name="quantity" min="1" max="50" value="1"><br>
      </div>

      <button type="submit" class="btn btn-primary">Agregar al carrito</button>

      @if ($errors->any())
        <div class="alert alert-danger">
          <li>{{ $error }}</li>
        </div>
      @endif

    </form>

  </article>
</section>

<section class="product-description">
  <h3>Descripcion</h3>
  <p>{{$Product->description}}</p>
</section>

      

@endsection
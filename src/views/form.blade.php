<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('crudproducts::components.styles')
    </head>

    <body>
        <div class="container">
            @include('crudproducts::components.navbar')
            @if(empty($productData))
                <form method="POST" action="/createProduct">
                    <div class="form-group">
                        <label for="product_name">Название продукта</label>
                        <input type="text" name="name" id="product_name" class="form-control" placeholder="Название продукта">
                        <label for="product_art">Артикул продукта</label>
                        <input type="text" name="art" id="product_art" class="form-control" placeholder="Артикул продукта">
                    </div>
                    <input type="submit" value="Send" class="btn btn-primary">
                </form>
            @else
                <form method="POST" action="/{{$action}}Product/{{$productData->id}}">
                    <div class="form-group">
                        <label for="product_name">Название продукта</label>
                        <input type="text" name="name" value="{{$productData->name}}" id="product_name" class="form-control" placeholder="Название продукта">
                        <label for="product_art">Артикул продукта</label>
                        <input type="text" name="art" value="{{$productData->art}}" id="product_art" class="form-control" placeholder="Артикул продукта">
                    </div>
                    <input type="submit" value="Send" class="btn btn-primary">
                </form>
            @endif
        </div>
        @include('crudproducts::components.scripts')
    </body>
</html>
<html>
	<head>
		@include('crudproducts::components.styles')
	</head>

	<body>
		<div class="container">
			@include('crudproducts::components.navbar')
			<div class="">
				<p>Список продуктов</p>
			<hr/>
				@foreach($products as $product)
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">{{$product->name}}</h5>
							<a href="/readProduct/{{$product->id}}"><i class="fas fa-edit"></i></a>
							<a href="/deleteProduct/{{$product->id}}"><i class="fas fa-times"></i></a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@include('crudproducts::components.scripts')
	</body>
</html>
	
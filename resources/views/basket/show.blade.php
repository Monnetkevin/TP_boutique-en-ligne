@extends("layouts.app")
@section("content")
<div class="container">

	@if (session()->has("basket"))
	<h1 class="text-center my-5" >Mon panier</h1>
	<div class="table-responsive shadow mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark" >
				<tr>
					<th>#</th>
					<th>Produit</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- Initialisation du total général à 0 -->
				@php $total = 0 @endphp

				<!-- On parcourt les produits du panier en session : session('basket') -->
				@foreach (session("basket") as $key => $product)

					<!-- On incrémente le total général par le total de chaque produit du panier -->
					@php $total += $product['price'] * $product['quantity'] @endphp
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>

						<a href="{{route('products.show', $product['id'])}}" title="Afficher le produit" >
                            <img src="/storage/uploads/{{$product['image']}}" alt="{{ $product['title'] }}" width="150px">
                        </a>
						</td>
						<td>{{ $product['price'] }} $</td>
						<td>
							<form method="POST" action="{{ route('basket.add', $key) }}" class="form-inline d-inline-block" >
							@csrf
								<input type="number" name="quantity" placeholder="Quantité ?" value="{{ $product['quantity'] }}" class="form-control mr-2" style="width: 80px" >
								<input type="submit" class="btn btn-primary" value="Actualiser" />
							</form>
						</td>
						<td>
							{{ $product['price'] * $product['quantity'] }} $
						</td>
						<td>
							<a href="{{ route('basket.remove', $key) }}" class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</a>
						</td>
					</tr>
				@endforeach
				<tr colspan="2" >
					<td colspan="4" >Total général</td>
					<td colspan="2">
						<!-- On affiche total général -->
						<strong>{{ $total }} $</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<a class="btn btn-danger" href="{{ route('basket.empty') }}" title="Retirer tous les produits du panier" >Vider le panier</a>

	@else
	<div class="alert alert-info">Aucun produit au panier</div>
	@endif

</div>
@endsection

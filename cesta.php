<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verifica si el usuario está logueado
if (isset($_SESSION['usuario'])) {
    // luego de confirmar el nombre del user, se muestra
    echo "<h1 class='bienvenido'>Bienvenido, " . $_SESSION['usuario'] . "</h1>";
} else {
    // Si no está logueado, redirigimos al login
    header("Location: login.php");
    exit(); // Asegura que no se ejecute el código posterior
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Tienda</title>
		<link rel="stylesheet" href="css/stylesCes.css">
		<link rel="icon" href="imagen/Grupo 1@2x.png">

		<style>
			.btn-add-cart:active {
            transform: scale(0.95); 
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2); 
			background-color: #d4af37;
		}
		</style>
	</head>

	
	<body>
		<header>
        <div class="menu">
          
          <a class="item" href="./login.php">
            <div>LOGOUT</div>
          </a>
          </div>
        
			<h1>Tienda</h1>

			<div class="container-icon">
				<div class="container-cart-icon">
				<svg
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke-width="1.5"
				stroke="currentColor"
				class="icon-cart"
				>
				<path
				 stroke-linecap="round"
				 stroke-linejoin="round"
				 d="M3 3h2l.68 5.268a2 2 0 001.98 1.732h9.04a2 2 0 001.98-1.732L19 3h2m-7 12a2 2 0 11-4 0 2 2 0 014 0zm7 0a2 2 0 11-4 0 2 2 0 014 0z"
				 />
				</svg>

  
					<div class="count-products">
						<span id="contador-productos">0</span>
					</div>
				</div>

				<div class="container-cart-products hidden-cart">
					<div class="row-product hidden">
						<div class="cart-product">
							<div class="info-cart-product">
								<span class="cantidad-producto-carrito">1</span>
								<p class="titulo-producto-carrito">Maquillajes</p>
								<span class="precio-producto-carrito">$50</span>
							</div>
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="icon-close"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M6 18L18 6M6 6l12 12"
								/>
							</svg>
						</div>
					</div>

					<div class="cart-total hidden">
						<h3>Total:</h3>
						<span class="total-pagar">$200</span>
					</div>
					<p class="cart-empty">El carrito está vacío</p>
				</div>
			</div>
		</header>
		<div class="container-items">
			<div class="item">
				<figure>
					<img
						src="https://images.unsplash.com/photo-1645961359170-c01fa306aa6b?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bGFiaWFsJTIwcm9qb3xlbnwwfHwwfHx8MA%3D%3D"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Labial rojo</h2>
					<p class="price">$10</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="https://images.unsplash.com/photo-1620464003286-a5b0d79f32c2?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fE1hcXVpbGxhamUlMjBiYXNlfGVufDB8fDB8fHww"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Set de brochas</h2>
					<p class="price">$34</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="https://images.unsplash.com/photo-1684244110880-b7dda6c68618?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGFsZXRhJTIwZGUlMjBtYXF1aWxsYWplfGVufDB8fDB8fHww"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Paleta de sombras</h2>
					<p class="price">$50</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="https://apolomakeup.es/wp-content/uploads/2023/01/karly-jones-xBqYLnRhfaI-unsplash-1-1.jpg"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Base</h2>
					<p class="price">$100</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
            <div class="item">
				<figure>
					<img
						src="https://i.pinimg.com/originals/7c/a0/5d/7ca05d1063273c7ed498c7ab55b37a39.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Contorno</h2>
					<p class="price">$45</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="https://images.unsplash.com/photo-1618331755914-6397194df631?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVtb3ZlZG9yJTIwZGUlMjBtYXF1aWxsYWplfGVufDB8fDB8fHww"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Desmaquillante</h2>
					<p class="price">$50</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
		</div>

		<script src="./js/script.js"></script>
    
		<footer>
        
		
	</footer>
</body>
</html>	


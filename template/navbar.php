<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?= url("index.php") ?>">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?= url("index.php") ?>" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?= url("menu.php") ?>" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href=<?= url("services.php") ?> class="nav-link">Services</a></li>
	          <li class="nav-item"><a href=<?= url("about.php") ?> class="nav-link">About</a></li>

	          <li class="nav-item"><a href=<?= url("contact.php") ?> class="nav-link">Contact</a></li>

	          <li class="nav-item cart"><a href="<?= url("products/cart.php") ?>" class="nav-link"><span class="icon icon-shopping_cart"></span></a>


			  <?php if(!isset($_SESSION['username'])) : ?>

			  <li class="nav-item"><a href="<?= url("auth/login.php") ?>" class="nav-link">login</a></li>
			  <li class="nav-item"><a href="<?= url('auth/register.php') ?>" class="nav-link">register</a></li>
			
				<?php else : ?>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<?= $_SESSION['username']; ?>
				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?= url('users/bookings.php') ?>">Your Bookings</a></li>
					<li><a class="dropdown-item" href="<?= url('users/orders.php') ?>">Your Orders</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="<?= url("auth/logout.php") ?>">logout</a></li>
				</ul>
			   </li>
			   <?php  endif; ?>
	        </ul>
	      </div>
		</div>
	  </nav>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	
	<hr>

	<div class="container">

		<div class="row">
		<div class="col-md-4 col-md-offset-8">

		<a href="<?php echo site_url('/cart/'); ?>" class="btn btn-warning btn-lg">See cart</a>
		<a href="<?php echo site_url('/cart/cart_clear'); ?>" class="btn btn-danger btn-lg">Clear cart</a>

		</div >
			you have <span class="label label-success"> <?php echo $this->cart->total_items(); ?> </span> items.
			<h4><small>Total $</small> <?php echo $this->cart->total(); ?></h4>
		</div>

		<hr>

		<?php foreach ($products as $key => $product): ?>
			
		<div class="col-md-4">
		    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
		    <div><h3><?php echo $product->name; ?></h3></div>
		    <div class="lead">

		    	<div class="lead">
		    		<?php echo $product->price; ?>
		    	</div>

		    	<?php echo form_open('cart/add_item'); ?>
		    	<?php echo form_hidden('id', $product->id); ?>

		    	<div class="pull-right">

		    		<?php
						
						$btn = array(
							'class' => 'btn btn-success btn-sm',
							'role'	=> 'button',
							'value' => 'Add to Cart',
							'name' => 'action'
						);
						echo form_submit($btn);
					?>

		    	</div>
		    	

		    	<?php echo form_close(); ?>

			</div>
		</div>

	<?php endforeach ?>


	</div>

</body>
</html>
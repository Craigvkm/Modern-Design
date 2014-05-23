<?php include("inc/products.php");
if (isset($_GET["id"])) {
	$product_id = $_GET["id"];
	if (isset($products[$product_id])) {
		$product = $products[$product_id];
	}
}
if (!isset($product)) {
	header("Location: store.php");
	exit();
}
	$scrap = 0;
  $section = "store";
  include("inc/header.php");

?>


<div class="breadcrumb"><a href="store.php">Store</a> &gt; <?php echo $product["name"]; ?></div>
<section id="primary">
<!-- <div class="detailsDisplay"> -->
  <img src='<?php echo $product["imageURL"]; ?>' alt='<?php echo $product["name"]; ?>'>

<!-- </div> -->
</section>

<section id="secondary">
	<h1><span class="price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?></h1>
	<p class="item-description"><?php echo $product["description"]; ?></p>
	<p class="designer-note">***All Products hand crafted***</p>
<!-- <div class="paypal-checkout"> -->
  <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
	  <input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
	  <input type="hidden" name="item_name" value='<?php echo $product["name"]; ?>' >
		<?php
			echo '<table>';
				if (isset($product["leds"])) {
					echo '<tr>';
						echo '<th>';
							echo '<input type="hidden" name="on' . $scrap . '" value="LED Lighting">';
							echo '<label for="on' . $scrap . '">LED Color</label>';
						echo '</th>';
						echo '<td>';
							echo '<select name="os' . $scrap . '">';
								foreach ($product["leds"] as $led) {
									echo '<option value="'. $led["color"] . '">' . $led["color"] . ' ' . $led["price"] . 'USD</option>';
								}
								// echo '<option value="Blue">Blue $89.99 USD</option>';
								// echo '<option value="White">White $89.99 USD</option>';
							echo '</select>';
						echo '</td>';
					echo '</tr>';
					$scrap = $scrap + 1;
				}

				if (isset($product["colors"])){
				  echo '<tr>';
				    echo '<th>';
				      echo '<input type="hidden" name="on' . $scrap . '" value="Color">';
				      echo '<label for="os' . $scrap . '">Color</label>';
				    echo '</th>';
				    echo '<td>';
							echo '<select name="os' . $scrap . '">';
								foreach($product["colors"] as $color) {
							    echo '<option value="' . $color . '">' . $color . '</option>';
								}
				  		echo '</select>';
						echo '</td>';
					echo '</tr>';
					$scrap = $scrap + 1;
				}

				if (isset($product["textBox"])) {
					echo '<tr>';
						echo '<th>';
							echo '<input type="hidden" name="on' . $scrap . '" value="Name for engraving">';
							echo '<label for="on' . $scrap . '">Name for engraving</label>';
						echo '</th>';
						echo '<td>';
							echo '<input type="text" name="os' . $scrap . '" maxlength="200">';
						echo '</td>';
					echo '</tr>';
				}
				$scrap = 0;
			echo "</table>";
		?>
	  <input type="submit" value="add to cart" name="submit">
  </form>
<!-- </div> -->
</section>

<?php include("inc/footer.php"); ?>

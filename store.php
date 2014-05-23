<?php include("inc/products.php"); ?><?php
  $section = "store";
  include("inc/header.php");
?>

  <ul id="gallery">
    <?php foreach($products as $product_id => $product) {
      echo get_list_view_html($product_id, $product);
    } ?>
  </ul>

<?php include("inc/footer.php"); ?>

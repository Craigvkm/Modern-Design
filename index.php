<?php
  $section = "index";
  include ('inc/header.php');
?>
      <section>
        <div class="home-page">
          <h2><img src="img/intro.jpg" alt="Introduction Image" id="home-page-image-left">Thought, Built, and Designed for you<img src="img/intro.jpg" alt="Introduction Image" id="home-page-image-right"></h2>
          <h2>Unique Modern Design</h2>
        </div>

        <div class="featured-products">
          <h2>Newest Products</h2>
          <?php include("inc/products.php"); ?>
          <ul id="gallery">
            <?php
            $total_products = count($products);
            $position = 0;
            $list_view_html = "";
            foreach($products as $product_id => $product) {
              $position = $position + 1;
              if ($total_products - $position < 3){
                $list_view_html = get_list_view_html($product_id, $product) . $list_view_html;
              }
            }
            echo $list_view_html;
            ?>
          </ul>
        </div>
      </section>
<?php include ('inc/footer.php'); ?>

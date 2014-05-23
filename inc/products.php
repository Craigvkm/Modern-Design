<?php
function get_list_view_html($product_id, $product){

  $output = "";

  $output = $output . "<li>";
  $output = $output . '<a href="orderDetail.php?id='. $product_id . '">';
  $output = $output . "<img src='" . $product["imageURL"] . "' alt=''>";
  $output = $output . "<p>" . $product["description"] . "</p>";
  $output = $output . "</a>";
  $output = $output . "</li>";

  return $output;
}
// ****template****
// $products[(this is the paypal ItemId(when making buttons))]
// name: required
// price: required
// category: required
// description: required
// paypal: required (unless display only)
//
// *paypal dependent*
// colors
// leds
// textbox
// ****/template****
//TODO: Add instock boolean
$products = array();
  $products[101] = array(
      "name" => "Cheap Kitchen Item",
      "price" => 18.00,
      "category" => "Kitchen",
      "description" => "Unique kitchen trinket for a fraction of the cost",
      "imageURL" => "img/products/cheapkitchenitem.jpg",
      "paypal" => "A933L4HU3UYPW",
      "colors" => array("red", "white", "black"),
    );
  $products[102] = array(
      "name" => "Cheap Office Item",
      "price" => 15.99,
      "category" => "Office",
      "description" => "Unique Office trinket for a fraction of the cost",
      "imageURL" => "img/products/cheapofficeitem.jpg",
      "paypal" => "CAS7ASFCM9TRJ",
      "colors" => array("red", "white", "black"),
    );
  $products[103] = array(
      "name" => "Cheap Table",
      "price" => 15.99,
      "category" => "Living Room",
      "description" => "Unique Table for a fraction of the cost",
      "imageURL" => "img/products/cheapTable.jpg",
      "paypal" => "CBAY7EGR4QP2A",
      "colors" => array("red", "white", "black"),
    );
  $products[104] = array(
      "name" => "Expensive Kitchen Item",
      "price" => 79.99,
      "category" => "Kitchen",
      "description" => "Modern and sleek custom build appliance holder",
      "imageURL" => "img/products/expensivekitchenitem.jpg",
      "paypal" => "H2XV4NTPN6UKC",
      "colors" => array("white", "black"),
      "leds" => array(array("color" => "None", "price" =>"$79.99"), array("color" => "Blue", "price" => "$89.99"), array("color" => "White", "price" => "$89.99")),
      "textBox" => "true",
    );
?>

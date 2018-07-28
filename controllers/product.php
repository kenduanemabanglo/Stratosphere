<?php include 'database.php';
    // Show all the records with reference to the logged in agent
    $reference = implode('', $_SESSION);
    $product = mysqli_query($db, "SELECT * FROM product;");
    if ($product->num_rows > 0) {
    while($show_product = mysqli_fetch_assoc($product)) {
    echo '<option value="'.$show_product['id'].'">'.$show_product['product_name'].'</option>';
    }
}
?>
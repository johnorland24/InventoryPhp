<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Inventory</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $inventory = [];

          function addProduct($name, $price, $quantity) {
              global $inventory;

              if (array_key_exists($name, $inventory)) {
                  echo "Product $name already exists.<br>";
                  return;
              }

              $inventory[$name] = ['price' => $price, 'quantity' => $quantity];
              echo "Product $name added successfully.<br>";
          }

          function updateProductPrice($name, $newPrice) {
              global $inventory;

              if (!array_key_exists($name, $inventory)) {
                  echo "Product $name not found.<br>";
                  return;
              }

              $inventory[$name]['price'] = $newPrice;
              echo "Price for product $name updated successfully.<br>";
          }

          function updateProductQuantity($name, $newQuantity) {
              global $inventory;

              if (!array_key_exists($name, $inventory)) {
                  echo "Product $name not found.<br>";
                  return;
              }

              $inventory[$name]['quantity'] = $newQuantity;
              echo "Quantity for product $name updated successfully.<br>";
          }

          function removeProduct($name) {
              global $inventory;

              if (!array_key_exists($name, $inventory)) {
                  echo "Product $name not found.<br>";
                  return;
              }

              unset($inventory[$name]);
              echo "Product $name removed successfully.<br>";
          }

          function displayInventory() {
              global $inventory;

              if (empty($inventory)) {
                  echo '<tr><td colspan="4">No products in inventory.</td></tr>';
                  return;
              }

              foreach ($inventory as $name => $product) {
                  echo '<tr>';
                  echo '<td>' . $name . '</td>';
                  echo '<td>$' . number_format($product['price'], 2) . '</td>';
                  echo '<td>' . $product['quantity'] . '</td>';
                  echo '<td>';
                  echo '<form action="" method="post">'; // Consider adding action URL if needed
                  echo '<input type="hidden" name="product" value="' . $name . '">';
                  echo '<input class="inventory-action" type="number" name="newPrice" placeholder="New Price">';
                  echo '<button class="inventory-action btn btn-primary" type="submit" name="updatePrice">Update Price</button>';
                  echo '<input class="inventory-action" type="number" name="newQuantity" placeholder="New Quantity">';
                  echo '<button class="inventory-action btn btn-primary" type="submit" name="updateQuantity">Update Quantity</button>';
                  echo '<button action="remove.php" class="inventory-action btn btn-danger" type="submit" name="remove">Remove</button>';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
              }
          }

          // Test functions
          addProduct("papaya soap", 10.99, 5);
          addProduct("conditioner", 19.99, 10);
          addProduct("Pride taff", 5.99, 3);

          displayInventory();

        ?>
      </tbody>
    </table>

    <form action="Add.php" method="post">
      <label for="productName">Product Name:</label>
      <input type="text" name="productName" required>
      <label for="productPrice">Price:</label>
      <input type="number" name="productPrice" required>
      <label for="productQuantity">Quantity:</label>
      <input type="number" name="productQuantity" required>
      <button type="submit" name="addProduct">Add Product</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

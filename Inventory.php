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
        </tr>
      </thead>
      <tbody>
        <?php
          
          $inventory = [];

          function addProduct($name, $price, $quantity) {
              global $inventory;

           
              if (array_key_exists($name, $inventory)) {
                  echo "Product $name already  occurs.\n";
                  return;
              }

              $inventory[$name] = ['price' => $price, 'quantity' => $quantity];
              echo "Product $name added successfully.\n";
          }

          function updateProductQuantity($name, $newQuantity) {
              global $inventory;

          
              if (!array_key_exists($name, $inventory)) {
                  echo "Product $name not found.\n";
                  return;
              }

              $inventory[$name]['quantity'] = $newQuantity;
              echo "Quantity for product $name updated successfully.\n";
          }

          function removeProduct($name) {
              global $inventory;

          
              if (!array_key_exists($name, $inventory)) {
                  echo "Product $name not found.\n";
                  return;
              }

              unset($inventory[$name]);
              echo "Product $name removed successfully.\n";
          }

          function displayInventory() {
              global $inventory;

              if (empty($inventory)) {
                  echo '<tr><td colspan="3">No products in inventory.</td></tr>';
                  return;
              }

              foreach ($inventory as $name => $product) {
                  echo '<tr>';
                  echo '<td>' . $name . '</td>';
                  echo '<td>$' . number_format($product['price'], 2) . '</td>';
                  echo '<td>' . $product['quantity'] . '</td>';
                  echo '</tr>';
              }
          }

          // Test functions
          addProduct("papaya soap", 10.99, 5);
          addProduct("conditioner", 19.99, 10);
          addProduct("Pride taff", 5.99, 3);

          displayInventory();

          updateProductQuantity("conditioner", 8);

          displayInventory();

          removeProduct("Tide Bar");

          displayInventory();
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

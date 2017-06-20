<?php require 'statics/header.view.php'; ?>
	
	<!-- layout Start -->
<?php require 'statics/sidebar.view.php'; ?>

<article>
  <a class="btn btn-success" href="add-product.php">Add New</a>
  <h2>All Products</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Unit Available</th>
      <th></th>
    </tr>
   
      <?php
        foreach ($products as $product) 
        {
          echo "<tr>";
          echo "<td>".$product['name']."</td>";
          echo "<td>".$product['description']."</td>";
          echo "<td>".$product['price']."</td>";
          echo "<td>".$product['unitAvailable']."</td>";
          echo "<td>
                  <a href='edit-product.php?id=".$product['id']."&action=edit'>Edit</a>
                  <a href='edit-product.php?id=".$product['id']."&action=delete'>delete</a>
                </td>";
          echo "</tr>";
        }
      ?>
   
  </table>
           
<hr></hr> 
</article>
	
<?php require 'statics/footer.view.php'; ?>
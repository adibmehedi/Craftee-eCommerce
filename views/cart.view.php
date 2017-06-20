

    <?php require 'statics/header.view.php'; ?> 
	
		<!-- Table -->
<div class="container">
  <h2>Products in the Cart</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price (Tk/Unit)</th>
        <th>Quantity</th>
        <th>Total (TK)</th>
      </tr>
    </thead>
    <tbody>

      <?php
          if(isset($cartItems)){ 
          foreach($cartItems as $cartItem): ?>
      <tr>
        <input type='hidden' name='id' value='<?=$cartItem['id']; ?>'>
        <td><?=$cartItem['name']; ?></td>
        <td><?=$cartItem['price']; ?></td>
        <td><?=$cartItem['unit']; ?></td>
        <td><?=($cartItem['unit'])*($cartItem['price']); ?></td>
      </tr>
      <?php endforeach;
        }
       ?>
    </tbody>
   
  </table>
    <div class="order_submit">
        <a  href="cart.php?clearCart=true"><button type="button">Clear Cart</button></a>
       <a  href="cart.php?cartConfirm=true"><button type="button">Confirm</button></a>
    </div>
</div> 
	
<?php require 'statics/footer.view.php'; ?>
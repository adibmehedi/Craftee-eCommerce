<?php require 'statics/header.view.php'; ?>
	
	<!-- layout Start -->
<?php require 'statics/sidebar.view.php'; ?>

<article>
          
  <h2>ORDER IN QUEE</h2>
  <table>
    <tr>
      <th>order ID</th>
  	  <th>PRODUCT</th>
      <th>Address</th>
      <th>PRICE</th>
      <th>Satus</th>
      <th>Action</th>
    </tr>
    <?php
      if(!empty($updatedOrders)){
      foreach ($updatedOrders as $order): 
    ?>
    <tr>
      <td><?=$order['id']; ?></td>
      <td><?=$order['items']; ?></td>
      <td><?=$order['address']; ?></td>
      <td><?=$order['price']; ?></td>
      <td><?=($order['status']==0 ?  "Not Deliverd": "Delivered"); ?> </td>
  	  <td>
          <a href="order.php?changeStatus=1&orderId=<?=$order['id']; ?>"><button class="dropbtn">Cange Status</button></a>
      </td>
    </tr>
    <?php
        endforeach; 
      }
    ?>


     
  <table>
   <h2>CUSTOM ORDERS</h2>
    <tr>
      <th>order ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Display</th>
      <th>Action</th>
    </tr>
    <?php
      if(!empty($customOrders)){
      foreach ($customOrders as $customOrder): 
    ?>
    <tr>
      <td><?=$customOrder['id']; ?></td>
      <td><?=$customOrder['name']; ?></td>
      <td><?=$customOrder['phone']; ?></td>
      <td> <a href='custom-order.php?show=<?=$customOrder['design'];?>'><button class="dropbtn">Show</button></a> </td>
      <td> <a href='custom-order.php?delete=<?=$customOrder['id'];?>'><button class="dropbtn">Delete</button></a> </td>
    </tr>
    <?php
        endforeach; 
      }
    ?>
    
  </table>


   
  <hr></hr> 
</article>
	
<?php require 'statics/footer.view.php'; ?>
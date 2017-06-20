    <?php require 'statics/header.view.php'; ?>

	
	<!-- layout Start -->
	
<?php require 'statics/sidebar.view.php'; ?>

<article>
    <h2>PRODUCTS STATUS</h2>
    <table>
      <tr>
        <th>ORDER ID</th>
        <th>DATE</th>
        <th>ITEMS</th>
        <th>PRICE</th>
        <th>Status</th>
      </tr>
      <?php 
        if(!empty($updatedOrders)){
          foreach ($updatedOrders as $order):
      ?>
      <tr>
        <td><?=$order['id']; ?></td>
        <td><?=date('d-m-Y',strtotime($order['placementTime'])); ?></td>
        <td><?=$order['items']; ?></td>
        <td><?=$order['price']; ?></td>
        <td><?=($order['status']==0 ?  "Not Deliverd": "Delivered"); ?></td>
      </tr>
      <?php
          endforeach;
        }
       ?>
    </tr>
    </table>
    <hr></hr> 
</article>
	
	</body>
<?php require 'statics/header.view.php'; ?>
	
	<!-- layout Start -->
	<?php require 'statics/sidebar.view.php'; ?>

<article>
	<form action="report.php" method="GET">
		<label for="from">From : </label>
		<input id="from" type="date" name="from" value=""/>
		<label for="to">To : </label>
		<input id="to" type="date" name="to" value=""/>
		<button type="submit">Show</button>
	</form>
  <h2>Report</h2>
  <table>
    <tr>
      <th>Order Id</th>
      <th>Address</th>
      <th>Time</th>
      <th>Price</th>
      <th>Status</th>
    </tr>
   
      <?php 
      	if(isset($reports)){
	        foreach ($reports as $report) 
	        {
	          echo "<tr>";
	          echo "<td>".$report['id']."</td>";
	          echo "<td>".$report['address']."</td>";
	          echo "<td>".$report['placementTime']."</td>";
	          echo "<td>".$report['price']."</td>";
	          echo "<td>".($report['status']==0 ?  "Not Deliverd": "Delivered")."</td>";
	          echo "</tr>";
	        }
	      }  
      ?>
   
  </table>
           
<hr></hr> 
</article>
	
<?php require 'statics/footer.view.php'; ?>
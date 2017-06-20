<script type="text/javascript">
    function addProduct(v) {
        //console.log(v.value);

        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("onCartItem").innerHTML = this.responseText;
            }
          };
        var url="cart.php?id="+v.value;
          xhttp.open("GET", url, true);
          xhttp.send();
    }
</script>

<!-- HEADER -->
<?php require 'statics/header.view.php'; ?>
<!-- /HEADER -->

<!-- Slider Start -->
<div class="slider_wrapper container-fluid clear">
    <div class="row">
        <div class="col-md-12">
	         <img src="resource/img/cover.png" class="img-responsive" alt="Slider">
        </div>
    </div>
</div>

<!-- Portfolio Three Start -->
<div class="portfolio_three_wrapper back_ash container clear">
    <div class="portfolio_three">
        <div class="row">
            <div class="heading_ash col-md-12">
                <h1>CARTOON PRODUCTS</h1>
                <img src="resource/img/heading_thin_icon.png" alt="Heading">
            </div>
        </div>
        <div class="row">
        <?php
            foreach ($products as $product) 
            {
        ?>
                <div class="col-md-4 three_wrapper">
                    <div class="three_img">
                        <img src="resource/upload/<?=$product['id']; ?>.jpg" alt="Image">
                    </div>
                     <div class="three">
                        <p><?=$product['name']; ?></p>
                        <h4><?=$product['price']." ";?>BDT</h4>
                        <button value="<?=$product['id']; ?>" onClick="addProduct(this)">ADD TO CART</button>
                    </div> 
                </div>
        <?php 
            }
        ?>
        </div>
    </div>
</div>


<!-- Footer Top Start -->
<?php require'statics/footer.view.php'; ?>
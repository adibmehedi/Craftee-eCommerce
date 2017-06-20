<?php require 'statics/header.view.php'; ?>
<?php require 'statics/sidebar.view.php'; ?>

<article>
    
	<form action="edit-product.php" enctype="multipart/form-data" method="POST"> 
        <div class="product-image-form">
            <img src='resource/upload/<?=$id;?>.jpg' alt="Product Image">
        </div>
        <input type="hidden" name='id' value='<?=$id;?>'>
        <label for="fileToUpload">Select image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <label for="name">Title</label>
        <input type="text" id="name" name="name" value='<?=$product['name'];?>'>
        <label for="desc">Description</label>
        <input type="text" id="desc" name="desc" value='<?=$product['description'];?>'>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" value='<?=$product['price'];?>'>
        <label for="unit">Unit Available</label>
        <input type="text" id="unit" name="unit" value='<?=$product['unitAvailable'];?>'>
        <input type="submit" value="Save">
    </form>
</article>

<?php require 'statics/footer.view.php'; ?>
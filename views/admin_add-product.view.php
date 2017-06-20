<?php require 'statics/header.view.php'; ?>
<?php require 'statics/sidebar.view.php'; ?>

<article>
	<form action="add-product.php" enctype="multipart/form-data" method="POST"> 
        <label for="fileToUpload">Select image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <label for="name">Title</label>
        <input type="text" id="name" name="name">
        <label for="desc">Description</label>
        <input type="text" id="desc" name="desc">
        <label for="price">Price</label>
        <input type="text" id="price" name="price">
        <label for="unit">Unit Available</label>
        <input type="text" id="unit" name="unit">
        <input type="submit" value="Save">
    </form>
</article>

<?php require 'statics/footer.view.php'; ?>
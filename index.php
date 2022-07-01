<?php
include 'product.php';


?>
<!doctype html>

<html>

<head>
    <meta charset="utf-8">

    <title>Product list</title>

    <!-- Load external CSS styles -->
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript"></script>



</head>


<body>

    <div class="main_container">
        <div class="main">
            <h1>Product list</h1>
            <div class="buttons">
                <a class="button" href="product-add.php">
                    <button style="vertical-align:middle ; color:white ; background-color:blue"><span>ADD</span></button>
                </a>
                <form action="dbase/delete.php" method='POST'>
                    <button class="button2" type='submit' style="color:white ; background-color: #f44336; ">MASS DELETE</button>


            </div>

        </div>
        <hr>

        <div class="product-boxes">

            <?php foreach ((new Product)->getAll() as $product) : ?>
                <div class="box1">

                    <input type="checkbox" name="deleteId[]" class="delete-checkbox" value="<?php echo $product->id ?>">
                    <div class="box-content">


                        <div id="sku">
                            <?php echo $product->SKU; ?>

                        </div>
                        <div id="name">
                            <?php echo $product->name; ?>
                        </div>
                        <div id="price">
                            <?php echo $product->price . ' $'; ?>
                        </div>
                    </div>



                    <?php if ($product->size) : ?>
                        <div class="boxSize" id="size_box">
                            <?php echo "Size: ", $product->size . ' (MB)' ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($product->weight) : ?>
                        <div class="weight" id="weight_box">
                            <?php echo "Weight: ", $product->weight . ' (KG)' ?>
                        </div>
                    <?php endif; ?>
                    <div class="demension_row">
                        <?php if ($product->height) : ?>
                            <div id="height_box">
                                <?php echo "Demension: ", $product->height . 'x' ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($product->width) : ?>
                            <div id="width_box">
                                <?php echo $product->width . 'x' ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($product->length) : ?>
                            <div id="length_box">
                                <?php echo $product->length  ?>
                            </div>
                        <?php endif; ?>

                    </div>



                </div>
            <?php endforeach; ?>


        </div>
        </form>

    </div>
    <footer>
        <hr>

        <p>Scandiweb Test Assignment</p>
    </footer>

</body>

</html>
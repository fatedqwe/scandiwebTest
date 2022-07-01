<?php
include "product.php";


?>
<!doctype html>

<html>


<head>

    <meta charset="utf-8">

    <title>Product Add</title>

    <link rel="stylesheet" href="styles.css">

</head>


<body>
    <form id="product_form" action="script/create.php" method="post">
        <div class="main_container">
            <div class="main">
                <h1>Product Add</h1>
                <div class="buttonSave">
                    <button class="button3" type="submit" style="vertical-align:middle; color:white ; background-color:blue">
                        <span1>Save</span1>
                    </button>
                    <button onclick="location.href='index.php'" ; class="button4" type="reset" style="color:white ; background-color: #f44336">Cancel</button>
                </div>



            </div>

            <hr><br><br><br>


            <div class="SKU">
                <label id="sku">SKU</label>

                <input class="text_SKU" type="text" name="SKU" required="true">

            </div>


            <div class="name">
                <label id="name">Name</label>
                <input class="text_name" type="text" name="name" required="true">
            </div>

            <div class="price">
                <label id="price">Price($)</label>
                <input class="text_price" type="number" name="price" min="0" required="true">
            </div>
            <div class="select">
                <label for="select">Type Switcher</label>

                <select class="productType" id="productType" onchange="t1()">
            </div>
            <option selected disabled hidden>Select product</option>

            <?php foreach (Product::getAllTypes() as $key => $value) : ?>
                <option value="<? echo $key; ?>"><? echo $value; ?></option>
            <?php endforeach; ?>

            </select>

        </div>










    </form>

    <footer>
        <hr>
        <p>Scandiweb Test Assignment</p>
    </footer>
</body>


<script>
    const t1 = () => {
        const switcher = document.getElementById('productType');
        const form = document.getElementById('product_form');

        deleteElements();
        let switcherValue = switcher.value
        switcherValue === "disc" ? handleDiscClicked(form) : switcherValue === "book" ? handleBookClicked(form) : switcherValue === "furniture" ? handleFurnitureClicked(form) : false
    }

    const handleDiscClicked = (parentElement) => {
        const isAlreadyAdded = document.getElementById("size");
        isAlreadyAdded ? false : createSizeInput(parentElement);

    }

    const createSizeInput = (parentElement) => {
        const label = document.createElement("label");
        label.textContent = "Size (MB)";
        label.setAttribute("id", "size");
        const input = document.createElement("input");
        input.setAttribute("type", "number");
        // input.setAttribute("oninvalid", "this.setCustomValidity('Please, submit required data');");
        input.setAttribute("required", " ");
        input.setAttribute("name", "size");
        input.setAttribute("id", "size_input");
        parentElement.append(label);
        parentElement.append(input);



    }

    const handleBookClicked = (parentElement) => {
        const isAlreadyAdded = document.getElementById("book");
        isAlreadyAdded ? false : createBookInput(parentElement);
    }

    const createBookInput = (parentElement) => {
        const label = document.createElement("label");
        label.textContent = "Weight (KG)";
        label.setAttribute("id", "weight");
        const input = document.createElement("input");
        input.setAttribute("type", "number");
        input.setAttribute("required", "");
        input.setAttribute("name", "weight");
        input.setAttribute("id", "weight_input");
        parentElement.append(label);
        parentElement.append(input);

    }

    const handleFurnitureClicked = (parentElement) => {
        const isAlreadyAdded = document.getElementById("furniture");
        isAlreadyAdded ? false : createFurnitureInput(parentElement);
    }

    const createFurnitureInput = (parentElement) => {
        let container = document.createElement("div");
        let container2 = document.createElement("div");
        let container3 = document.createElement("div");
        let labelHeight = document.createElement("label");
        let labelWidth = document.createElement("label");
        let labelLength = document.createElement("label");
        labelHeight.textContent = "Height (CM)";
        labelWidth.textContent = "Width (CM)";
        labelLength.textContent = "Length (CM)";
        labelHeight.setAttribute("id", "height");
        labelWidth.setAttribute("id", "width");
        labelLength.setAttribute("id", "length");
        let inputHeight = document.createElement("input");
        let inputWidth = document.createElement("input");
        let inputLength = document.createElement("input");
        inputHeight.setAttribute("type", "number");
        inputHeight.setAttribute("required", "");
        inputWidth.setAttribute("type", "number");
        inputWidth.setAttribute("required", "");
        inputLength.setAttribute("type", "number");
        inputLength.setAttribute("required", "");
        inputHeight.setAttribute("name", "height");
        inputHeight.setAttribute("id", "height_input");
        inputWidth.setAttribute("name", "width");
        inputWidth.setAttribute("id", "width_input");
        inputLength.setAttribute("name", "length");
        inputLength.setAttribute("id", "length_input");


        // parentElement.append(labelHeigth);
        // parentElement.append(inputHeigth);
        container.append(labelHeight);
        container.append(inputHeight);
        parentElement.append(container);
        // parentElement.append(labelWidth);
        // parentElement.append(inputWidth);
        container2.append(labelWidth);
        container2.append(inputWidth);
        parentElement.append(container2);
        parentElement.append(labelLength);
        parentElement.append(inputLength);
        // container3.append(labelWidth);
        // container3.append(inputWidth);
        // parentElement.append(container3);


    }

    const deleteElements = () => {

        const sizeLabel = document.querySelector("label#size");
        const sizeInput = document.querySelector("input[name=size]");

        sizeLabel ? (sizeLabel.remove(), sizeInput.remove()) : false;

        const weightLabel = document.querySelector("label#weight");
        const weightInput = document.querySelector("input[name=weight]");

        weightLabel ? (weightLabel.remove(), weightInput.remove()) : false;

        const heightLabel = document.querySelector("label#height");
        const inputHeight = document.querySelector("input[name=height]");
        const widthLabel = document.querySelector("label#width");
        const inputWidth = document.querySelector("input[name=width]");
        const lengthLabel = document.querySelector("label#length");
        const inputLength = document.querySelector("input[name=length]");


        heightLabel ? (heightLabel.remove(), inputHeight.remove()) : false;
        widthLabel ? (widthLabel.remove(), inputWidth.remove()) : false;
        lengthLabel ? (lengthLabel.remove(), inputLength.remove()) : false;


    }
</script>
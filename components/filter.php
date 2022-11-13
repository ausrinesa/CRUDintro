<div class="box">
    <div class="d-flex flex-row  mb-3">
        <form class="row g-3" method="GET">
            <div class="col-auto">

                <select class="form-select form-control filter" name="filter" aria-label="Default select example"
                    id="category">
                    <option value="" selected> category </option>
                    <?php foreach ($categories as $key => $category) { ?>
                    <option>
                        <?= $category ?>
                    </option>
                    <?php } ?>
                </select>

            </div>
            <div class="col-2">

                <input type="text" class="form-control filter" placeholder="price: from" name="priceFrom">
            </div>
            <div class="col-2">
                <input type="text" class="form-control filter" placeholder="price: to" name="priceTo">

            </div>

            <div class="col-auto">

                <select class="form-select form-control filter" aria-label="Default select example" name="sort">
                    <option selected value="0"> Sort </option>
                    <option value="1"> price: low to high </option>
                    <option value="2"> price: high to low </option>
                    <option value="3"> name: A-Z </option>
                    <option value="4"> name: Z-A </option>
                </select>

            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" id="filterBtn">Filter</button>
            </div>
    </div>
</div>

</form>
</div>
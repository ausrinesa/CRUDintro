<div class="container col-lg-4" id="form">
    <form method="post">
        <div class="mb-3">
            <label for="form" class="form-label">Item name</label>
            <input type="text" name='name' class="form-control" oninput="this.value = this.value.toUpperCase()"
                id="form" value=<?=($edit) ? $item->name : " " ?>>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name='price' class="form-control" id="price" value=<?=($edit) ?
                $item->price : " " ?>>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name='about' class="form-control" id="description"> <?=($edit) ? $item->about :
    " " ?> </textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>

            <select class="form-select form-control filter" name="categoryId" aria-label="Default select example"
                id="category">
                <option value="<?=($edit) ? $item->categoryId :
    " " ?>" selected> category </option>
                <?php foreach ($categories as $key => $category) { ?>
                <option value="<?= $category->id ?>">
                    <?= $category->category ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <?php if ($edit) { ?>
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <button type="submit" id="updateBtn" name="update" class="btn"> Update</button>
        <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
        <?php } ?>
    </form>
</div>
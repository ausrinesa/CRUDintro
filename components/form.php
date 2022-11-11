<div class="container col-xxl-4" id="form">
    <form method="post">
        <div class="mb-3">
            <label for="form" class="form-label">Item name</label>
            <input type="text" name='name' class="form-control" id="form" value=<?=($edit) ? $item->name : " " ?> >
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category" value=<?=($edit) ?
                $item->category : " " ?>>>
                <?php foreach ($categories as $key => $category) { ?>
                <option>
                    <?= $category ?>
                </option>
                <?php } ?>
            </select>
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
        <?php if ($edit) { ?>
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Update</button>
        <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
        <?php } ?>
    </form>
</div>
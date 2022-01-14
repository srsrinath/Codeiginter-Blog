<table class=" table table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                   




<?php foreach ($categories as $key => $category): ?>
    <tr>
        <td> <?= $category['c_id'] ?> </td>
        <td> <?= $category['name'] ?> </td>
        <td>
            <button type="button" class="btn btn-sm btn-success edit-btn" data-id="<?= $category['c_id'] ?>">Edit</button>
            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="<?= $category['c_id']; ?>">Delete</button>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
                                </table>

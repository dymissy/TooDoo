<div class="page-header">
    <h1><?php echo $list->name ?></h1>
</div>


<?php if ( ! empty( $items ) ): ?>
    <table class="items todolist table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Creation Date</th>
                <th>Update Date</th>
                <th>Priority</th>
            </tr>
        </thead>
        <?php foreach ( $items as $item ): ?>
            <tr data-item="<?php echo $item->id ?>">
                <td><a href="<?php echo HOME_URL . 'item/delete/' . $item->id . '/' . $list->id ?>" class="close" >&times;</a></td>
                <td data-field="text" contenteditable><?php echo $item->text ?></td>
                <td data-field="description" contenteditable><?php echo $item->description ?></td>
                <td><?php echo $item->created_at ?></td>
                <td><?php echo $item->updated_at ?></td>
                <td><?php echo $item->priority ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php else: ?>
    <p>No Items found.</p>
<?php endif; ?>

<a href="<?php echo HOME_URL ?>item/add/" type="button" class="btn btn-primary btn-sm">Add new item</a>
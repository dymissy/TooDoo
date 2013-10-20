<div class="page-header">
    <h1><?php echo $list->name ?></h1>
</div>


<?php if ( ! empty( $items ) ): ?>
    <table class="todolist table table-hover">
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
            <tr>
                <td><a href="<?php echo HOME_URL . 'item/delete/' . $item->id . '/' . $list->id ?>" class="close" >&times;</a></td>
                <td><?php echo $item->text ?></td>
                <td><?php echo $item->description ?></td>
                <td><?php echo $item->created_at ?></td>
                <td><?php echo $item->updated_at ?></td>
                <td><?php echo $item->priority ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <a href="<?php echo HOME_URL ?>item/add/" type="button" class="btn btn-primary btn-sm">Add new item</a>
<?php else: ?>
    <p>No Items found.</p>
<?php endif; ?>
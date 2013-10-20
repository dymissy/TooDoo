<div class="page-header">
    <h1>My To-Do Lists</h1>
</div>

<?php if ( ! empty( $lists ) ): ?>
    <table class="todolist table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Creation Date</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach ( $lists as $list ): ?>
            <tr>
                <td><a href="<?php echo HOME_URL . 'todolist/delete/' . $list->id ?>" class="close" >&times;</a></td>
                <td><?php echo $list->name ?></td>
                <td><?php echo $list->description ?></td>
                <td><?php echo $list->created_at ?></td>
                <td><a href="<?php echo HOME_URL . 'todolist/view/' . $list->id ?>">View</a></td>
            </tr>
        <?php endforeach ?>
    </table>

<?php else: ?>
    <p>No Lists found.</p>
<?php endif; ?>

<a href="<?php echo HOME_URL ?>todolist/add/" type="button" class="btn btn-primary btn-sm">Add new list</a>
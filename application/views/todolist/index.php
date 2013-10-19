<h1>My ToDo Lists</h1>

<?php if ( ! empty( $lists ) ): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Creation Date</th>
            <th></th>
        </tr>
        <?php foreach ( $lists as $list ): ?>
            <tr>
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
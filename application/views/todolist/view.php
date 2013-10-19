<h1><?php echo $list->name ?></h1>

<?php if ( ! empty( $items ) ): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Creation Date</th>
            <th>Update Date</th>
            <th>Priority</th>
        </tr>
        <?php foreach ( $items as $item ): ?>
            <tr>
                <td><?php echo $item->text ?></td>
                <td><?php echo $item->description ?></td>
                <td><?php echo $item->created_at ?></td>
                <td><?php echo $item->updated_at ?></td>
                <td><?php echo $item->priority ?></td>
            </tr>
        <?php endforeach ?>
    </table>


<?php else: ?>
    <p>No Items found.</p>
<?php endif; ?>
<div class="page-header">
    <h1>Add new To-Do list</h1>
</div>

<?php if( isset($error) ): ?>
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        An error occurred while attempt to save the list. Please check the fields below.
    </div>
<?php endif ?>

<form class="form-horizontal" role="form" method="post">
    <div class="form-group<?php if( isset($error['name']) ): ?> has-error<?php endif ?>">
        <label for="inputEmail1" class="col-lg-2 control-label">List Name</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php if( isset($values['name']) ) echo $values['name']; ?>">
        </div>
    </div>
    <div class="form-group<?php if( isset($error['description']) ): ?> has-error<?php endif ?>">
        <label for="inputPassword1" class="col-lg-2 control-label">List Description</label>
        <div class="col-lg-10">
            <textarea class="form-control" id="description" name="description" placeholder="Description"><?php if( isset($values['description']) ) echo $values['description']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary btn-sm" name="addlist">Add new list</button>
            <a href="<?php echo HOME_URL ?>todolist" class="btn btn-default btn-sm">Back</a>
        </div>
    </div>
</form>
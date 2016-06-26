<?php include 'includes/header.php'; ?>
<?php
$id = $_GET['id'];
//Create DB object
$db = new Database();

//Select Categories   
$query = "SELECT * FROM categories WHERE id =" . $id;
$categories = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    if ($name == '') {
        $error = 'Please fill out all required fields';
        echo $error;
    } else {
        $query = "UPDATE categories "
                . " SET "
                . " name = '$name'"
                . " WHERE id =" . $id;

        var_dump($query);
        $update_row = $db->update($query);
    }
}
if (isset($_POST['delete'])) {
   
        $query = " DELETE FROM categories "
                . " WHERE id =" . $id;
        
        $delete_row = $db->delete($query);
    }
?>
<div class="row">


    <form role="form" method="post" action="edit_category.php?id=<?php echo $id ?>">
        <div class="form-group">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Enter Category Name" value="<?php echo $categories['name']; ?>">
        </div>

        <div>
            <input name="submit" type="submit" class="btn btn-default" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
        </div>

        <br/>
    </form>   

</div>

<?php include 'includes/footer.php'; ?>
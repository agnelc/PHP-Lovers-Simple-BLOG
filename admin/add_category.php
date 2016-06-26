<?php include 'includes/header.php'; ?>
<?php

//Create DB object
$db = new Database();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    
    if($name == ''){
        
        $error = 'Please fill out all required fields';
        echo $error;
    }else{
        $query = "INSERT INTO categories "
                . "(name)"
                . "VALUES ('$name')";
        
                var_dump($query);
		$insert_row = $db->insert($query);
    }

}
//Select Categories   
$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>
<div class="row">


    <form role="form" method="post" action="add_category.php">
        <div class="form-group">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Enter Category Name">
        </div>

        <div>
            <input name="submit" type="submit" class="btn btn-default" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
        </div>

        <br/>
    </form>   

</div>

<?php include 'includes/footer.php'; ?>
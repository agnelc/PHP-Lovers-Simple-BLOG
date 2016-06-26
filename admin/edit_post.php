<?php include 'includes/header.php'; ?>

<?php

$id = $_GET['id'];
//Create DB object
$db = new Database();

//Select Posts 
$query = "SELECT * FROM posts WHERE id =".$id;
$post = $db->select($query)->fetch_assoc();

//Select Categories   
$query = "SELECT * FROM categories";
$categories = $db->select($query);



if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $body = mysqli_real_escape_string($db->link,$_POST['body']);
    $category = mysqli_real_escape_string($db->link,$_POST['category']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
    
    if($title == '' || $body == '' || $category == '' || $author == ''){
        
        $error = 'Please fill out all required fields';
        echo $error;
    }else{
        $query = "UPDATE posts "
                . " SET "
                . " title = '$title',"
                . " body = '$body',"
                . " category = '$category',"
                . " author = '$author',"
                . " tags = '$tags' "
                . " WHERE id =".$id;
        
                var_dump($query);
		$update_row = $db->update($query);
    }

}
if (isset($_POST['delete'])) {
   
        $query = " DELETE FROM posts "
                . " WHERE id =" . $id;

        $delete_row = $db->delete($query);
        
        var_dump($delete_row);
    }



?>
<div class="row">


    <form role="form" method="post" action="edit_post.php?id=<?php echo $id?>">
        <div class="form-group">
            <label>Post Title</label>
            <input name="title" type="text" class="form-control"  placeholder="Enter Title" value="<?php echo $post['title'];?>">
        </div>
        <div class="form-group">
            <label>Post Body</label>
            <textarea name="body" type="text" class="form-control"  placeholder="Enter Post Body" ><?php echo $post['body'];?></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control">
                <?php while($row = $categories->fetch_assoc()): ?>
                <?php if($row['id']==$post['category'])
                {
                    $selected="selected";
                }else{
                    $selected = "";
                }  
                ?>
                <option <?php echo $selected;?> value="<?php echo $row['id'] ;?> "> <?php echo $row['name'] ;?> </option>
                <?php endwhile;?>
            </select>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input name="author" type="text" class="form-control"  placeholder="Enter Author Name"  value="<?php echo $post['author'];?>" >
        </div>
        <div class="form-group">
            <label>Tags</label>
            <input name="tags" type="text" class="form-control"  placeholder="Enter Tags"  value="<?php echo $post['tags'];?>" >
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
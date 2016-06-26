
<?php include 'includes/header.php'; ?>
<?php
//Create DB object
$db = new Database();

//Select Posts 
$query = "SELECT * FROM posts ORDER BY date DESC";
$posts = $db->select($query);

//Select Categories   
$query = "SELECT * FROM categories";
$categories = $db->select($query);
//Select about   
$query = "SELECT * FROM about";
$about = $db->select($query);
?>
<?php if ($posts): ?>
    <?php while ($row = $posts->fetch_assoc()): ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
            <?php echo shortenText($row['body']); ?>
            <a href="post.php?id=<?php echo urlencode($row['id']); ?>" class="readmore">Read More</a>
        </div><!-- /.blog-post -->
    <?php endwhile; ?>


<?php else : ?>
    <p>There are no posts yet.</p>
<?php endif; ?>


<?php include 'includes/footer.php'; ?>
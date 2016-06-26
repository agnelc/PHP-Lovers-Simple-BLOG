

</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p><?php
            if (isset($about)) {
                while ($row = $about->fetch_assoc()) {
                    echo $row['text'];
                }
            }
            ?>

        </p>
    </div>
    <div class="sidebar-module">
        <h4>Categories</h4>
        <?php if (isset($categories)): ?>
            <ol class="list-unstyled">
                <?php while ($row = $categories->fetch_assoc()) : ?>
                    <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                <?php endwhile; ?>
            </ol>
        <?php else : ?>
            No categories
        <?php endif; ?>
    </div>
</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>AGNEL BLOG <a href="#">AGNEL BLOG</a> &copy; 2016 <a href="https://www.agnel.ga/#">#</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.js"></script>
</body>
</html>
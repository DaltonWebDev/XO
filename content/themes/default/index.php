<?php 
// Require insertHeader function
require_once "layout/insertHeader.php"; 
// Execute function, no page title
insertHeader();
?>
<div class="section">
    <h2>Posts</h2>
    <?php
    $showPosts = showPosts(50);
    // No posts
    if (empty($showPosts)) {
        $showPostsHtml = "<h3>There isn't any posts available.</h3>";
    } else {
        $showPostsHtml = "";
        foreach ($showPosts as $post) {
            $showPostsHtml .= "<h1>" . $post["title"] . "</h1>";
            $showPostsHtml .= "<p>" . $post["content"] . "</p>";
        }
    }
    echo $showPostsHtml;
    ?>
</div>
<?php require_once "layout/footer.php"; ?>
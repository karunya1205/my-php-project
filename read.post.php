<?php
$conn = new mysqli("localhost", "root", "1234", "blog");
$result = $conn->query("SELECT * FROM posts");
while($row = $result->fetch_assoc()) {
    echo "<h2>".$row['title']."</h2>";
    echo "<p>".$row['content']."</p>";
    echo "<a href='update_post.php?id=".$row['id']."'>Edit</a> ";
    echo "<a href='delete_post.php?id=".$row['id']."'>Delete</a><hr>";
}
?>
<a href="create_post.php">Add New Post</a>

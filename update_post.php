<?php
$conn = new mysqli("localhost", "root", "", "blog");
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: read_posts.php");
}

$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$row = $result->fetch_assoc();
?>

<form method="POST">
    <input type="text" name="title" value="<?= $row['title'] ?>" required><br>
    <textarea name="content" required><?= $row['content'] ?></textarea><br>
    <button type="submit">Update Post</button>
</form>

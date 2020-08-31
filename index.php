<?php

include 'includes/database.php';

$conn = getDB();

$sql = "SELECT *
        FROM article
        ORDER BY id";

$results = mysqli_query($conn, $sql);

if($results == false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<?php require 'includes/header.php'; ?>

    <a href="new_article.php"><h2>New article</h2></a>

    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                    <p><?= htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require 'includes/footer.php'; ?>
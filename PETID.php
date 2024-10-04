<?php
include 'includes/header.inc';
include 'includes/nav.inc';
include 'includes/db_connect.inc';

$query = "SELECT * FROM pets";
$result = $conn->query($query);
?>

<main>
    <h1>Available Pets</h1>
    <ul>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <a href="details.php?petid=<?= $row['petid']; ?>">
                    <?= $row['petname']; ?> (<?= $row['type']; ?>) - <?= $row['age']; ?> months
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</main>

<?php include 'includes/footer.inc'; ?>

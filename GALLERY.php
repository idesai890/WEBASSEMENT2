<?php
include 'includes/header.inc';
include 'includes/nav.inc';
include 'includes/db_connect.inc';

$query = "SELECT * FROM pets";
$result = $conn->query($query);
?>

<main>
    <h1>Gallery of Pets</h1>
    <div class="gallery">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="pet">
                <img src="img/DOG1.png<?= $row['image']; ?>" alt="<?= $row['caption']; ?>">
                <p><?= $row['petname']; ?> - <?= $row['type']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include 'includes/footer.inc'; ?>

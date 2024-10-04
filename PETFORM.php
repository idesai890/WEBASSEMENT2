<?php
include 'includes/header.inc';
include 'includes/nav.inc';
include 'includes/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petname = $_POST['petname'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $query = "INSERT INTO pets (petname, type, description, age, image, caption, location) 
                  VALUES (:petname, :type, :description, :age, :image, :caption, :location)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':petname', $petname);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':caption', $_POST['caption']);
        $stmt->bindParam(':location', $location);

        if ($stmt->execute()) {
            echo "New pet added successfully!";
        } else {
            echo "Error adding pet.";
        }
    }
}
?>

<main>
    <h1>Add a New Pet</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <label for="petname">Pet Name:</label>
        <input type="text" name="petname" required>

        <label for="type">Type:</label>
        <input type="text" name="type" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="age">Age (months):</label>
        <input type="number" name="age" required>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" required>

        <label for="caption">Image Caption:</label>
        <input type="text" name="caption" required>

        <label for="location">Location:</label>
        <input type="text" name="location" required>

        <input type="submit" value="Add Pet">
    </form>
</main>

<?php include 'includes/footer.inc'; ?>

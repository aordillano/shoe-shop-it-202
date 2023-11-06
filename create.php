<!--Alieyah Ordillano, 11/03/2023, IT 202-001, Section 001 Unit 7 Assignment, amo47@njit.edu-->
<?php
    // Gets data from database
    require_once('database.php');
    $db = getDB();
    $query = 'SELECT * FROM shoeCategories ORDER BY shoeCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $shoeCategories = $statement->fetchAll();
    $statement->closeCursor();

    // Checks if there is already any data in the input fields
    if (!isset($shoe_code))  {$shoe_code='';}
    if (!isset($shoe_name)) {$shoe_name='';}
    if (!isset($description)) {$description = '';}
    if (!isset($price)) {$price = '';}
?>
<!-- Code for create page -->
<html>
    <!-- Title on tab bar and styling -->
    <head>
        <title>Create</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <!-- Puts in header -->
        <?php include('header.php'); ?>
        <!-- Navigation bar -->
        <nav>
            <a href="home_page.php">Home</a> |
            <a href="shipping.php">Shipping</a> |
            <a href="shoes.php">Shoes</a> |
            <a href="create.php">Create</a> |
        </nav>
        <main>
            <h2>Create and Add Shoe Item</h2>
            <form action="add_shoe.php" method="post">
                <label>Category: </label>
                <!-- Creates a dropdown menu for shoe categories -->
                <select name="shoe_category_id">
                    <?php foreach ($shoeCategories as $shoeCategory) : ?>
                        <option value="<?php echo $shoeCategory['shoeCategoryID']; ?>">
                            <?php echo $shoeCategory['shoeCategoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <!-- Input for other shoe item attributes -->
                <label>Shoe Code: </label>
                <input type="text" name="shoe_code" value="<?php echo htmlspecialchars($shoe_code); ?>" />
                <br>
                <label>Shoe Name: </label>
                <input type="text" name="shoe_name" value="<?php echo htmlspecialchars($shoe_name); ?>"/>
                <br>
                <label>Description: </label>
                <input type="textarea" name="description" value="<?php echo htmlspecialchars($description); ?>"/>
                <br>
                <label>List Price: </label>
                <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>"/>
                <br>
                <input type="submit" value="Add Shoe" />
            </form>
        </main>
        <!-- Puts in footer -->
        <?php include('footer.php'); ?>
    </body>
</html>

    
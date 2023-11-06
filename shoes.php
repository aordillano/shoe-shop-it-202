<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 5 Assignment, amo47@njit.edu-->
<?php
    require_once('database.php');
    $db = getDB();

    //getting shoe category id
    $shoe_category_id = filter_input(INPUT_GET, 'shoe_category_id', FILTER_VALIDATE_INT);
    //checks if category id is empty or invalid and assigns one if so
    if($shoe_category_id == NULL || $shoe_category_id == FALSE) {
        $shoe_category_id = 1;
    }

    //getting name for a selected category
    $queryShoeCategory = 'SELECT * FROM shoeCategories WHERE shoeCategoryID = :shoe_category_id';
    $statement1 = $db->prepare($queryShoeCategory);
    $statement1->bindValue(':shoe_category_id', $shoe_category_id);
    $statement1->execute();
    $shoe_category = $statement1->fetch();
    $shoe_category_name = $shoe_category['shoeCategoryName'];
    $statement1->closeCursor();

    //getting all categories
    $queryAllShoeCategories = 'SELECT * FROM shoeCategories ORDER BY shoeCategoryID';
    $statement2 = $db->prepare($queryAllShoeCategories);
    $statement2->execute();
    $shoeCategories = $statement2->fetchAll();
    $statement2->closeCursor();

    //getting shoe items for selected category
    $queryShoeItems = 'SELECT * FROM shoes WHERE shoeCategoryID = :shoe_category_id ORDER BY shoeID';
    $statement3 = $db->prepare($queryShoeItems);
    $statement3->bindValue(':shoe_category_id', $shoe_category_id);
    $statement3->execute();
    $shoes = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<html>
    <!-- title on tab bar -->
    <head>
        <title>CynoShoes</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <!-- includes banner for all web pages -->
        <?php include('header.php'); ?>
        <!-- navigation bar -->
        <nav>
            <a href="home_page.php">Home</a> |
            <a href="shipping.php">Shipping</a> |
            <a href="shoes.php">Shoes</a> |
            <a href="create.php">Create</a> |
        </nav>
        <main>
            <!-- for the categories links -->
            <aside>
                <h2>Categories</h2>
                <nav>
                    <ul>
                        <!-- extracts data from shoeCategories table -->
                        <?php foreach ($shoeCategories as $shoeCategory) : ?>
                            <li>
                                <a href="?shoe_category_id=<?php echo $shoeCategory['shoeCategoryID'] ?>">
                                <?php echo $shoeCategory['shoeCategoryName'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <!-- for the shoes table -->
            <section>
                <h2><?php echo $shoe_category_name; ?></h2>
                <table>
                    <!-- table headers -->
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                    <!-- extracts data from shoes table -->
                    <?php foreach ($shoes as $shoe) : ?> 
                        <tr>
                            <td><?php echo $shoe['shoeCode']; ?></td>
                            <td><?php echo $shoe['shoeName']; ?></td>
                            <td><?php echo $shoe['description']; ?></td>
                            <td><?php echo $shoe['price']; ?></td>
                            <td>
                                <!-- any action done needs a form -->
                                <form action="delete_shoe.php" method="post">
                                    <input type="hidden" name="shoe_id"
                                        value="<?php echo $shoe['shoeID']; ?>" />
                                    <input type="hidden" name="shoe_category_id"
                                        value="<?php echo $shoe['shoeCategoryID']; ?>" />
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>
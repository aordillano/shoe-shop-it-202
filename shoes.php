<!--Alieyah Ordillano, 12/01/2023, IT 202-001, Section 001 Unit 11 Assignment, amo47@njit.edu-->
<?php
    require_once('database.php');

    // Starts session if not set
    if (!isset($_SESSION['is_valid_admin'])) { 
        session_start();
    }

    $db = getDB();

    // Getting shoe category id
    $shoe_category_id = filter_input(INPUT_GET, 'shoe_category_id', FILTER_VALIDATE_INT);
    // Checks if category id is empty or invalid and assigns one if so
    if($shoe_category_id == NULL || $shoe_category_id == FALSE) {
        $shoe_category_id = 1;
    }

    // Getting name for a selected category
    $queryShoeCategory = 'SELECT * FROM shoeCategories WHERE shoeCategoryID = :shoe_category_id';
    $statement1 = $db->prepare($queryShoeCategory);
    $statement1->bindValue(':shoe_category_id', $shoe_category_id);
    $statement1->execute();
    $shoe_category = $statement1->fetch();
    $shoe_category_name = $shoe_category['shoeCategoryName'];
    $statement1->closeCursor();

    // Getting all categories
    $queryAllShoeCategories = 'SELECT * FROM shoeCategories ORDER BY shoeCategoryID';
    $statement2 = $db->prepare($queryAllShoeCategories);
    $statement2->execute();
    $shoeCategories = $statement2->fetchAll();
    $statement2->closeCursor();

    // Getting shoe items for selected category
    $queryShoeItems = 'SELECT * FROM shoes WHERE shoeCategoryID = :shoe_category_id ORDER BY shoeID';
    $statement3 = $db->prepare($queryShoeItems);
    $statement3->bindValue(':shoe_category_id', $shoe_category_id);
    $statement3->execute();
    $shoes = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<html>
    <!-- Title on tab bar -->
    <head>
        <title>Shoes</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <?php
            // Includes header
            include('header.php'); 
            // Includes navigation based on session status
            include('menu.php'); 
        ?>
        <main>
            <!-- For the categories links -->
            <aside>
                <h2>Categories</h2>
                <nav style="margin-left: 16em;">
                    <ul>
                        <!-- Extracts data from shoeCategories table -->
                        <?php foreach ($shoeCategories as $shoeCategory) : ?>
                            <li>
                                <!-- Makes shoe code a link to show show details on shoe_details.php -->
                                <a href="shoes.php?shoe_category_id=<?php echo $shoeCategory['shoeCategoryID'] ?>">
                                    <?php echo $shoeCategory['shoeCategoryName'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <!-- For the shoes table -->
            <section>
                <h2><?php echo $shoe_category_name; ?></h2>
                <table>
                    <!-- Table headers -->
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                    <!-- Extracts data from shoes table -->
                    <?php foreach ($shoes as $shoe) : ?> 
                        <tr>
                            <td>
                                <a href="shoe_details.php?shoe_id=<?php echo $shoe['shoeID']; ?>">
                                    <?php echo $shoe['shoeCode']; ?>
                                </a>
                            </td>
                            <td><?php echo $shoe['shoeName']; ?></td>
                            <td><?php echo $shoe['description']; ?></td>
                            <td><?php echo $shoe['price']; ?></td>
                            <!-- Delete button appears if one is signed in -->
                            <?php if (isset($_SESSION['is_valid_admin'])) { ?>
                                <td>
                                    <!-- To delete item -->
                                    <form class="delete_form" action="delete_shoe.php" method="post">
                                        <input type="hidden" name="shoe_id"
                                            value="<?php echo $shoe['shoeID']; ?>" />
                                        <input type="hidden" name="shoe_category_id"
                                            value="<?php echo $shoe['shoeCategoryID']; ?>" />
                                        <input type="submit" class="delete_button" value="Delete" />
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </main>
        <!-- JS to confirm deletion -->
        <script src="confirm_delete.js"></script>
        <?php include('footer.php'); ?>
    </body>
</html>
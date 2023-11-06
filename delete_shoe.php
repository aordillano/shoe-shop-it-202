<?php 
    // Slide 37
    require_once('database.php');

    //get the values
    $shoe_id = filter_input(INPUT_POST, 'shoe_id', FILTER_VALIDATE_INT);
    $shoe_category_id = filter_input(INPUT_POST, 'shoe_category_id', FILTER_VALIDATE_INT);

    if($shoe_id != FALSE && $shoe_category_id != FALSE) {
        //delete the product from the database
        $db = getDB();
        $query = 'DELETE FROM shoes WHERE shoeID = :shoe_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':shoe_id', $shoe_id);
        $success = $statement->execute();
        $statement->closeCursor();

        include('shoes.php');
        echo '<p>Shoe item has been deleted successfully.</p>';
    }
?>
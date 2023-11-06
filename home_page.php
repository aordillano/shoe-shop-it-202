<!--Alieyah Ordillano, 10/06/2023, IT 202-001, Section 001 Unit 3 Assignment, amo47@njit.edu-->
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <!-- Puts in header -->
        <?php include('header.php'); ?>
            <!-- Makes navigation menu at the top -->
            <nav>
                <a href="home_page.php">Home</a> |
                <a href="shipping.php">Shipping</a> |
                <a href="shoes.php">Shoes</a> |
                <a href="create.php">Create</a> |
            </nav>
            <main>
                <!-- Subheading and description -->
                <h3>Welcome to our page! Wondering who we are?</h3>
                <p>CynoShoes is a small shoe business that is run
                    by a small team of creatives that seek to provide
                    high-quality fashion footwear for women. CynoShoes
                    comes from the combination of the words cynosure and
                    shoes. Cynosure was used in the 17th century for the North Star.
                    It also describes someone as a "center of attention"
                    or "serves to guide." Our team seeks to create shoes that
                    will serve this purpose for its owner: stand out from the 
                    crowd and guide them to their destination. CynoShoes was
                    found in 2019 and we are a team of 10 people aiming
                    to create better shoes for a better life for you.
                </p>
                <br>
                <!-- Product Section and Images -->
                <h1>Our Products</h1>
                <h2>We make footwear for all seasons...</h2>
                <div id='summer'>
                    <figure>
                        <img src="images/beige_sandals.webp" alt="Sol Beige Summer Sandals" height="200" />
                    </figure>
                    <h3>For the summer</h3>
                    <p>Sol Beige Summer Sandals</p>
                </div>
                <div id='winter'>
                    <figure>
                        <img src="images/black_boots.webp" alt="Luna Black Knee-High Boots" height="200" />
                    </figure>
                    <h3>For the winter</h3>
                    <p>Luna Black Knee-High Boots</p>
                </div>
                <div id='fall'>
                    <figure>
                        <img src="images/white_sneakers.webp" alt="Mariposa White Sneakers" height="200" />
                    </figure>
                    <h3>For the fall</h3>
                    <p>Mariposa White Sneakers</p>
                </div>
                <div id='spring'>
                    <figure>
                        <img src="images/sparkly_flats.jpg" alt="Jewel Sparkly Silver Pointed Flats" height="200" />
                    </figure>
                    <h3>For the spring</h3>
                    <p>Jewel Sparkly Silver Pointed Flats</p>
                </div>
                <br>
                <h2 id='second_h2'>...And for all occasions!</h2>
                <div id='girls_night_out'>
                    <figure style="width:175">
                        <img src="images/sparkly_heels.jpg" alt="Stella Sparkly Silver Heels" height="200" />
                    </figure>
                    <h3>For a girls' night out</h3>
                    <p>Stella Sparkly Silver Heels</p>
                </div>
                <div id='quinceanera'>
                    <figure>
                        <img src="images/rose_gold_heels.avif" alt="Flora Rose Gold Heels" height="200" />
                    </figure>
                    <h3>For a quinceañera</h3>
                    <p>Flora Rose Gold Heels</p>
                </div>
                <div id='wedding'>
                    <figure>
                        <img src="images/white_pumps.jpg" alt="Ayla White Chunky Heels" height="200" />
                    </figure>
                    <h3>For a wedding</h3>
                    <p>Ayla White Chunky Heels</p>
                </div>
                <div id='movie_night'>
                    <figure>
                        <img src="images/pink_slides.jpg" alt="Rosa Pink Fluffy Slides" height="200" />
                    </figure>
                    <h3>For a home movie night</h3>
                    <p>Rosa Pink Fluffy Slides</p>
            </main>
        <?php include('footer.php'); ?>
    </body>
</html>
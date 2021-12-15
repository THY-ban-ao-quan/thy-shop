<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop THY</title>
     <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>
    <main id="root" class="home">
      <?php
        // HEADER
        require_once("header_footer/header.php");
        // SEARCH CONTAINER
        require_once("search/searchContainer.php");
        // USER CONTAINER
        require_once("user/userContainer.php");
        // MINI CART 
        require_once("cart/miniCartContainer.php");
        // FOOTER
        require_once("header_footer/footer.php");   
        // MODAL
        require_once("modal/modal.php");
      ?>
    </main>

    <!--===== JQUERY =====-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--===== MAIN JS =====-->
    <script type="module" src="./assets/js/app.js"></script>
  </body>
</html>

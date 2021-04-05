

<div class="container-fluid bg-light align-items-center py-2 border-bottom border-1">
		<div class="d-flex col-10 mx-auto align-items-center justify-content-between">
			<a class="navbar-brand align-self-center fs-2" style="height: 30px;" href="index.php<?php 
                if(isset($_GET["id"])) {
                    echo "?id=" .$_GET["id"];
                }
                if(isset($_GET["seller"])) {
                    echo "&seller";
                }
                ?>">Yourmarket</a>

			<div class="d-flex align-self-center gap-2">

        <?php 
          /*if(isset($_GET["seller"])) {
            echo "<a href='basket.php?id=fzefzef&seller' type='button' class='btn btn-success'>Sell</a>";
          }*/

        ?>
            <?php 
            if(isset($_GET["id"])) {
                include "checkIsSeller.php";
                if($isSeller == true) {
                    echo "<a href='seller.php?id=" .$_GET["id"] ."&seller' type='button' class='btn btn-success fs-5'>Sell</a>";
                }
                echo "<a href='index.php' type='button' class='btn btn-primary fs-5'>Logout</a>";

                if($isSeller == true) {
                    echo "<a href='basket.php?id=" .$_GET["id"] ."&seller' type='button' class='btn btn-dark fs-5'>Basket</a>";
                }
                else {
                    echo "<a href='basket.php?id=" .$_GET["id"] ."' type='button' class='btn btn-dark fs-5'>Basket</a>";
                }
                
            }
            else {
                echo "<a href='login.html' type='button' class='btn btn-primary fs-5'>Login</a>";
                echo "<a href='sign-inCustomer.html' type='button' class='btn btn-primary fs-5'>Sign In</a>";
            }

            ?>
                <!--<button type="button" class="btn btn-primary"  onclick="window.location.href = 'login.html';">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'sign-inCustomer.html';">Sign In</button>
                <a href="basket.php?id=fzefzef" type="button" class="btn btn-dark">Basket</a>-->
			</div>
		</div>
</div>
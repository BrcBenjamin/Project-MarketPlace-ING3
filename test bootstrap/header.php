
<div class="container-fluid bg-light align-items-center py-2 border-bottom border-1">
		<div class="d-flex col-10 mx-auto align-items-center justify-content-between">
			<a class="navbar-brand align-self-center" style="height: 30px;" href="index.php">Yourmarket</a>

			<div class="buttons align-self-center">

        <?php 
          if(isset($_GET["seller"])) {
            echo "<a href='seller.php?id=fzefzef&seller' type='button' class='btn btn-success'>Sell</a>";
          }

        ?>
                <button type="button" class="btn btn-primary"  onclick="window.location.href = 'login.html';">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'sign-inCustomer.html';">Sign In</button>
                <a href="basket.php?id=fzefzef" type="button" class="btn btn-dark">Basket</a>
			</div>
		</div>
</div>
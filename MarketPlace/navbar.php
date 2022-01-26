
<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		
        <div class="d-flex flex-wrap">
            <a href="index.php<?php 
                if(isset($_GET["id"])) {
                    echo "?id=" .$_GET["id"];
                }
                if(isset($_GET["seller"])) {
                    echo "&seller";
                }
                ?>"role="button" class="btn btn-secondary rounded-0 pt-3 fs-4 border-end border-1 text-center">Home</a>
            <a href="category1.php<?php 
                if(isset($_GET["id"])) {
                    echo "?id=" .$_GET["id"];
                }
                if(isset($_GET["seller"])) {
                    echo "&seller";
                }
                ?>"role="button" class="btn btn-secondary pt-3 fs-4 border-end border-1 text-center">Components</a>
            <a href="category2.php<?php 
                if(isset($_GET["id"])) {
                    echo "?id=" .$_GET["id"];
                }
                if(isset($_GET["seller"])) {
                    echo "&seller";
                }
                ?>"role="button" class="btn btn-secondary pt-3 fs-4 border-end border-1 text-center">Devices</a>
        </div>


        <form method="post" onsubmit="return checkSearch()" action="search.php<?php 
                if(isset($_GET["id"])) {
                    echo "?id=" .$_GET["id"];
                }
                if(isset($_GET["seller"])) {
                    echo "&seller";
                }
                ?>" class="d-flex gap-2 align-self-center pe-3">
            <input style="width:240px;height: 30px;" class="align-self-center" id="search" name="searchText" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark align-self-center margin-left" type="submit">Search</button>
        </form>
        

    <script type='text/javascript'>

                function checkSearch() {
                    if($("#search").val().length == 0) {
                        return false;
                    }
                    else {
                        return true;
                    }
                }
    </script>
        
</div>
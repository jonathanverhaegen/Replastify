<?php 


if(isset($id)){
    $user = User::getUserById($id);
}else{
    $user = ["type" => "user"];
}



?>
<header>
    <nav>

        <div class="nav__logo">
            <a href="home.php"><img class="nav__image" src="images/logo_header.png" alt=""></a>
        </div>

            <!-- <input type="checkbox" id="hamburger" >
            <label for="hamburger" class="hamburger" >
            <img class="img_hamburger" src="images/hamburger.svg" alt="hamburger">
            </label> -->


        



        <!-- <div class="menu_mob" >
            
                <a id="link" href="index.php#diensten_mob">Diensten</a>
                <a id="link" href="prijzen.php">Prijzen</a>
                <a id="link" href="offerte.php">Offerte</a>
                <a id="link" href="contact.php">Contact</a>
            
        </div> -->


        <div class="nav__menu" >
            
                <a class="menu__link"  href="home.php">Home</a>
                <a class="menu__link"  href="database.php">3D modellen</a>
                <a class="menu__link"  href="webshop.php">Filament</a>
                <a class="menu__link"  href="community.php">Community</a>
                <?php if($user["type"] === "printer"):?>
                <a class="menu__link"  href="verkoperspaneel.php">Verkoperspaneel</a>
                <?php endif;?>

                <?php if($user["type"] === "user"):?>
                <a class="menu__link"  href="orders.php">Bestellingen</a>
                <?php endif;?>

                <a class="menu__link"  href="profiel.php">Profiel</a>
            
        </div>

        

        
    </nav>
</header>
    

<html>

<body>

    <h2>Automobile</h2>

    <form method="get" action="index.php">
        <select name="marca">
			<?php 
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $idMarca = $_GET["marca"];
                    session_start();
                    $_SESSION["idMarca"] = $idMarca;
                }
				$xml = simplexml_load_file("auto.xml") or die("Error: Cannot create object");
				foreach($xml->children() as $automobile) { 
                    if($_SESSION["idMarca"] == $automobile->marca) {
					   echo "<option selected='selected' value=" . $automobile->marca . ">" . $automobile->marca . "</option>";
                    }
                    else {
                        echo "<option value=" . $automobile->marca . ">" . $automobile->marca . "</option>";
                    }
				}
			?>
        </select>        
        <?php
            if (isset($_SESSION["idMarca"])) {
                    if (isset($_GET["modello"])) {
                    $idModello = $_GET["modello"];
                    session_start();
                    $_SESSION["idModello"] = $idModello;
                }
                       echo "<br><br><select name='modello'>";
                       foreach($xml->children() as $automobile) { 
                            if($automobile->marca == $_SESSION["idMarca"]){
                                if($automobile->marca->modello == $_SESSION["idModello"]) {
                                    echo "<option selected='selected' value=" . $automobile->modello . ">" . $automobile->modello . "</option>";
                                }
                                else {
                                    echo "<option value=" . $automobile->modello . ">" . $automobile->modello . "</option>";
                                }
                              }
                       }
                }
            ?>
        <input type="submit">
    </form>
</body>

</html>
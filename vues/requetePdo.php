<?php

$monPdo = PdoGsb::getPdoGsb();
$requetePrepare1 = PdoGsb::$monPdo->prepare(
            'SELECT mois AS mois FROM fichefrais '
            
        );
$requetePrepare1->execute();
echo($requetePrepare1);

    
?>

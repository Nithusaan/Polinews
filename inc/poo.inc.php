<?php
if (defined("CHARGE_AUTOLOAD"))
{ // Chargement de l'autoload
	
  set_autoload();
}
else
	die(""); // Arrêt en erreur, en mode silence


// fonction de chargement de classe en fonction de la version de php

function set_autoload()
{


		function my_autoloader($classname) 
		{
			$filename = './class/' . $classname . '.class.php';
			 if (file_exists($filename))
				include_once($filename);
				else
				  die("Erreur fichier inconnu : ".$filename);
		}

		spl_autoload_register('my_autoloader'); //PHP > 5

}

	
?>

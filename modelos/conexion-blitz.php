<?php

class ConexionBlitz{

	public function conectarBlitz(){

		$link = new PDO("mysql:host=localhost;dbname=sanfranc_encuesta",
						"sanfranc_matriz",
						"rootWhoami929",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}

}
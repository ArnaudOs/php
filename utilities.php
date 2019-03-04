<?php
session_start();
/**
 * Permet de savoir si le visiteur est connecté ou pas
 *
 * @return boolean
 */
function isConnected() : bool
{
  $isConnected = !empty($_SESSION['connected']);
  return $isConnected;
}
/**
 * permet de couper une phrase au bout d'un certain nombre de mots
 *
 * @param string $str
 * @param integer $maxWords
 * @return void
 */
function cutWords(string $str, int $maxWords) : string//pour php 7.1 on eput préciser le type de variables
{
  $tab = explode(' ', $str);
  if ($maxWords > count($tab)) return $str;
  $resultat = array_slice($tab, 0, $maxWords);
  // for ($i = 0; i < $maxWords; $i++) {//on peut utiliser notre fonction a la palce du for
  //   $mots = $tab[i];
  //   $resultat[] = $mot;
  return implode(" ", $resultat);

}
/**
 * Permet de rediriger vers une url
 *
 * @param [type] $url
 * @return void
 */
function redirect(string $url)
{
  header('Location:' . $url);
  exit();
}

function redirectBack()
{
  redirect($_SERVER['HTTP_REFERER']);
}
/**
 * Permet d'extraire un nombre entier du Get
 *
 * @param string $name
 * @return integer
 */
function extractIntFromGet(string $name)
{
  return extractInt(INPUT_GET, $name);
}
/**
 * Permet d'extraire un nombre entier du Post
 *
 * @param string $name
 * @return integer
 */
function extractIntFromPost(string $name)
{
  return extractInt(INPUT_POST, $name);
}
/**
 *  Permet d'extraire un nombre entier
 *
 * @param integer $input
 * @param string $name
 * @return void
 */
function extractInt($input, $name)
{
  return filter_input($input, $name, FILTER_VALIDATE_INT);
}
/**
 * Undocumented function
 *
 * @param string $name
 * @return void
 */
function extractSafeFromPost($name)
{
  return extractSafe(INPUT_POST, $name);
}
/**
 * Undocumented function
 *
 * @param string $name
 * @return void
 */
function extractSafeFromGet($name)
{
  return extractSafe(INPUT_GET, $name);
}


function extractSafe($input, $name)
{
  return filter_input($input, $name, FILTER_SANITIZE_SPECIAL_CHARS);
}
/**
 * redirige le visiteur vers $url si le post est vide
 *
 * @param string $url
 * @return void
 */
function redirectionIfNotSubmitted(string $url)
{
  $isSubmitted = !empty($_POST);
  if (!$isSubmitted) {
    redirect($url);
  }
}
?>
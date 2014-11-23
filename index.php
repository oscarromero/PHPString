<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once "String.php";

$name = new String('oscar');

$name->toHtml('strong')->print()->toLastString();

$name->eachChar(function($char){
    echo "<p>$char</p>";
});

$name->proper()->toHtml('p')->print()->toLastString();

$name->reverse()->toHtml('p')->print()->toLastString(1);

$name->append('rolando', ' ')->properAll()->toHtml('p')->print()->toLastString();

$name->countChars();

$name->countChars(String::YES_SENSITIVE);

$john    = new String('John');
$yolanda = new String('Yolanda');
$john2   = 'John';

if ($john->equals($yolanda)) {
    /* This can't happen */
}

if ($john->equals($john2)) {
    /* Your code goes here */
}

$name = new String('oscar');
echo $name->proper()->toString() . '</br>';
echo $name->toLastString()->toString();

$phrase = new String("I love php, I love php too!\nPHP Rocks!");
echo $phrase->indexOf('php');
echo '</br>';

?>
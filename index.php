<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once "String.php";

$name = new String('oscar');

$name->toHtml('strong')->toBrowser()->toLastString();

$name->eachChar(function($char){
    echo "<p>$char</p>";
});

$name->proper()->toHtml('p')->toBrowser()->toLastString();

$name->reverse()->toHtml('p')->toBrowser()->toLastString(1);

$name->append('rolando', ' ')->properAll()->toHtml('p')->toBrowser()->toLastString();

echo '<pre>';
print_r($name->countChars());
echo '</pre>';

echo '<pre>';
print_r($name->countChars(String::YES_SENSITIVE));
echo '</pre>';

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
echo $phrase->positionOf('php');
echo '</br>';

?>
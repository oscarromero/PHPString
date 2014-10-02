##PHP String
### A Less BrainFuck PHP Class 

## Motivation

* Have fun and learn.
* PHP string and other functions are brainfuck (strlen, str_replace)
* Share this class

## Usage
```
require_once "String.php";

$john = new String("John");

// Conver to <strong> and print on the browser then goback to initial value.
$john->toHTML('strong')->toTheBrowser()->toLastString();

// Iterate over each character
$john->eachChar(function($char){
    echo "<p>$name</p>";
});

$john->proper()->toTheBrowser();
$john->reverse()->toTheBrowser();
$john->append('Doe', ' ');

echo $john->countChars();
echo $john->countChars(String::YES_SENSITIVE);

$mark = new String("Mark");
if ($mark->equals($john)) {
    /* Bad things happen */
}

$phrase = new String("I love php, I love php too!\nPHP Rocks!");
$phrase->positionOf('php');
$phrase->positionOf('php', String::YES_FIRST_OCCURRENCE, String::YES_SENSITIVE);
$phrase->toFile('/phrase.txt');

$string = $phrase->toString();
$array = $phrase->toArray();
```

## Contribute
* If you have questions, ideas or bugs, Please tell me.

## TODOS
* Include more functions
* Improve the documentation
* More things to put here

## Final Notes
* Thanks!



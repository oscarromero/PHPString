<?php
class String
{
    const NO_REPLACE           = FALSE;
    const NO_OUTPUT            = FALSE;
    const NO_SENSITIVE         = FALSE;
    const NO_FIRST_OCCURRENCE  = FALSE;

    const YES_REPLACE          = TRUE;
    const YES_OUTPUT           = TRUE;
    const YES_SENSITIVE        = TRUE;
    const YES_FIRST_OCCURRENCE = TRUE;
    
    private $string     = '';
    private $lastString = array();

    /**
     * Constructor
     *
     * Create the <strong>String object<strong>
     *
     * @access public
     * @param  string The string to set
     */
    function __construct($string)
    {
        $this->string = strval($string);
    }

    /**
     * Save String
     *
     * Save the current string before change.
     *
     * @access private
     * @return void
     */
    private function saveString()
    {
        array_push($this->lastString, $this->string);        
    }

    /**
     * Equals
     *
     * Compare to String object's
     *
     * @access public
     * @param  string The <strong>String object<strong>
     * @return boolean
     */
    public function equals($string = '')
    {
        if (gettype($string) === 'object' && get_class($string) === 'String') {
            $string = $string->toString();
        }

        return ($this->string === $string ? TRUE : FALSE);
    }

    /**
     * Empty
     *
     * Return true if the string is empty.
     *
     * @access public
     * @return boolean
     */
    public function empty()
    {
        return empty($this->string);
    }

    /**
     * Append
     *
     * Append a new string before or after to the <strong>String object<strong>
     *
     * @access public
     * @param  string  The new string
     * @param  string  The separator
     * @param  boolean Insert befor or after
     * @return object
     */
    public function append($newString = '', $separator = '', $before = FALSE)
    {
        $this->saveString();

        if ($before === TRUE) {
            $this->string = $newString . $separator . $this->string;
        }
        else {
            $this->string .= ($separator . $newString);
        }

        return $this;
    }

    /**
     * Substract
     *
     * Substract and set a new string
     *
     * @access public
     * @param  integer From
     * @param  integer To
     * @return string
     */
    public function substr($from = 0, $to = 0)
    {
        if (!$to) {
            return substr($this->string, $from);
        }
        else {
            return substr($this->string, $from, $to);
        }
    }

    /**
     * Replace
     *
     * Replace occurrences with a new string.
     *
     * @access public
     * @param  string The string to find
     * @param  string The string that replace
     * @return object
     */
    public function replace($phrase = '', $with = '', $sensitive = FALSE)
    {
        $this->saveString();

        if ($sensitive) {
            $this->string = str_replace($phrase, $with, $this->string);
        }
        else {
            $this->string = str_ireplace($phrase, $with, $this->string);
        }

        return $this;
    }

    /**
     * Trim
     *
     * Trim both sides replacing the current string.
     *
     * @access public
     * @return object
     */
    public function trim()
    {
        $this->saveString();
        $this->string = ltrim($this->string, $delimiter);
        return $this;
    }

    /**
     * Left Trim
     *
     * Trim the left side replacing the current string.
     *
     * @access public
     * @return object
     */
    public function ltrim()
    {        
        $this->saveString();
        $this->string = ltrim($this->string, $delimiter);
        return $this;
    }

    /**
     * Right Trim
     *
     * Trim the right side replacing the current string.
     *
     * @access public
     * @return object
     */
    public function rtrim($delimiter = '')
    {
        $this->saveString();
        $this->string = rtrim($this->string, $delimiter);
        return $this;
    }

    /**
     * Upper
     *
     * Transform the string to uppercase.
     *
     * @access public
     * @return object
     */
    public function upper()
    {        
        $this->saveString();
        $this->string = strtoupper($this->string);
        return $this;
    }

    /**
     * Lower
     *
     * Transform the string to lowercase.
     *
     * @access public
     * @return object
     */
    public function lower()
    {
        $this->saveString();
        $this->string = strtolower($this->string);
        return $this;
    }

    /**
     * Repeat
     *
     * Transform and repeat the string.
     *
     * @access public
     * @return object
     */
    public function repeat($times = 0)
    {
        $this->saveString();
        $this->string = str_repeat($this->string, $times);
        return $this;
    }

    /**
     * Proper
     *
     * Transform the first string to propercase.
     *
     * @access public
     * @return object
     */
    public function proper()
    {
        $this->saveString();
        $this->string = ucfirst($this->string);
        return $this;
    }

    /**
     * Proper All
     *
     * Transform all the string to propercase.
     *
     * @access public
     * @return object
     */
    public function properAll()
    {
        $this->saveString();
        $this->string = ucwords(strtolower($this->string));
        return $this;
    }

    /**
     * Reverse
     *
     * Transform and reverse the string.
     *
     * @access public
     * @return object
     */
    public function reverse()
    {
        $this->saveString();
        $this->string = strrev($this->string);
        return $this;
    }

    /**
     * Get Length
     *
     * Return the length of the string.
     *
     * @access public
     * @return integer
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * Index Of
     *
     * Find the position of a string in the String object.
     *
     * @access public
     * @param  string  The string to find.
     * @param  boolean Get the first or last occurrence
     * @param  boolean The search is sensitive?
     * @param  integer Start search at
     * @return integer
     */
    public function indexOf($token = '', $firstOccurrence = TRUE, $sensitive = TRUE, $startIndex = 0)
    {
        if (!$firstOccurrence) {
            $strPosFunc = 'strrpos';
            if (!$sensitive) {
                $strPosFunc = 'strripos';
            }
        }
        else {
            $strPosFunc = 'strpos';
            if (!$sensitive) {
                $strPosFunc = 'stripos';
            }
        }

        return $strPosFunc($this->string, $token, $startIndex);
    }

    /**
     * Each Char
     *
     * Loop over each character and call the closure.
     *
     * @access public
     * @param  function The closure, callback or whatever
     * @return object
     */
    public function eachChar($callback)
    {
        $char = str_split($this->string);

        foreach ($char as $key => $value)
        {
            $callback($value);
        }

        return $this;
    }

    /**
     * Count Chars
     *
     * Return the number of occurrences of each character.
     *
     * @access public
     * @param  boolean Count using sensitive
     * @return array   The array with keys of chacracters and values with the occurrences
     */
    public function countChars($sensitive = FALSE)
    {
        $arrayOfChars = array();
        $stringLength = strlen($this->string);
        for ($stringIndex = 0; $stringIndex < $stringLength ; $stringIndex++)
        {
            if (!$sensitive) {
                $char = strtolower(substr($this->string, $stringIndex, 1));
            }
            else {
                $char = substr($this->string, $stringIndex, 1);
            }

            if (!array_key_exists($char, $arrayOfChars)) {
                $arrayOfChars[$char] = 1;
            }
            else {
                $arrayOfChars[$char] += 1;
            }
        }

        return $arrayOfChars;
    }

    /**
     * Count Words
     *
     * Return the number of words in the string.
     *
     * @access public
     * @param  string  The charlist to be considered
     * @return integer The number of words
     */
    public function countWords($charList = '')
    {
        return str_word_count($this->string, 0, $charList);
    }

    /**
     * Print
     *
     * Output the string using echo.
     *
     * @access public
     * @return object
     */
    public function print()
    {
        echo $this->string;
        return $this;
    }

    /**
     * As Array
     *
     * Return the array 
     *
     * @access public
     * @param  string  The delimiter for split the string.
     * @param  integer The limit (optional) (default -1)
     * @return array
     */
    public function toArray($delimiter = ' ', $limit = -1)
    {
        return explode($delimiter, $this->string, $limit);
    }

    /**
     * To File
     *
     * Save the string into a file.
     *
     * @access public
     * @param  string The path and name
     * @return object
     */
    public function toFile($path = '/')
    {
        file_put_contents($path, $this->string);
        return $this;
    }

    /**
     * HTML
     *
     * Convert the string to HTML tag.
     *
     * @access public
     * @param  string The HTML tag
     * @return object
     */
    public function toHtml($tag = 'p')
    {
        $tag = str_replace(array('<','</', '>', '/>'), '', $tag);
        $html = "<$tag>" . $this->string . "</$tag>";

        $this->saveString();
        $this->string = $html;

        return $this;
    }

    /**
     * To Last String
     *
     * Go back to the last string.
     *
     * @access public
     * @return object
     */
    public function toLastString($index = NULL)
    {
        if ($index === NULL) {
            $index = count($this->lastString) - 1;
        }

        $this->string = $this->lastString[$index];

        return $this;
    }

    /**
     * To string
     *
     * Return the string value.
     *
     * @access public
     * @return string
     */
    public function toString()
    {
        return $this->string;
    }

    /**
     * MD5
     *
     * Return the MD5 of the string.
     *
     * @access public
     * @return string
     */
    public function md5()
    {
        return md5($this->string);
    }

    /**
     * Get Last String
     *
     * Return the last string after modify the old value.
     *
     * @access public
     * @return string
     */
    public function getLastString()
    {
        return $this->lastString;
    }
}
?>
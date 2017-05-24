<?php namespace Endeavors\Support;

class Str {

    /**
     * Determine the position of a given substring in a string.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return int|bool
     */
    public static function position($haystack, $needles)
    {
        foreach ((array) $needles as $needle)
        {
            if ($needle != '' && strpos($haystack, $needle) !== false) return strpos($haystack, $needle);
        }

        return false;
    }
    
    /**
     * Determine the substring of a string given a start and a length.
     *
     * @param  string  $string
     * @param  int $length - optional, if 0 then we assume all of the string
     * @param  int $start - optional as it is common to start at 0
     * @return string
     */
    public static function substring($string, $length = 0, $start = 0)
    {
        // a substring with a start of 0 and length of 0 doesn't make sense
        // if we receive 0 as a length, lets leave out the length parameter

        if( 0 === $length )
        {
            return substr($string, $start);
        }

        return substr($string, $start, $length);
    }

    /**
     * If the needle exists return the needle.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return mixed
     */
    public static function needle($haystack, $needles)
    {
        foreach ((array) $needles as $needle)
        {
            if ($needle != '' && strpos($haystack, $needle) !== false) return $needle;
        }

        return false;
    }
    
    /**
     * Get all the found needles
     */
    public static function needles($haystack, $needles)
    {
        $foundNeedles = [];

        foreach ((array) $needles as $needle)
        {
            if ($needle != '' && strpos($haystack, $needle) !== false) $foundNeedles[] = $needle;
        }

        return $foundNeedles;
    }
}
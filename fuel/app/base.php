<?php

/**
 * A wrapper function for Lang::get()
 *
 * @param   mixed   The string to translate
 * @param   array   The parameters
 * @return  string
 */
if ( ! function_exists('__'))
{
    function __($string, $params = array(), $default = null)
    {
        $lang = \Lang::get($string, $params, $default);
        
        return $lang ?: $string;
    }
}
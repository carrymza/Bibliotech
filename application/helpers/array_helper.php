<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 26/08/2018
 * Time: 11:17
 */

/**
 * Converts MySQL object to an associative array ej: Dropdown list
 *
 * @access	public
 * @param	object
 * @return	array
 */
if ( ! function_exists('to_assoc_array'))
{
    function to_assoc_array($result)
    {
        $option[0] = '';
        foreach($result as $row)
        {
            $option[$row->id] = $row->name;
        }
        return $option;
    }
}

/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if (!function_exists('array_to_string'))
{
    function array_to_string($array, $glue = ",")
    {
        $string = '';
        if($array)
        {
            $string = implode($glue, $array);
        }

        return $string;
    }
}

/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if (!function_exists('string_to_array'))
{
    function string_to_array($string, $glue = ",")
    {
        $new_string = '';
        if($string)
        {
            $new_string = explode($glue, $string);
        }

        return $new_string;
    }
}

if ( ! function_exists('arrayToObject'))
{
    function arrayToObject($array)
    {
        $object = new stdClass();

        foreach ($array as $key => $value)
        {
            $object->$key = $value;
        }

        return $object;
    }
}

<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Rules helper
 *
 * Rrule helper to assist on handling
 *
 * @category	Helpers
 * @author      Nelson Cabrera  <cabreran@gmail.com>
 * @version		1.0.0
 */



/**
 * Converts a Rrule into human readable format.
 *
 * @access	public
 * @param	object
 * @return	array
 */
if ( ! function_exists('rrule_human_readable'))
{
    function rrule_human_readable($rule)
    {
        if($rule == '')
        {
            return "Solo una vez";
        }
        else
        {
            $rrule = new RRule\RRule($rule);
            return $rrule->humanReadable(['locale' => 'es', 'date_formatter' => function($date) { setlocale(LC_ALL, 'es_ES'); return strftime("el %a, %e %b %Y", strtotime($date->format('Y-m-d')));}]);
        }
    }
}

/**
 *  Returns a comma separated value pair string. This this composes the key pair value rules string to be stored in DB.
 *
 * @access	public
 * @param	mixed string
 * @return	string
 */
if( !(function_exists('rule_composer')))
{
    function rule_composer($rule = FALSE)
    {
        $rules = '';
        is_array($rule) || $rule = array();

        foreach($rule as $key => $val)
        {
            $rules .= $key .':'. $val .',';
        }

        return rtrim($rules, ',');
    }
}

/**
 *  Returns an array of permission rules from a comma separated value pair. This decomposes the key pair value rules stored in DB as string.
 *
 * @access	private
 * @param	mixed string
 * @return	array
 */

if  (! function_exists('rule_decomposer'))
{
    function rule_decomposer($rule = FALSE)
    {
        $rules = array();

        if($rule !== FALSE)
        {
            foreach(explode(',', $rule) as $item)
            {
                $rule_item = explode(':', $item);
                if(isset($rule_item[0]) && isset($rule_item[1]))
                {
                    $rules[$rule_item[0]] = $rule_item[1];
                }
            }
        }

        return $rules;
    }
}

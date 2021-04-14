<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 26/08/2018
 * Time: 11:17
 */

if ( ! function_exists('timestamp_to_date'))
{
    function timestamp_to_date($timestamp = "", $format = "d/m/Y H:i:s")
    {
        if(empty($timestamp) || !is_numeric($timestamp)) $timestamp = time();
        return date($format, $timestamp);
    }
}

if ( ! function_exists('now'))
{
    function now()
    {
        $CI =& get_instance();

        if (strtolower($CI->config->item('time_reference')) == 'gmt')
        {
            $now = time();
            $system_time = mktime(gmdate("H", $now), gmdate("i", $now), gmdate("s", $now), gmdate("m", $now), gmdate("d", $now), gmdate("Y", $now));

            if (strlen($system_time) < 10)
            {
                $system_time = time();
                log_message('error', 'The Date class could not set a proper GMT timestamp so the local time() value was used.');
            }

            return $system_time;
        }
        else
        {
            return time();
        }
    }
}

if ( ! function_exists('gmt_to_local'))
{
    /**
     * Converts GMT time to a localized value
     *
     * Takes a Unix timestamp (in GMT) as input, and returns
     * at the local value based on the timezone and DST setting
     * submitted
     *
     * @param	int	Unix timestamp
     * @param	string	timezone
     * @param	bool	whether DST is active
     * @return	int
     */
    function gmt_to_local($time = '', $timezone = 'UTC', $dst = FALSE)
    {
        if ($time === '')
        {
            return now();
        }

        $time += timezones($timezone) * 3600;

        return ($dst === TRUE) ? $time + 3600 : $time;
    }
}

if ( ! function_exists('timezones'))
{
    function timezones($tz = '')
    {
        $zones = array(
            'UM12'		=> -12,
            'UM11'		=> -11,
            'UM10'		=> -10,
            'UM95'		=> -9.5,
            'UM9'		=> -9,
            'UM8'		=> -8,
            'UM7'		=> -7,
            'UM6'		=> -6,
            'UM5'		=> -5,
            'UM45'		=> -4.5,
            'UM4'		=> -4,
            'UM35'		=> -3.5,
            'UM3'		=> -3,
            'UM2'		=> -2,
            'UM1'		=> -1,
            'UTC'		=> 0,
            'UP1'		=> +1,
            'UP2'		=> +2,
            'UP3'		=> +3,
            'UP35'		=> +3.5,
            'UP4'		=> +4,
            'UP45'		=> +4.5,
            'UP5'		=> +5,
            'UP55'		=> +5.5,
            'UP575'		=> +5.75,
            'UP6'		=> +6,
            'UP65'		=> +6.5,
            'UP7'		=> +7,
            'UP8'		=> +8,
            'UP875'		=> +8.75,
            'UP9'		=> +9,
            'UP95'		=> +9.5,
            'UP10'		=> +10,
            'UP105'		=> +10.5,
            'UP11'		=> +11,
            'UP115'		=> +11.5,
            'UP12'		=> +12,
            'UP1275'	=> +12.75,
            'UP13'		=> +13,
            'UP14'		=> +14
        );

        if ($tz == '')
        {
            return $zones;
        }

        if ($tz == 'GMT')
            $tz = 'UTC';

        return ( ! isset($zones[$tz])) ? 0 : $zones[$tz];
    }
}

if ( ! function_exists('_hours'))
{
	function _hours($interval = '+30 minutes')
	{
		$hours = array();
		$current = strtotime('00:00');
		$end = strtotime('23:59');
		while ($current <= $end) {
			$time = date('H:i', $current);
			$hours[$time] = date('h:i A', $current);
			$current = strtotime($interval, $current);
		}
		return $hours;
	}
}

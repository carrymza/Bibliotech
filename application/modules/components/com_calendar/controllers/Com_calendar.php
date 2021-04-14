<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_calendar extends APP_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('com_calendar/com_calendar_model');
    }

    public function events($output = FALSE, $start = FALSE, $end = FALSE, $schoolId)
    {
        $feed       = array();
        $events     = $this->com_calendar_model->get_events($start, $end, $schoolId);

        foreach($events as $row)
        {
            if(!$row->rrule)
            {
                // If is one time event

                $feed[] = array(
                    'id'            => $row->eventId,
                    'title'         => $row->title,
                    'date'          => $row->dtstart,
                    'type'      	=> $row->type_name,
                    'start'         => $row->dtstart,
                    'color'         => '#'.$row->color,
                    'className'     => 'event-item',
                    'url'           => base_url('calendar/event/'.$row->eventId.'/'.$row->dtstart)
                );
            }
            else
            {
                // If is recurrent event
                if($row->repeat_type == 0)
                {
                    $date = new DateTime($end);
                    $row->rrule .= ';until='.$date->format('Ymd');
                }

                $rrule = new RRule\RRule($row->rrule);
                foreach($rrule as $occurrence)
                {
                    $row->date  = $occurrence->format('Y-m-d');
                    $feed[]     = array(
                        'id'            => $row->eventId,
                        'title'         => $row->title,
                        'date'          => $row->date,
                        'type'      	=> $row->type_name,
                        'start'         => $row->date,
                        'color'         => '#'.$row->color,
                        'className'     => 'event-item',
                        'url'           => base_url('calendar/event/'.$row->eventId.'/'.$row->date)
                    );
                }
            }
        }

        switch($output)
        {
            case "json":
                echo json_encode($feed);
                break;

            case "array":
                return $feed;
                break;

            default:
                echo json_encode($feed);
        }
    }

    public function rrule_composer($data)
    {
        if($data['repeat_type'] == 1)
        {
            $rules = array('freq','dtstart','interval','wkst','count','bymonth','byweekno','byyearday','bymonthday','byday','byhour','byminute','bysecond','bysetpos');
        }
        else if($data['repeat_type'] == 2)
        {
            $rules = array('freq','dtstart','interval','wkst','until','bymonth','byweekno','byyearday','bymonthday','byday','byhour','byminute','bysecond','bysetpos');
        }
        else
        {
            if($data['freq'] == 'WEEKLY')
            {
                $rules = array('freq','dtstart','interval','wkst','until','bymonth','byweekno','byyearday','bymonthday','byday','byhour','byminute','bysecond','bysetpos');
            }
            else
            {
                $rules = array('freq','dtstart','interval','wkst','until','bymonth','byweekno','byyearday','bymonthday','byday','byhour','byminute','bysecond','bysetpos');
            }
        }

        $rrule = 'RRULE:';

        foreach($data AS $key => $val)
        {
            if(in_array($key, $rules))
            {
                if($val)
                {
                    $val = (is_array($val))? implode(",", $val) : $val;

                    if(in_array($key, array('dtstart', 'until')))
                    {
                        $date = new DateTime($val);
                        $val = $date->format('Ymd');
                    }

                    $rrule .= $key.'='.$val.';';
                }
            }
        }

        return rtrim($rrule,";");
    }

    public function rrule_decomposer($rrule)
    {
        $array = array();
        $rules = explode(';', str_replace('RRULE:','',$rrule));

        foreach($rules AS $key => $val)
        {
            $rule = explode('=', $val);

            if(in_array($rule[0], array('dtstart','until')))
            {
                $date       = new DateTime($rule[1]);
                $rule[1]    = $date->format('Y-m-d');
            }

            $array[$rule[0]] = $rule[1];
        }

        return $array;
    }
}

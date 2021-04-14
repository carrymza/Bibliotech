<?php

if ( ! function_exists('form_dropdown'))
{
    /* CI modified form_dropdown function to support Disables */
    function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '', $disabled = array(), $default = FALSE)
    {
        if ( ! is_array($selected))
        {
            $selected = array($selected);
        }

        if ( ! is_array($disabled))
        {
            $disabled = array($disabled);
        }

        // If no selected state was submitted we will attempt to set it automatically
        if (count($selected) === 0)
        {
            // If the form name appears in the $_POST array we have a winner!
            if (isset($_POST[$name]))
            {
                $selected = array($_POST[$name]);
            }
        }

        if ($extra != '') $extra = ' '.$extra;

        $multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
        $form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

        if($default !== FALSE)
        {
            $form .= '<option class="opt-'.$default['value'].'" value="'.$default['value'].'">'.$default['name'].'</option>';
        }

        foreach ($options as $key => $val)
        {
            $name   = (is_array($val) && isset($val['name']))? $val['name'] : $val;
            $img    = (is_array($val) && isset($val['icon']))? 'data-img-src="https://s3.amazonaws.com/cashflow-storage/'.$val['icon'].'"' : '';
            $icon   = (is_array($val) && isset($val['font-icon']))? 'data-icon="'.$val['icon'].'"' : '';
            $key    = (string) $key;

            if (is_array($name) && ! empty($name))
            {
                $form .= '<optgroup label="'.$key.'">'."\n";
                foreach ($name as $optgroup_key => $optgroup_val)
                {
                    $sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

                    $dis = (in_array($optgroup_key, $disabled)) ? ' disabled="disabled"' : '';

                    $form .= '<option class="opt-'.$optgroup_key.'" value="'.$optgroup_key.'"'.$sel.' '.$dis.'>'.(string) $optgroup_val."</option>\n";
                }
                $form .= '</optgroup>'."\n";
            }
            else
            {
                $sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
                $dis = (in_array($key, $disabled)) ? ' disabled="disabled"' : '';
                $form .= '<option class="opt-'.$key.'" value="'.$key.'"'.$sel.' '.$dis.' '.$img.' '.$icon.'>'.(string) $name."</option>\n";
            }
        }

        $form .= '</select>';

        return $form;
    }
}

if ( ! function_exists('form_dropdown_data'))
{
    /* CI modified form_dropdown function to support Disables */
    function form_dropdown_data($name = '', $options = array(), $selected = array(), $extra = '', $disabled = array(), $default = FALSE)
    {
        if ( ! is_array($selected))
        {
            $selected = array($selected);
        }

        if ( ! is_array($disabled))
        {
            $disabled = array($disabled);
        }

        // If no selected state was submitted we will attempt to set it automatically
        if (count($selected) === 0)
        {
            // If the form name appears in the $_POST array we have a winner!
            if (isset($_POST[$name]))
            {
                $selected = array($_POST[$name]);
            }
        }

        if ($extra != '') $extra = ' '.$extra;

        $multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
        $form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

        if($default !== FALSE)
        {
            $form .= '<option class="opt-'.$default['value'].'" value="'.$default['value'].'">'.$default['name'].'</option>';
        }

        foreach ($options as $key => $val)
        {
            $form .= '<optgroup label="'.$key.'">'."\n";
            foreach ($val as $optgroup_key => $optgroup_val)
            {
                $sel                    = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
                $dis                    = (in_array($optgroup_key, $disabled)) ? ' disabled="disabled"' : '';
                $dis_account            = 0;
                $exc_dis_account        = 0;
                $data_options           = '';

                if(is_array($val) && isset($optgroup_val['data']))
                {
                    foreach($optgroup_val['data'] as $data_key => $data_value)
                    {
                        $data_options  .= ' data-'.$data_key.'= "'.$data_value.'"';
                        $dis_account    = ($data_key == 'no_level' && $data_value < 5) ? $dis_account + 1 : $dis_account;
                        $exc_dis_account= ($data_key == 'acc_not_disabled') ? 1 : $exc_dis_account;
                    }
                }

                $dis                    = ($dis_account != 0 && $exc_dis_account == 0) ? ' disabled="disabled"' : $dis;

                $form .= '<option class="opt-'.$optgroup_key.'" value="'.$optgroup_key.'"'.$sel.' '.$dis.'  '.$data_options.'>'.(string) $optgroup_val['name']."</option>\n";
            }

            $form .= '</optgroup>'."\n";
        }

        $form .= '</select>';

        return $form;
    }
}

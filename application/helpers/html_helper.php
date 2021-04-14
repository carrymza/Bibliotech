<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 26/08/2018
 * Time: 11:17
 */

if( ! function_exists('display_error'))
{
    function display_error($errors, $session = FALSE)
    {
    	if($session == FALSE)
		{
			return '<div class="alert alert-danger border-danger alert-dismissible fade show" role="alert">
                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    		<span aria-hidden="true">×</span>
                    	</button>
                    	<h5 class="opacity-message"><strong>Errores de Validación</strong></h5>
                    	<ul class="alpha">'.$errors.'</ul>
                	</div>';
		}
    	else
    	{
    		return '<div class="alert alert-danger border-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>'.$errors.'</strong>
					</div>';
		}
    }
}

if( ! function_exists('display_warning'))
{
	function display_warning($message)
	{
		return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <ul class="alpha">'.$message.'</ul>
                </div>';
	}
}

if( ! function_exists('generate_code'))
{
	function generate_code($long)
	{
		$key 		= '';
		$pattern 	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$max 		= strlen($pattern)-1;
		for($i=0;$i < $long;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}
}

if( ! function_exists('display_lang_options'))
{
	function display_lang_options($lang)
	{
		$lang = ($lang == 'en') ? '<i class="flag-icon flag-icon-us m-r-5"></i> English' : '<i class="flag-icon flag-icon-do m-r-5"></i> Español';
		return '<a href="javascript:void(0);" id="dropdown-active-item">'.$lang.'</a>
				<ul class="show-notification">
					<li>
						<a href="javascript:void(0);">
							<i class="flag-icon flag-icon-us m-r-5"></i> Ingles
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="flag-icon flag-icon-do m-r-5"></i> Español
						</a>
					</li>
				</ul>';
	}
}

<?php

$section = isset($_GET['section']) ? $_GET['section'] : '';
$lang = isset($_GET['language']) ? $_GET['language'] : '';


if(strtolower($lang) == 'en') $lang = '';


if($_SERVER['SERVER_PORT'] == '443')
{
	switch(strtolower($section))
	{
		case 'css':
			include('./css/' . strtolower($lang) . 'sslsoftvoyage.css');
			break;
		case 'header':
			include(strtolower($lang) . 'sslheader.htm');
			break;
		case 'footer':
			include(strtolower($lang) . 'sslfooter.htm');
			break;
	}
}
else
{
	switch(strtolower($section))
	{
		case 'css':
			include('./css/' . strtolower($lang) . 'softvoyage.css');
			break;
		case 'header':
			include(strtolower($lang) . '');
			break;
		case 'footer':
			include(strtolower($lang) . '');
			break;
	}
}

?>
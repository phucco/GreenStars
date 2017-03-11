<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function asset($url = '')
{
	return base_url('assets/'. $url);
}

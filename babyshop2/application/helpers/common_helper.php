<?php
function assets_url($url = '')
{
    return base_url('assets/boostrap'.$url);
}

function assets2_url($url = '')
{
    return base_url('assets'.$url);
}

function images_url($url = '')
{
    return base_url('assets/images'.$url);
}

function img_url($url = '')
{
    return base_url('assets/img'.$url);
}

function public_url($url = '')
{
	return base_url('public/'.$url);
}

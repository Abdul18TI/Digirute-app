<?php

if (!function_exists('prefixActive')) {
	function prefixActive($prefixName)
	{
		// return	request()->route()->getPrefix() == $prefixName ? 'active' : '';
		return	request()->routeIs($prefixName) ? 'active' : null;
	}
}

if (!function_exists('prefixBlock')) {
	function prefixBlock($prefixName)
	{
		return	request()->routeIs($prefixName) ? 'block' : 'none';
		// return	request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
		// {{ request()->route()->getName() }}
	}
}

if (!function_exists('routeActive')) {
	function routeActive($routeName)
	{
		return	request()->routeIs($routeName) ? 'active' : null;
	}
}

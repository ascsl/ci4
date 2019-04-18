<?php
/**
 * ASC - CORE
 *
	if (! function_exists('assets_url'))			Retorna la carpeta: BASEPATH.'/public/assets'
 */

/**
 *  Codeigniter4 / SYSTEM:

	if (! function_exists('site_url')) {}
	if (! function_exists('base_url')) {}
	if (! function_exists('current_url')) {}
	if (! function_exists('previous_url')) {}
	if (! function_exists('uri_string')) {}
	if (! function_exists('index_page')) {}
	if (! function_exists('anchor')) {}
	if (! function_exists('anchor_popup')) {}
	if (! function_exists('mailto')) {}
	if (! function_exists('safe_mailto')) {}
	if (! function_exists('auto_link')) {}
	if (! function_exists('prep_url')) {}
	if (! function_exists('url_title')) {}
 */

//--------------------------------------------------------------------

if (! function_exists('assets_url'))
{
	/**
	 * Return the base URL to use in views
	 *
	 * @param  string|array $path
	 * @param  string       $scheme
	 * @return string
	 */
	function assets_url($path = '', string $scheme = null): string
	{
		// convert segment array to string
		if (is_array($path))
		{
			$path = implode('/', $path);
		}

		// We should be using the configured baseURL that the user set;
		// otherwise get rid of the path, because we have
		// no way of knowing the intent...
		$config = \CodeIgniter\Config\Services::request()->config;
		$url    = new \CodeIgniter\HTTP\URI($config->baseURL);
		unset($config);

		// Merge in the path set by the user, if any
		if (! empty($path))
		{
			$url  = $url->resolveRelativeURI($path);
			$url .= '/assets';								// <------------- modificado
		}

		// If the scheme wasn't provided, check to
		// see if it was a secure request
		if (empty($scheme) && \CodeIgniter\Config\Services::request()->isSecure())
		{
			$scheme = 'https';
		}

		if (! empty($scheme))
		{
			$url->setScheme($scheme);
		}

		return (string) $url;
	}
}

//--------------------------------------------------------------------



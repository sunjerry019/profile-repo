<?php
// Copied from pear/HTTP2.php
/**
* Negotiates language with the user's browser through the Accept-Language
* HTTP header or the user's host address.  Language codes are generally in
* the form "ll" for a language spoken in only one country, or "ll-CC" for a
* language spoken in a particular country.  For example, U.S. English is
* "en-US", while British English is "en-UK".  Portugese as spoken in
* Portugal is "pt-PT", while Brazilian Portugese is "pt-BR".
*
* Quality factors in the Accept-Language: header are supported, e.g.:
*      Accept-Language: en-UK;q=0.7, en-US;q=0.6, no, dk;q=0.8
*
* <code>
*  require_once 'HTTP2.php';
*  $http = new HTTP2();
*  $langs = array(
*      'en'    => 'locales/en',
*      'en-US' => 'locales/en',
*      'en-UK' => 'locales/en',
*      'de'    => 'locales/de',
*      'de-DE' => 'locales/de',
*      'de-AT' => 'locales/de',
*  );
*  $neg = $http->negotiateLanguage($langs);
*  $dir = $langs[$neg];
* </code>
*
* @param array  $supported An associative array of supported languages,
*                          whose values must evaluate to true.
* @param string $default   The default language to use if none is found.
*
* @return string The negotiated language result or the supplied default.
*/
function negotiateLanguage($supported, $default = 'en-US')
{
    $supp = array();
    foreach ($supported as $lang => $isSupported) {
        if ($isSupported) {
            $supp[strtolower($lang)] = $lang;
        }
    }

    if (!count($supp)) {
        return $default;
    }

    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $match = matchAccept(
            $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            $supp
        );
        if (!is_null($match)) {
            return $match;
        }
    }

    if (isset($_SERVER['REMOTE_HOST'])) {
        $lang = strtolower(end($h = explode('.', $_SERVER['REMOTE_HOST'])));
        if (isset($supp[$lang])) {
            return $supp[$lang];
        }
    }

    return $default;
}
/**
 * Parses a weighed "Accept" HTTP header and matches it against a list
 * of supported options
 *
 * @param string $header    The HTTP "Accept" header to parse
 * @param array  $supported A list of supported values
 *
 * @return string|NULL a matched option, or NULL if no match
 */
function matchAccept($header, $supported)
{
    $matches = sortAccept($header);
    foreach ($matches as $key => $q) {
        if (isset($supported[$key])) {
            return $supported[$key];
        }
    }
    // If any (i.e. "*") is acceptable, return the first supported format
    if (isset($matches['*'])) {
        return array_shift($supported);
    }
    return null;
}

/**
 * Parses and sorts a weighed "Accept" HTTP header
 *
 * @param string $header The HTTP "Accept" header to parse
 *
 * @return array Sorted list of "accept" options
 */
function sortAccept($header)
{
    $matches = array();
    foreach (explode(',', $header) as $option) {
        $option = array_map('trim', explode(';', $option));

        $l = strtolower($option[0]);
        if (isset($option[1])) {
            $q = (float) str_replace('q=', '', $option[1]);
        } else {
            $q = null;
            // Assign default low weight for generic values
            if ($l == '*/*') {
                $q = 0.01;
            } elseif (substr($l, -1) == '*') {
                $q = 0.02;
            }
        }
        // Unweighted values, get high weight by their position in the
        // list
        $matches[$l] = isset($q) ? $q : 1000 - count($matches);
    }
    arsort($matches, SORT_NUMERIC);
    return $matches;
}
?>
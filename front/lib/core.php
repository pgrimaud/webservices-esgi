<?php
/**
*   Library: core
*
*/

define('FRONT', $_SERVER['DOCUMENT_ROOT'] . '/');
//define('FRONT', '/home/nims/workspace/webservices-esgi/front/');

/**
*   Load a resource
*
*   @param  (string)    resource type
*   @param  (string)    resource name
*   @param  (array)     [optional] dependency injection
*   @retunr (void)      -> require the resource
*/
function loadResource($type, $resource, $data = NULL)
{
    switch ($type)
    {
        case 'view' :
            $path = FRONT . 'view/' . $resource . '.php';
            break;
    }

    if ($path)
        require_once $path;
}

function callWS($uri, $headers = false, $params = false) {

    $ch = curl_init($uri);

    if ($headers)
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    if ($params) {
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    }

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $sCurlResponse = curl_exec($ch);

    curl_close($ch);

    return $sCurlResponse;
  }

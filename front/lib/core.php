<?php
/**
*   Library: core
*
*/

define('FRONT', $_SERVER['DOCUMENT_ROOT'] . 'EB1/XML/');

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
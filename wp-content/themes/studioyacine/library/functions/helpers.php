<?php



/**
 *  Get template without Params
 */
function get_template_param($template_param)
{
    if (isset($GLOBALS['my_template_params'][$template_param])) {
        return $GLOBALS['my_template_params'][$template_param];
    }

    return false;
}




/**
 *  Get template with Params
 */
function get_template_part_with_params($slug, $name, $params)
{
    $templates = array();
    $name      = (string) $name;

    if ('' !== $name) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";

    // Save params to globals
    $GLOBALS['my_template_params'] = $params;

    locate_template($templates, true, false);

    // Empty params to prevent some possible bugs
    $GLOBALS['my_template_params'] = [];
}

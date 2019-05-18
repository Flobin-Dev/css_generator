<?php

function create_resources($pngs)
{
    $resources = array();
    $max_width = 0;
    $max_height = 0;
    foreach($pngs as $path)
    {
        $image = array();
        $image["name"] = $path;
        $image["resource"] = imagecreatefrompng($path);
        $image["height"] = imagesy($image["resource"]);
        if ($image["height"] > $max_height)
        {
            $max_height = $image["height"];
        }
        $image["width"] = imagesx($image["resource"]);
        $max_width += $image["width"];
        array_push($resources, $image);

    }
    array_push($resources, $max_width);
    array_push($resources, $max_height);
    return $resources;
}

?>

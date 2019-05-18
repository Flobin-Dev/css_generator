<?php

function my_merge_images($resources)
{
    end($resources);
    $sprite = imagecreatetruecolor(prev($resources), end($resources));
    imagesavealpha($sprite, true);
    $color = imagecolorallocatealpha($sprite, 0, 0, 0, 127);
    imagefill($sprite, 0, 0, $color);
    $total_values = (count($resources) - 2);
    $x = 0;
    for($i = 0; $i < $total_values; $i++)
    {
        imagecopy($sprite, $resources[$i]["resource"], $x, 0, 0, 0,
            $resources[$i]["width"], $resources[$i]["height"]);
        $x += $resources[$i]["width"];
    }
    if(!file_exists("sprite.png") == TRUE)
    {
        imagepng($sprite, "sprite.png");
        echo "The sprite image has been created.\n";
    }
    else
    {
        echo "The sprite image already exists.\n";
    }
    return $resources;
}

function my_merge_images_custom_i($resources, $name_sprite)
{
    end($resources);
    $sprite = imagecreatetruecolor(prev($resources), end($resources));
    imagesavealpha($sprite, true);
    $color = imagecolorallocatealpha($sprite, 0, 0, 0, 127);
    imagefill($sprite, 0, 0, $color);
    $total_values = (count($resources) - 2);
    $x = 0;
    for($i = 0; $i < $total_values; $i++)
    {
        imagecopy($sprite, $resources[$i]["resource"], $x, 0, 0, 0,
            $resources[$i]["width"], $resources[$i]["height"]);
        $x += $resources[$i]["width"];
    }
    if(!file_exists(($name_sprite . "png")) == TRUE)
    {
        imagepng($sprite, ($name_sprite . ".png"));
        echo "The sprite image has been created.\n";
    }
    else
    {
        echo "The sprite image already exists.\n";
    }
    return $resources;
}

?>

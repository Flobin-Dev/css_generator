<?php

include "find_png.php";
include "create_resources.php";
include "my_merge_images.php";
include "my_generate_css.php";

function read_options($argv)
{
    if(!isset($argv[1]))
    {
        $pngs = find_png();
        $resources = create_resources($pngs);
        $resources = my_merge_images($resources);
        my_generate_css($resources);
    }
    else
    {
        switch($argv[1])
        {
            case "-r":
                $pngs = find_png_recursive();
                $resources = create_resources($pngs);
                $resources = my_merge_images($resources);
                my_generate_css($resources);
                break;
            default:
            read_options2($argv);
        }
    }
}

function read_options2($argv)
{
    switch($argv[1])
    {
        case "-i":
            $pngs = find_png();
            $resources = create_resources($pngs);
            $resources = my_merge_images_custom_i($resources, $argv[2]);
            my_generate_css_i($resources, $argv[2]);
            break;
        case "-s":
            $pngs = find_png();
            $resources = create_resources($pngs);
            $resources = my_merge_images($resources);
            my_generate_css_s($resources, $argv[2]);
            break;
        case "-rs":
            $pngs = find_png_recursive();
            $resources = create_resources($pngs);
            $resources = my_merge_images($resources);
            my_generate_css_s($resources, $argv[2]);
            break;
        default:
            read_options3($argv);
    }
}

function read_options3($argv)
{
    switch($argv[1])
    {
        case "-ri":
            $pngs = find_png_recursive();
            $resources = create_resources($pngs);
            $resources = my_merge_images_custom_i($resources, $argv[2]);
            my_generate_css_i($resources, $argv[2]);
            break;
        case "-ris":
            $pngs = find_png_recursive();
            $resources = create_resources($pngs);
            $resources = my_merge_images_custom_i($resources, $argv[2]);
            my_generate_css_si($resources, $argv[2], $argv[3]);
            break;
        case "-is":
            $pngs = find_png();
            $resources = create_resources($pngs);
            $resources = my_merge_images_custom_i($resources, $argv[2]);
            my_generate_css_si($resources, $argv[2], $argv[3]);
    }
}

read_options($argv);

?>

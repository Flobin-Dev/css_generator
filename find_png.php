<?php

function find_png()
{
    $pngs = array();
    if ($handle = opendir('.'))
    {
        while (false !== ($entry = readdir($handle)))
        {
            if ($entry != "." && $entry != "..")
            {
                if(strpos($entry, ".png") == TRUE)
                {
                    array_push($pngs, $entry);
                }
            }
        }
        closedir($handle);
    }
    return($pngs);
}

function find_png_recursive()
{
    $pngs = array();
    find_png2($pngs);
    return $pngs;
}

function find_png2(&$pngs, $from = ".")
{
    if ($handle = opendir($from))
    {
        while (($file = readdir($handle)) !== FALSE)
        {
            if ($file == "." OR $file == "..")
            {
                continue;
            }
            $path = $from . "/" . $file;
            if (is_dir($path))
            {
                $pngs = find_png2($pngs, $path);
            }
            elseif (strpos($file, ".png") !== FALSE)
            {
                array_push($pngs, $path);
            }
        }
        closedir($handle);
    }
    return $pngs;
}

?>

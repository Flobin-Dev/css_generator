<?php

function find_png($from = ".")
{
    if(!is_dir($from))
    {
        echo "There is no such directory.\n";
        exit(84);
    }
    $pngs = array();
    if ($handle = opendir($from))
    {
        while (false !== ($entry = readdir($handle)))
        {
            if ($entry != "." && $entry != "..")
            {
                if(strpos($entry, ".png") == TRUE)
                {
                    $path = $from . "/" . $entry;
                    array_push($pngs, $path);
                }
            }
        }
        closedir($handle);
    }
    return($pngs);
}

function find_png_recursive($from = ".")
{
    $pngs = array();
    find_png2($pngs, $from);
    return $pngs;
}

function find_png2(&$pngs, $from)
{
    if(!is_dir($from)){
        echo "There is no such directory.\n";
        exit(84);
    }
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

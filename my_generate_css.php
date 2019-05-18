<?php

function my_generate_css($resources)
{
    $style = fopen("style.css", "w");
    fwrite($style, ".sprite {");
    fwrite($style, "\n \t background-image:url(\"sprite.png\");");
    fwrite($style, "\n \t background-repeat:repeat;");
    fwrite($style, "\n \t display:block;\n}");
    $total_values = (count($resources) - 2);
    $x = 0;
    for($i = 0; $i < $total_values; $i++)
    {
        $path_parts = pathinfo($resources[$i]["name"]);
        $pngs_name = $path_parts['filename'];
        fwrite($style, "\n\n.sprite-$pngs_name {");
        fwrite($style, "\n\t width:" . $resources[$i]["width"] . "px");
        fwrite($style, ";\n\t height:" . $resources[$i]["height"] . "px;");
        fwrite($style, "\n\t background-position:$x" . "px 0, 0 0;\n}");
        $x -= $resources[$i]["width"];
    }
    fclose($style);
}

function my_generate_css_i($resources, $name_sprite)
{
    $style = fopen("style.css", "w");
    fwrite($style, ".$name_sprite {");
    fwrite($style, "\n \t background-image:url(\"$name_sprite.png\");");
    fwrite($style, "\n \t background-repeat:repeat;");
    fwrite($style, "\n \t display:block;\n}");
    $total_values = (count($resources) - 2);
    $x = 0;
    for($i = 0; $i < $total_values; $i++)
    {
        $path_parts = pathinfo($resources[$i]["name"]);
        $pngs_name = $path_parts['filename'];
        fwrite($style, "\n\n.$name_sprite-$pngs_name {");
        fwrite($style, "\n\t width:" . $resources[$i]["width"] . "px");
        fwrite($style, ";\n\t height:" . $resources[$i]["height"] . "px;");
        fwrite($style, "\n\t background-position:$x" . "px 0, 0 0;\n}");
        $x -= $resources[$i]["width"];
    }
    fclose($style);
}

function my_generate_css_s($resources, $name_style)
{
    $style = fopen(($name_style . ".css"), "w");
    fwrite($style, ".sprite {");
    fwrite($style, "\n \t background-image:url(\"sprite.png\");");
    fwrite($style, "\n \t background-repeat:repeat;");
    fwrite($style, "\n \t display:block;\n}");
    $total_values = (count($resources) - 2);
    $x = 0;
    for($i = 0; $i < $total_values; $i++)
    {
        $path_parts = pathinfo($resources[$i]["name"]);
        $pngs_name = $path_parts['filename'];
        fwrite($style, "\n\n.sprite-$pngs_name {");
        fwrite($style, "\n\t width:" . $resources[$i]["width"] . "px");
        fwrite($style, ";\n\t height:" . $resources[$i]["height"] . "px;");
        fwrite($style, "\n\t background-position:$x" . "px 0, 0 0;\n}");
        $x -= $resources[$i]["width"];
    }
    fclose($style);
}

?>

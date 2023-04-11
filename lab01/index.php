<?php


function xml2assoc($xml, $name)
{
    print "<ul style='font-size:18px;'>";

    $tree = null;

    while ($xml->read()) {

        if ($xml->nodeType == XMLReader::END_ELEMENT) {
            print "</ul>";
            return $tree;
        } else if ($xml->nodeType == XMLReader::ELEMENT) {
            $node = array();

            print($xml->name . "<br>");
            $node['tag'] = $xml->name;

            if ($xml->hasAttributes) {
                $attributes = array();
                while ($xml->moveToNextAttribute()) {
                    print($xml->name . " = " . $xml->value . "<br>");
                    $attributes[$xml->name] = $xml->value;
                }
                $node['attr'] = $attributes;
            }

            if (!$xml->isEmptyElement) {
                $childs = xml2assoc($xml, $node['tag']);
                $node['childs'] = $childs;
            }

            $tree[] = $node;
        } else if ($xml->nodeType == XMLReader::TEXT) {
            $node = array();
            $node['text'] = $xml->value;
            $tree[] = $node;
            print $node['text'] . "<br>";
        }
    }

    print "</ul>";

    return $tree;
}



$xml = new XMLReader();

$xml->open('Employee.xml');

$assoc = xml2assoc($xml, "employee");
$xml->close();

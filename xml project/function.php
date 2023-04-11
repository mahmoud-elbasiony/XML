<?php

function dd($val)
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die;
}

function go_next($handle)
{
    if ($handle->count() <= 0)
        return null;
    if ($_SESSION["index"] < $handle->count() - 1) {
        $_SESSION["index"] += 1;
    }
    return read($handle, $_SESSION["index"]);
}

function go_prev($handle)
{
    if ($handle->count() <= 0)
        return null;
    if ($_SESSION["index"] > 0) {
        $_SESSION["index"] -= 1;
    }
    return read($handle, $_SESSION["index"]);
}


function insert($dom)
{

    $employee = populate($dom);
    $dom->lastElementChild->appendChild($employee);
    save_and_reload($dom);
    return $employee;
}

function delete($handle, $dom)
{
    if ($_SESSION["index"] >= 0 && $handle->count() > 0) {
        $node = $handle->item($_SESSION["index"]);
        $dom->lastElementChild->removeChild($node);
        save_and_reload($dom);
    }
}

function read($handle, $index = 0)
{
    if ($handle->count() > 0) {
        $handle = $handle->item($index);
        $name = $handle->getElementsByTagName("name")->item(0)->nodeValue ?? '';
        $email = $handle->getAttribute("email") ?? '';
        $phone = $handle->getElementsByTagName('phone')->item(0)->nodeValue ?? '';
        $addresses  = $handle->getElementsByTagName('address') ?? '';
        foreach ($addresses as $address) {
            $street = $address->getElementsByTagName('street')->item(0)->nodeValue ?? '';
            $building_number = $address->getElementsByTagName('buildingNumber')->item(0)->nodeValue ?? '';
            $city = $address->getElementsByTagName('city')->item(0)->nodeValue ?? '';
            $region = $address->getElementsByTagName('region')->item(0)->nodeValue ?? '';
            $country = $address->getElementsByTagName('country')->item(0)->nodeValue ?? '';
        }
    }
    return ["name" => $name  ?? '', "email" => $email  ?? '', "phone" => $phone ?? '', "street" => $street ?? '', "building_number" => $building_number ?? '', "city" => $city ?? '', "region" => $region ?? '', "country" => $country ?? ''];
}

function update($dom, $old)
{
    $old = $old->item($_SESSION["index"]);
    $employee = populate($dom);
    $dom->lastElementChild->replaceChild($employee, $old);
    save_and_reload($dom);
}

function populate($dom)
{
    $employee = $dom->createElement('employee');
    $phone = $dom->createElement('phone', $_POST["phone"]);
    $name = $dom->createElement('name', $_POST["name"]);
    $address = $dom->createElement('address');
    $street = $dom->createElement('street', $_POST["street"]);
    $building_number = $dom->createElement('buildingNumber', $_POST["building_number"]);
    $city = $dom->createElement('city', $_POST["city"]);
    $region = $dom->createElement('region', $_POST["region"]);
    $country = $dom->createElement('country', $_POST["country"]);
    $address->appendChild($street);
    $address->appendChild($building_number);
    $address->appendChild($city);
    $address->appendChild($region);
    $address->appendChild($country);
    $employee->appendChild($name);
    $employee->appendChild($phone);
    $employee->appendChild($address);
    $employee->setAttribute("email", $_POST["email"]);
    return $employee;
}
function save_and_reload($dom)
{
    $dom->save("Employee.xml");
    $dom->load("Employee.xml");
    return $dom;
}

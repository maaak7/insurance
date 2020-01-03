<?php

namespace app\Services;

class InsuranceService
{
    public static function prepareDataBeforeSave($name, $price, $params)
    {
        $query_params = 'name, price, params';
        $additional_params = json_encode($params, JSON_UNESCAPED_UNICODE);
        $query_values = $name.', '.$price.', ' . $additional_params;

        return ['params' => $query_params, 'values' => $query_values];
    }

    public static function create($params, $values)
    {
        $query = 'INSERT INTO insurances ('.$params.') VALUES ('.$values.')';
        // TODO here needs to be MYSQL operation with this query
        return true;
    }

    public static function get()
    {
        $query = 'SELECT * FROM insurances';
        // TODO here needs to be MYSQL operation with this query
        return [];
    }

    public static function getCount()
    {
        $query = 'SELECT COUNT (*) FROM insurances';
        // TODO here needs to be MYSQL operation with this query
        return 0;
    }

    public static function getInfo($id)
    {
        $query = 'SELECT * FROM insurances WHERE id='.$id;
        // TODO here needs to be MYSQL operation with this query
        return [];
    }
}
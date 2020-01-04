<?php

namespace app\Controllers;

use app\Services\InsuranceService;

class InsuranceController
{
    public function get()
    {
        return InsuranceService::get($_GET['limit'], $_GET['page']);
    }

    public function getCount()
    {
        return InsuranceService::getCount();
    }

    public function getInfo($id)
    {
        $data = InsuranceService::getInfo($id);
        return !empty($data) ? 'insurance ' . $data['name'] . ' costs ' . $data['price'] . ' $' : 'No insurance found';
    }

    public function create()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];

        if (!$name || !$price) {
            return 'Name & price are required';
        }

        $data = InsuranceService::prepareDataBeforeSave($name, $price, $_POST['params']);

        try {
            $save = InsuranceService::create($data['params'], $data['values']);
            return ['status' => $save ? 'success' : 'error', 'message' => $save ? 'Insurance was saved' : 'Error while saving'];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
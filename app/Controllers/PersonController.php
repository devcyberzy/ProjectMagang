<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PersonController extends BaseController
{
    public function index()
    {
        return view('person_table');
    }
}

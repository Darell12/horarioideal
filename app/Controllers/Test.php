<?php

namespace App\Controllers;

require_once APPPATH . 'ThirdParty/PhpSpreadsheet/src/PhpSpreadsheet/IOFactory.php';

use PhpSpreadsheet\Spreadsheet;
use PhpSpreadsheet\Writer\Xlsx;



class Test extends BaseController
{
    public function index()
    {
        // Crea un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet;

        // Hacer operaciones con el Spreadsheet...

        // Guardar el archivo
        $writer = new Xlsx($spreadsheet);
        $writer->save('mi_archivo.xlsx');
    }
}

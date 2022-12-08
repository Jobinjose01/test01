<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use App\Helpers\Helper;

class DownloadController extends BaseController{






    public function downloadFile(){

      
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=salary.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

         
        $list = Helper::salaryExport();       

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

         $callback = function() use ($list) 
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    

    }


    
}
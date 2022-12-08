<?php

namespace App\Helpers;


class Helper {

    /**
     * This function will do the calculation of salary date and bonus date
     * @return array()
     */    
    public static function salaryExport(){
        
        for($index = 1; $index <= 12 ; $index++){

          $payment_date  = date("Y-m-t",mktime(0,0,0,date('n') + $index,1,date('Y')));

          $bonus_date    = date("Y-m-12",mktime(0,0,0,date('n')+ $index,1,date('Y')));

          $month = date('F',strtotime($payment_date));

          ## If the payment date is weekend then take the last friday of the month  
          if((date('N', strtotime($payment_date)) >= 6)){

            $payment_date = date('Y-m-d',strtotime($payment_date . 'last friday of this month',));

          }

          ## If the bonus date 12th is weekend then consider the next tuesday
          if((date('N', strtotime($bonus_date)) >= 6)){

            $bonus_date = date('Y-m-d', strtotime('next tuesday', strtotime($bonus_date)));
          }

          

          $data[] = [
                        'month' =>   $month,
                        'payment_date' => $payment_date,
                        'bonus_date' => $bonus_date,
                    ];
         
                        
        }
        
       return $data;

    }


    public static function download(){

               
        $list = self::salaryExport();       

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        
        $file_name = storage_path('app/public/docs/salary.csv');

        $fp = fopen($file_name, 'w');
        foreach ($list as $row) { 
            fputcsv($fp, $row);
        }
        fclose($fp);
        
       return $file_name;
        
    }



    
}
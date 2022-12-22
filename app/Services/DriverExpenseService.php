<?php
 
namespace App\Services;
  
class DriverExpenseService
{
    public function calculateDriverExpenses(array $drivers, array $expenses)
    {
        $result = [];

        $result[] = ['Expense/Driver', 'Amount, $', $drivers[0], $drivers[1]];

        $oddCount = 0;
        foreach($expenses as $key => $expense){
            $expense = intval(floor(floatval($expense)*100+0.5));
            if($expense % 2 == 0){
                $expense = $expense / 100;
                $result[] = [$key, number_format($expense,2), number_format($expense/2,2), number_format($expense/2,2)];
            } else if ($expense % 2 == 1){
                if($oddCount % 2 === 0){
                    $expense = $expense / 100;
                    $result[] = [$key, number_format($expense,2), number_format(($expense/2)+0.005,2), number_format(($expense/2)-0.005,2)];
                    ++$oddCount;
                } else {
                    $expense = $expense / 100;
                    $result[] = [$key, number_format($expense,2), number_format(($expense/2)-0.005,2), number_format(($expense/2)+0.005,2)];
                    ++$oddCount;
                }
            }
        }

        $driver1Total = 0;
        $driver2Total = 0;
        foreach($result as $value) {
            $driver1Total += floatval($value[2]);
            $driver2Total += floatval($value[3]);
        }
        
        $result[] = ['Total:', number_format($driver1Total+$driver2Total,2), number_format($driver1Total,2), number_format($driver2Total,2)];
        return $result;
    }
}
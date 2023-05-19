<?php


namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

class Client implements ToModel
{
    public function model(array $row)
    {
        dd($row);
        // Process each row and insert it into the "clients" table
        return new \App\Client([
            'full_name' => $row[0],
            'id_number' => $row[1],
            'marital_status' => $row[2],
            'city' => $row[3],
            'email' => $row[4],
            'BOD' => $row[5],
            'occupation' => $row[6],
            'phone' => $row[7],
        ]);
    }
}

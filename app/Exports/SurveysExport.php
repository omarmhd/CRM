<?php

namespace App\Exports;

use App\Models\CurrantSurvey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveysExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CurrantSurvey::all();
    }

    public function query()
    {

        return CurrantSurvey::query()->where("id",1);
        // TODO: Implement query() method.
    }

    public function  headings(): array
    {

        return(['id']);
        // TODO: Implement headings() method.
    }
}

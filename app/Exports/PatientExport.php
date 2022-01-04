<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PatientExport implements FromCollection,WithHeadings,WithStrictNullComparison,WithColumnFormatting,WithMapping
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::all();
    }

    public function columnFormats(): array
    {
        return [
            'G'=> NumberFormat::FORMAT_DATE_YYYYMMDDSLASH,
            'H'=> NumberFormat::FORMAT_DATE_YYYYMMDDSLASH,
        ];
    }

    public function headings():array
	{
		return [
				'ID',
				'カルテ番号',
				'氏名',
				'生年月日',
                '検査結果',
                '検査結果PDF',
				'登録日時',
                '修正日'
			];
	}

    public function map($row): array
    {
        return [
            $row->id,
            $row->patient_id,
            $row->name,
            $row->birthday,
            $row->results,
            $row->results_pdf,
            Date::dateTimeToExcel($row->created_at),
            Date::dateTimeToExcel($row->updated_at),
	    ];
    }

}

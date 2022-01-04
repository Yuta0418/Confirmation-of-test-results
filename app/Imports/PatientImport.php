<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PatientImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Patient ([
            'patient_id' => $row['患者番号'],
            'name' => preg_replace("/( |　)/", "", $row['カナ氏名'] ),
            'birthday' => $row['生年月日'],
            // 'results' => $row['検査結果'],
        ]);
    }

    public function chunkSize():int{
        return 50;
    }

    public function rules(): array
    {
        return [
            '患者番号' => 'required|regex:/^[0-9]+$/i',
            'カナ氏名' => 'required|regex:/^[ァ-ヶー　]+$/u',
            '生年月日' => 'required|string|date_format:Y/m/d',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '患者番号.required' => '患者番号が未入力です。',
            '患者番号.regex' => '患者番号は半角数字で入力してください。',
            'カナ氏名.required' => '氏名が未入力です。',
            'カナ氏名.regex' => '氏名はカタカナで入力してください。',
            '生年月日.required' => '生年月日が未入力です。',
            '生年月日.date_format' => '生年月日は半角数字でyear/month/dayの形で入力してください。',
        ];
    }
}

<?php

namespace App\Imports;

use App\Models\Accounting;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountingsImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    public function rules(): array
    {
        return [
            'course' => 'required',
            'group' => 'required',
            // 'Subject'
            // 'Lectures'
            // 'Practices'
            // 'Labs'
            // 'Moduls'
            // 'Consultations_Sem'
            // 'Consultations_Ex'
            // 'Tests'
            // 'CourseWorks'
            // 'DiplomasBak'
            // 'DiplomasSpec'
            // 'DiplomasMag'
            // 'PracticeManagements'
            // 'StateExams'
            // 'TotalHours'
            // 'Month'
            // 'Type'
        ];
    }
    public function model(array $row)
    {
        return new Accounting([
            'Course' => $row['course'],
            'Group' => $row['group'],
            'Subject' =>  $row[ 'subject'],
            'Lectures' =>  $row['lectures'],
            'Practices' =>  $row['practices'],
            'Labs' =>  $row['labs'],
            'Moduls' =>  $row[ 'moduls'],
            'Consultations_Sem' =>  $row['consultations_sem'],
            'Consultations_Ex' =>  $row['consultations_ex'],
            'Tests' =>  $row['tests'],
            'CourseWorks' =>  $row['courseworks'],
            'DiplomasBak' =>  $row['diplomasbak'],
            'DiplomasSpec' =>  $row['diplomasspec'],
            'DiplomasMag' =>  $row['diplomasmag'],
            'PracticeManagements' =>  $row['practicemanagements'],
            'StateExams' =>  $row['stateexams'],
            'TotalHours' =>  $row['totalhours'],
            'Month' => $row['month'],
            'Type' => $row['type']
        ]);
    }
}

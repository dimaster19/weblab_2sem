<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['Course', 'Group', 'Subject', 'Lectures', 'Practices', 'Labs',  'Moduls', 'Consultations_Sem', 'Consultations_Ex', 'Tests', 'CourseWorks', 'DiplomasBak', 'DiplomasSpec', 'DiplomasMag',  'PracticeManagements', 'StateExams', 'TotalHours', 'Month', 'Type'];
}

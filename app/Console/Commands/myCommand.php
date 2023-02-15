<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class myCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounting:testAdd
                            {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add test data in accounting table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $months=array('january','february','march','april','may','june','july','august','september','october','november','december');
        $types = array ('бюджет', 'контракт');
        for ($i = 0; $i < $this->argument('count'); $i++) {
            DB::table('accountings')->insert(
                [
                    'Lectures' => random_int(1, 100),
                    'Practices' => random_int(1, 100),
                    'Labs' => random_int(1, 100),
                    'Moduls' => random_int(1, 100),
                    'Consultations_Sem' => random_int(1, 100),
                    'Consultations_Ex' => random_int(1, 100),
                    'Tests' => random_int(1, 100),
                    'CourseWorks' => random_int(1, 100),
                    'DiplomasBak' => random_int(1, 100),
                    'DiplomasSpec' => random_int(1, 100),
                    'DiplomasMag' => random_int(1, 100),
                    'PracticeManagements' => random_int(1, 100),
                    'StateExams' => random_int(1, 100),
                    'TotalHours' => random_int(1, 100),
                    'Month' => $months[array_rand($months)],
                    'Type' => $types[array_rand($types)],
                    'Course' => 1,
                    'Group' => 'ИВТ'
                ]
            );
        }
        $this->comment("Добавлено " . $this->argument('count') . " тестовых записей");
    }
}

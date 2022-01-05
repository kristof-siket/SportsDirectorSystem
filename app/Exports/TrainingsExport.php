<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.25.
 * Time: 11:11
 */

namespace App\Exports;


use App\ModelInterfaces\ISport;
use App\Services\HelperClasses\TrainingData;
use App\Services\Interfaces\ITrainingPlanner;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingsExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * @var TrainingData[] $trainings
     */
    protected $trainings;

    /**
     * TrainingsExport constructor.
     * @param int $years
     * @param ISport $sport
     * @param ITrainingPlanner $trainingPlanner
     */
    public function __construct(int $years, ISport $sport, ITrainingPlanner $trainingPlanner)
    {
        $this->trainings = $trainingPlanner->createTrainingPlan($sport, $years);
    }

    public function collection()
    {
        $arraysOfTrainings = new Collection();

        foreach ($this->trainings as $training) {
            $arraysOfTrainings->push(
                [
                    'date' => $training->getDate()->format('Y-m-d'),
                    'description' => $training->getDescription(),
                    'kilometers' => $training->getKilometers() . ' km',
                    'sport' => $training->getSport()->getSportName()
                ]
            );
        }

        return $arraysOfTrainings;
    }

    public function headings(): array
    {
        return [
            'Date',
            'Description',
            'Distance',
            'Sport',
        ];
    }


//    /**
//     * @return Collection
//     */
//    public function collection()
//    {
//        return collect($this->trainings);
//    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->trainings;
    }
}
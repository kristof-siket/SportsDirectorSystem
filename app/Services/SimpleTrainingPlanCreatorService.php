<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.25.
 * Time: 10:51
 */

namespace App\Services;


use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITrainingPlan;
use App\Services\HelperClasses\TrainingData;
use App\Services\Interfaces\ITrainingPlanner;

class SimpleTrainingPlanCreatorService implements ITrainingPlanner
{

    /**
     * @param ISport $sport
     * @param int $years
     * @return TrainingData[]
     */
    public function createTrainingPlan(ISport $sport, int $years): array
    {
        $trainings = array();

        $period = 60; // generate training plan for a 60day period
        $restday = $this->getRestDay($years);
        $date = new \DateTime(date("Y-m-d"));

        /**
         * @var TrainingData $previous
         */
        $previous = null;

        for ($i = 1; $i <= $period; $i++) {
            $trainingdate = today()->add(date_interval_create_from_date_string($i . ' days'));
            if ($i % $restday == 0) {
                $trainings[$i - 1] = new TrainingData($sport, "REST DAY", 0, $trainingdate);
            } else {
                $easyDistance = ($years + 1) * 2 + 1;
                $fartlekDistance = ($years + 1) * 3 + 1 + (rand(-2, 2));
                $longDistance = ($years + 1) * 4 + 1 + (rand(-2, 3));

                if ($previous == null || (strpos(strtolower($previous->getDescription()), 'long') !== false)) {
                    $trainings[$i - 1] = new TrainingData($sport, "Easy training of " . $easyDistance . "kilometers", $easyDistance, $trainingdate);
                    $previous = $trainings[$i - 1];
                } else if (strpos(strtolower($previous->getDescription()), 'easy') !== false) {
                    $trainings[$i - 1] = new TrainingData($sport, "Fartlek training of " . $fartlekDistance . "kilometers", $fartlekDistance, $trainingdate);
                    $previous = $trainings[$i - 1];
                } else if (strpos(strtolower($previous->getDescription()), 'fartlek') !== false) {
                    $trainings[$i - 1] = new TrainingData($sport, "Long training of " . $longDistance . "kilometers", $longDistance, $trainingdate);
                    $previous = $trainings[$i - 1];
                }
            }
        }

        return $trainings;
    }

    private function getRestDay(int $level): int
    {
        switch ($level) {
            case 0:
                {
                    return 2; // every second days is rest day
                }
            case 1:
                {
                    return 3; // every third days is rest day
                }
            case 2:
                {
                    return 5; // every fifth days is a rest day
                }
            case 3:
                {
                    return 7; // every seventh day is a rest day
                }
            default:
                {
                    return 2;
                }
        }
    }

    /**
     * @param ITrainingPlan $tp
     */
    public function saveTrainingPlanToFile(ITrainingPlan $tp): void
    {
        // TODO: Implement saveTrainingPlanToFile() method.
    }
}
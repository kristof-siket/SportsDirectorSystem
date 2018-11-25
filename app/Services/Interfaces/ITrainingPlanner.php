<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.25.
 * Time: 9:03
 */

namespace App\Services\Interfaces;

use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITrainingPlan;

/**
 * Interface ITrainingPlanner
 * @package App\Services\Interfaces
 *
 * Provides the training plan generation logic
 *
 */
interface ITrainingPlanner
{
    /**
     * @param ISport $sport
     * @param int $years
     * @return mixed
     */
    function createTrainingPlan(ISport $sport, int $years): array;

    /**
     * @param ITrainingPlan $tp
     */
    function saveTrainingPlanToFile(ITrainingPlan $tp): void;
}
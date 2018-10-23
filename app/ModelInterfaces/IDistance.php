<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:34
 */

namespace App\ModelInterfaces;


interface IDistance
{
    /**
     * @return int
     */
    public function getDistanceId(): int;

    /**
     * @param int $distance_id
     */
    public function setDistanceId(int $distance_id);

    /**
     * @return ISport
     */
    public function getDistanceSport();

    /**
     * @param ISport $distance_sport
     */
    public function setDistanceSport($distance_sport);

    /**
     * @return ISport
     */
    public function getDistancePartsport(): ISport;

    /**
     * @param ISport $distance_partsport
     */
    public function setDistancePartsport(ISport $distance_partsport);

    /**
     * @return string
     */
    public function getDistanceName(): string;

    /**
     * @param string $distance_name
     */
    public function setDistanceName(string $distance_name);

    /**
     * @return int
     */
    public function getDistanceKilometers(): int;

    /**
     * @param int $distance_kilometers
     */
    public function setDistanceKilometers(int $distance_kilometers);
}
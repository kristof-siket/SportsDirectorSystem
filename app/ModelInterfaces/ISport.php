<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:35
 */

namespace App\ModelInterfaces;


interface ISport
{
    /**
     * @return int
     */
    public function getSportId();

    /**
     * @param int $sport_id
     */
    public function setSportId($sport_id);

    /**
     * @return string
     */
    public function getSportName(): string;

    /**
     * @param string $sport_name
     */
    public function setSportName(string $sport_name);

    /**
     * @return bool
     */
    public function isMultisport(): bool;

    /**
     * @param bool $multisport
     */
    public function setMultisport(bool $multisport);

    /**
     * @return string
     */
    public function getSportDesc(): string;

    /**
     * @param string $sport_desc
     */
    public function setSportDesc(string $sport_desc);
}
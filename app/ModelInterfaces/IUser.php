<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:37
 */

namespace App\ModelInterfaces;


interface IUser
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name);

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name);

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     */
    public function setPassword(string $password);

    public function getTeam(): ?ITeam;

    /**
     * @param ITeam $team
     */
    public function setTeam(ITeam $team);

    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime;

    /**
     * @param \DateTime $date_of_birth
     */
    public function setDateOfBirth(\DateTime $date_of_birth);

    /**
     * @return string
     */
    public function getLocation(): string;

    /**
     * @param string $location
     */
    public function setLocation(string $location);
}
<?php

namespace Appratoo\PlatformBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Appratoo\PlatformBundle\Repository\UserRepository")
 */
class User extends BaseUser {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    protected $age;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    protected $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255)
     */
    protected $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string", length=255)
     */
    protected $nourriture;

    /**
     * @ORM\ManyToMany(targetEntity="Appratoo\PlatformBundle\Entity\User", cascade={"persist"})
     */
    protected $amis;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age) {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return User
     */
    public function setFamille($famille) {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille() {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return User
     */
    public function setRace($race) {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace() {
        return $this->race;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return User
     */
    public function setNourriture($nourriture) {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture() {
        return $this->nourriture;
    }

    /**
     * Add ami
     *
     * @param \Appratoo\PlatformBundle\Entity\User $ami
     *
     * @return User
     */
    public function addAmi(\Appratoo\PlatformBundle\Entity\User $ami) {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \Appratoo\PlatformBundle\Entity\User $ami
     */
    public function removeAmi(\Appratoo\PlatformBundle\Entity\User $ami) {
        $this->amis->removeElement($ami);
    }

    /**
     * Get amis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmis() {
        return $this->amis;
    }

    public function estAmi($ami) {
        return $this->getAmis()->contains($ami);
    }

}

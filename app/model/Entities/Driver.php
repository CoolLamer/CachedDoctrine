<?php
namespace CachedDoctrine\Entities;

use Nella\Doctrine\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="drivers")
 * @ORM\Cache("NONSTRICT_READ_WRITE")
 */
class Driver extends Entity
{

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\Cache()
	 * @ORM\OneToOne(targetEntity="User")
	 * @var User
	 */
	protected $userProfile;

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param \Entities\User $userProfile
	 */
	public function setUserProfile($userProfile)
	{
		$this->userProfile = $userProfile;
	}

	/**
	 * @return \Entities\User
	 */
	public function getUserProfile()
	{
		return $this->userProfile;
	}


} 
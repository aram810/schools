<?php

namespace school\dto;

class StudentDTO {

	private $id;

	private $firstname;
    
    private $lastname;
    
    private $age;
    
    private $birthday;
    
    private $email;
    
    private $sex;
	
	private $about;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	public function getFirstname()
	{
		return $this->firstname;
	}
	
	public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
	
	public function getLastname()
	{
		return $this->lastname;
	}
	
	public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
	
	public function getAge()
	{
		return $this->age;
	}
	
	public function setAge($age)
    {
        $this->age = $age;
    }
	
	public function getBirthday()
	{
		return $this->birthday;
	}
	
	public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
    {
        $this->email = $email;
    }
	
	public function getSex()
	{
		return $this->sex;
	}
	
	public function setSex($sex)
    {
        $this->sex = $sex;
    }
	
	public function getAbout()
	{
		return $this->about;
	}
	
	public function setAbout($about)
    {
        $this->about = $about;
    }
}
?>
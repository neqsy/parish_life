<?php


class Order
{
    private $name;
    private $surname;
    private $intention;
    private $phone;
    private $date;

    public function __construct(

        $name,
        $surname,
        $intention,
        $phone,
        $date

    ) {
        $this->surname = $surname;
        $this->date = $date;
        $this->intention = $intention;
        $this->phone = $phone;
        $this->name = $name;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getIntention()
    {
        return $this->intention;
    }

    /**
     * @param mixed $intention
     */
    public function setIntention($intention): void
    {
        $this->intention = $intention;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }




}
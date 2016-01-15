<?php

/**
 * Created by PhpStorm.
 * User: sande
 * Date: 08/01/2016
 * Time: 19:59
 */
class User implements JsonSerializable
{
    private $id;
    private $name;
    private $birthday;
    private $gender;
    private $address;
    private $postalcode;
    private $phonenr;
    private $email;
    private $facebookid;
    private $credits;
    private $total;

    private $accessible = array('id', 'name', 'birthday', 'gender', 'address', 'postalcode', 'phonenr', 'email', 'facebookid', 'credits', 'total');
    private $editable = array('name', 'birthday', 'gender', 'address', 'postalcode', 'phonenr', 'email', 'facebookid');
    private $required = array('id', 'name');

    public function __get ($name) {
        if (in_array($name, $this->accessible)) {
            if (isset($this->$name)) {
                return $this->$name;
            }
        }

        return null;
    }

    public function __set ($name, $value) {
        if (in_array($name, $this->editable)) {
            if (isset($this->$name)) {
                $this->$name = $value;
            }
        }

        return null;
    }

    public function __construct(Array $params = array()){
        if(count($params) > 0){
            foreach ($params as $key => $value) {
                $this->$key = $value;
            }

            foreach($this->required as $key){
                if(!isset($this->$key)){
                    throw new \InvalidArgumentException('Invalid use of constructor:\n' . $key . ' can\'t be empty');
                }
            }
        }
    }

    public function jsonSerialize(){
        return ['id' => $this->id,
            'name'=>$this->name,
            'birthday'=>$this->birthday,
            'gender'=>$this->gender,
            'address'=>$this->address,
            'postalcode'=>$this->postalcode,
            'phonenr'=>$this->phonenr,
            'email'=>$this->email,
            'facebookid'=>$this->facebookid,
            'credits'=>$this->credits,
            'total'=>$this->total
        ];
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 06/01/2016
 * Time: 19:44
 */

class Task implements JsonSerializable{
    private $id;
    private $name;
    private $img;
    private $description;
    private $dueDate;
    private $points;

    private $accessible = array('id', 'name', 'img', 'description', 'dueDate', 'points');
    private $editable = array('name', 'img', 'description', 'dueDate', 'points');
    private $required = array('id', 'name', 'points');

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
                'img'=>$this->img,
                'description'=>$this->description,
                'dueDate'=>$this->dueDate,
                'points'=>$this->points
        ];
    }
}
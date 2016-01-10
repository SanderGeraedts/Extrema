<?php

/**
 * Created by PhpStorm.
 * User: sande
 * Date: 10/01/2016
 * Time: 11:31
 */
class Reward implements JsonSerializable
{
    private $id;
    private $title;
    private $credits;
    private $description;
    private $image;

    private $accessible = array('id', 'title', 'credits', 'description', 'image');
    private $editable = array('title', 'credits', 'description', 'image');
    private $required = array('id', 'title', 'credits', 'description', 'image');

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
            'title'=>$this->title,
            'credits'=>$this->credits,
            'description'=>$this->description,
            'image'=>$this->image
        ];
    }
}
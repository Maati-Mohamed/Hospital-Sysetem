<?php
class Validate
{
    private $passed = false,
            $error  = array(),
            $db     = null;
    public function __construct(){
        $this->db = DB::getInstance();
    }
    public function check($source,$items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
              $value = trim($source[$item]);
                if($rule === 'required' && empty($value)){
                    $this->addError("الرجاء كتابة {$item} ..");
                } else if(!empty($value)){
                    switch($rule){
                        case 'min' :
                            if(strlen($value) < $rule_value){
                                $this->addError("الرجاء كتابة الاسم رباعي ..");
                            }
                        break;
                        case 'unique' :
                            $check = $this->db->get($rule_value,array('name' ,"=", "$value"));
                            if($check->count()){
                                $this->addError("  هذا المريض حجز من قبل ..");
                            }
                        break;
                    }
                }
            }
        }
        if(empty($this->error)){
            $this->passed = true;
        }
        return $this;
    }
    private function addError($error){
         $this->error[] = $error;
    }
    public function error(){
        return $this->error;
    }
    public function passed(){
        return $this->passed;
    }
}
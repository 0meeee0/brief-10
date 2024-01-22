<?php

class User {
    private $user_id;
    private $user_name;
    private $email;
    private $password;
    private $role;
    private $is_active;
    private $date_register;
    private $fk_company_id;

    // Constructor
    public function __construct($user_id = null, $user_name = null, $email = null, $password = null,
                                $role = 'client', $is_active = true, $date_register = null, $fk_company_id = null) {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->is_active = $is_active;
        $this->date_register = $date_register ? $date_register : date('Y-m-d H:i:s');
        $this->fk_company_id = $fk_company_id;
    }

    // Getters and setters
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function getDateRegister() {
        return $this->date_register;
    }

    public function setDateRegister($date_register) {
        $this->date_register = $date_register;
    }

    public function getFkCompanyId() {
        return $this->fk_company_id;
    }

    public function setFkCompanyId($fk_company_id) {
        $this->fk_company_id = $fk_company_id;
    }
}
?>

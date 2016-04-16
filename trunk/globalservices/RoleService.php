<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RoleService {

    public function getRoles() {
        return Role::model()->findAll(array(
            'select' => 'id,role_name'
        ));
    }
    
    public static function getRoleName($roleId){
        $result = Role::model()->findByPk($roleId,array(
            'select' => 'role_name',
        ));
        return $result->role_name;
    }

}

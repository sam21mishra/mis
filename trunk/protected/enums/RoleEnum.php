<?php

/**
 * RoleEnum class will be use to validate current logged in user role
 * @author SAURABH MISHRA <sam21mishra@gmail.com>
 * @version $Id:$
 */
final class RoleEnum extends Enum {

    const SYSADMIN = 1;
    const ADMIN = 2;
    const CM = 3; // CM stands for center manager
    const HR = 4;
    const ACADEMIC = 5;
    const MM = 6; // MM stands for marketing manager
    const STUDENT = 7;
    const ACCOUNTANT = 8;
    const COUNSELOR = 9;
    
    final public static function roleName($role_id){
        switch($role_id){
            case SYSADMIN : 
                return 'System Admin';
                break;
            case ADMIN :
                return 'Admin';
                break;
            case CM :
                return 'Center Manager';
                break;
            case HR :
                return 'HR';
                break;
            case ACADEMIC :
                return 'Academic';
                break;
            case MM:
                return 'Marketing Manager';
                break;
            case STUDENT : 
                return 'Student';
                break;
            case ACCOUNTANT :
                return 'Accountant';
                break;
            case COUNSELOR : 
                return 'Counselor';
                break;
        }
    }
}

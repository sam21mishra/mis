<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

final class DateEnum extends Enum {

    const ENUM_d_m_Y = 'd-m-Y';
    const ENUM_d_M_Y = 'd-M-Y';
    const ENUM_d_m_Y_h_i = 'd-m-Y h:i';
    public static function time(){
        return time();
    }
    
    

}
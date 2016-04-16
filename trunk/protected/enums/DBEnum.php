<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBEnum
 *
 * @author twocandles
 */
abstract class DBEnum extends Enum
{
    static private $MY_LOG_CATEGORY = 'components.enums.DBEnum';
    // Flag to check if integrity db has been checked, only necessary
    // if enums are stored in DB. Default implementation never check
    private $_isDBChecked;

    // Returns if $value is a valid enum value
    public function isValidValue( $value )
    {
        if( !isset( self::$_isDBChecked ) )
            $this->checkDBIntegrity();

        return parent::isValidValue( $value );
    }

    // Returns an array with the enum values (for validation)
    public function getValidValues()
    {
        if( !isset( self::$_isDBChecked ) )
            $this->checkDBIntegrity();

        return parent::getValidValues();
    }

    // Returns an array ready to be used by a dropdown box
    public function getDataForDropDown()
    {
        if( !isset( self::$_isDBChecked ) )
            $this->checkDBIntegrity();

        return parent::getDataForDropDown();
    }

    private function isEnumValueInDBResults( $value, $dbResults )
    {
        foreach( $dbResults as $result )
        {
            if( $value == $result[$this->getDBField()] )
                return true;
        }
        return false;
    }

    /**
     * Check date integrity for enum in DB
     * @return boolean
     */
    protected function checkDBIntegrity()
    {
        // Get enum values in DB
        $command = Yii::app()->db->createCommand()
                        ->select( $this->getDBField() )
                        ->from( $this->getDBTable() );
        // Let's see if there's a condition
        if( $this->getDBCondition() != '' )
            $command->where( $this->getDBCondition() );
        // Query values
        $dbValues = $command->queryAll();
        // Get declared enum values
        $enumValues = parent::getValidValues();
        // Check that number of items match
        if( count( $enumValues ) != count( $dbValues ) )
        {
            Yii::log( 'Enum "' . $this->getEnumName() . '" integrity failed. Enum count values mismatch', CLogger::LEVEL_ERROR, self::$MY_LOG_CATEGORY );
            throw new Exception( "Failed integrity check for enum in DB" );
        }
        // Check that all constants are inside the DB
        // Hard to reproduce since it's impossible if the Enum value is a PK
        // in the table
        foreach( $enumValues as $value )
        {
            if( !( $this->isEnumValueInDBResults( $value, $dbValues ) ) )
            {
                Yii::log( 'Enum "' . $this->getEnumName() . '" integrity failed. Value "' . $value . '" not found in DB', CLogger::LEVEL_ERROR, self::$MY_LOG_CATEGORY );
                throw new Exception( "Failed integrity check for enum in db" );
            }
        }
        // Check that all db values are valid enum constants
        foreach( $dbValues as $value )
        {
            if( !parent::isValidValue( $value[$this->getDBField()] ) )
            {
                Yii::log( 'Enum "' . $this->getEnumName() . '" integrity failed. Value "' . $value . '" not found in Enum', CLogger::LEVEL_ERROR, self::$MY_LOG_CATEGORY );
                throw new Exception( "Failed integrity check for enum in db" );
            }
        }
        return true;
    }

    protected abstract function getDBField();

    protected abstract function getDBTable();

    protected function getDBCondition()
    {
        return "";
    }

}

?>

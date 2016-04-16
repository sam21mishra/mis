<?php

/**
 * COMMONFUNCTION is a class that will help to call reuseable function
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
class COMMONFUNCTION {

    /**
     * setFlash function will help to set flash content
     * @param String $type -- this should be either success or error
     * @param String $msg -- this can be any message you want to print
     */
    public static function setFlash($type, $msg) {
        Yii::app()->user->setFlash($type, $msg);
    }

    /**
     * getFlash function will return flash content set by user
     * @param 
     * @return String 
     */
    public static function getFlash() {
        if (Yii::app()->user->hasFlash('success')) {
            return '<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Yii::app()->user->getFlash('success') .'</div>';
        } elseif (Yii::app()->user->hasFlash('error')) {
            return '<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Yii::app()->user->getFlash('error') .'</div>';
        } else {
            return '';
        }
    }

    public static function logModelErrors($errors = array()) {
        if (!empty($errors)) {
            $errorMsg = '';
            foreach ($errors as $key => $value) {
                foreach ($value as $error) {
                    $errorMsg .= $error . "\n";
                }
            }
            Yii::log($errorMsg, CLogger::LEVEL_INFO);
            if (Yii::app()->params['env']) {
                self::setFlash('error', $errorMsg);
            }
        }
    }

    public function uploadInTemp($file) {
        move_uploaded_file($file['file_name'], Yii::getPathOfAlias('uploads') . '/temp');
    }

    public static function downloadFile($file) {
        $url = Yii::getPathOfAlias('uploads') . '/valid/';
        if (file_exists($url . $file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($url . $file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($url . $file));
            readfile($url . $file);
            exit;
        }
    }

    public static function returnQuery($tableName,$criteria) {
        $schema = Yii::app()->db->schema;
        $builder = $schema->commandBuilder;
        $command = $builder->createFindCommand($schema->getTable($tableName), $criteria);
        $result = $command->text;
        return $result;
    }
    
    public static function formatDate($date,$format){
        $date = str_replace('/', '-', $date);
        return date($format,  strtotime($date));
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TempController extends Controller {

    public function actionDownload($file) {
        COMMONFUNCTION::downloadFile($file);
    }

}

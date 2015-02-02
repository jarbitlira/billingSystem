<?php
/**
 * Created by PhpStorm.
 * User: richr
 * Date: 02-01-15
 * Time: 10:00 PM
 */

class LanguageController extends BaseController {
    public function chooser(){
        echo Input::get('locale'); //cambio
    }

}
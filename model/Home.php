<?php

class HomeModel extends Model {

    public function Index() {
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/log/test.log","HomeModel:Index: " . "\n",FILE_APPEND);

        //header('Location: '.ROOT_URL.'home/index');
        return;
    }
}

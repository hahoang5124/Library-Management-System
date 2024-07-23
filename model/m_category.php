<?php
// thao tacs du lieu trong co so du lieu
include_once 'm_pdo.php';
    function categoly_getALL(){
        return pdo_query("SELECT * FROM chude");
    }
    function category_getById($id){
    return pdo_query_one("SELECT* FROM chude 
    where MaCD =?", $id);

    }

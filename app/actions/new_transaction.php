<?php
require("../../database/");
$category = filter_input(INPUT_POST ,"product_category", FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST ,"product_type", FILTER_SANITIZE_STRING);
$origin = filter_input(INPUT_POST ,"product_origin", FILTER_SANITIZE_STRING);

if($category && $type && $origin){

}
<?php

Route::get("check", function () {
    echo 'hya from wtf';
});

Route::get("products", "Kriegsmarine\crudproducts\controllers\CrudProductsController@index");
Route::get("createProduct", "Kriegsmarine\crudproducts\controllers\CrudProductsController@showForm");
Route::post("createProduct", "Kriegsmarine\crudproducts\controllers\CrudProductsController@create");
Route::get("readProduct/{id}", "Kriegsmarine\crudproducts\controllers\CrudProductsController@read");
//Route::get("updateProduct", "Kriegsmarine\crudproducts\controllers\CrudProductsController@showForm");
Route::post("updateProduct/{id}", "Kriegsmarine\crudproducts\controllers\CrudProductsController@update");
Route::get("deleteProduct/{id}", "Kriegsmarine\crudproducts\controllers\CrudProductsController@delete");

<?php

Validator::extend('alpha_custom', function($attribute, $value, $parameters){

	return preg_match('/^[0-9a-zA-ZáéíóúÁÉÍÓÚÑñ""%@&():$-\.\/<>_,#.\ ]*-?+$/', $value);
});
Validator::extend('alpha_spaces', function($attribute, $value){

	return preg_match('/^[\pL\s]+$/u', $value);

});

?>

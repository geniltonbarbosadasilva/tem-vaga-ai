<?php

class Validation {

    private static $MESSAGE;

    public static function validate( $record, $requirements ){
        foreach ($record as $key => $attribute) {
            if ( array_key_exists( $key, $requirements ) ) {
                $requires = $requirements[$key];
                $requires = strtolower($requires);
                $requires = explode("|", $requires);

                foreach ( $requires as $require) {
                    switch ( $require ) {
                        case 'require':
                            if ( empty($attribute) ) {
                                Validation::$MESSAGE = "O atributo $key não pode ser vazio.";
                                return false;
                            }
                            break;
                        case 'string':
                            if ( !is_string($attribute) ) {
                                Validation::$MESSAGE = "O atributo $key deve ser uma string.";
                                return false;
                            }
                            break;
                        case 'number':
                            if ( !is_numeric($attribute) ) {
                                Validation::$MESSAGE = "O atributo $key deve ser um numero.";
                                return false;
                            }
                            break;
                        case 'email':
                            if ( !strpos( $attribute, "@") ) {
                                Validation::$MESSAGE = "O atributo $key deve ser um email.";
                                return false;
                            }
                            break;
                    }                    
                }
            }
        }
        return true;
    }

    public static function getMessage(){
        return Validation::$MESSAGE;
    }
}

<?php

    abstract class Sessao{

        public static function iniciar(){
            @session_start();
        }

        public static function setVariavel($var,$valor){
            self::iniciar();
            $_SESSION[$var] = $valor;
        }

        public static function variavelDefinida($var){
            self::iniciar();
            return isset($_SESSION[$var]);
        }

        public static function somenteUsuariosAutenticados($redirect){
            if(!self::variavelDefinida('nome')){
                header('location: ' .$redirect);
                exit();
            }
        }
    }
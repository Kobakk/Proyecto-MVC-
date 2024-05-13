<?php
class RegistroRepositorio{
    public function getProvincia(){
        $sql = "SELECT id, nombre FROM provincia";
    }
    public function getPueblo(){
        $sql = "SELECT id, nombre, idProvincia FROM pueblo";
    }
}
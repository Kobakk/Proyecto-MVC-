<?php
class SessionRepositorio{
    public function getUsuarioPorCorreo(string $correo){
        $sql = "SELECT id, nombre, pwd FROM cliente
        WHERE eCorreo = :eCorreo";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':eCorreo',$correo);
            $stn->execute();
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }
    }
    public function setNuevoUsuario(array $nuevoUsuario){
        $sql="INSERT INTO cliente (nombre, direccion, cP, idPueblo,eCorreo, pwd )
            VALUES (:nombre, :direccion, :cP, :idPueblo, :eCorreo, :pwd)";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':nombre',$nuevoUsuario['nombre']);
            $stn->bindValue(':direccion',$nuevoUsuario['direccion']);
            $stn->bindValue(':cP',$nuevoUsuario['cP']);
            $stn->bindValue(':idPueblo',$nuevoUsuario['idPueblo']);
            $stn->bindValue(':eCorreo',$nuevoUsuario['eCorreo']);
            $stn->bindValue(':pwd',$nuevoUsuario['pwd']);
            $stn->execute();
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }        
    }
}
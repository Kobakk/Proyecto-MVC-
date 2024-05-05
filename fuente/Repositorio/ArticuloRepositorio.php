<?php

//use ElectroVadillo\Core\ConexionBd;

class ArticuloRepositorio{
    public function getCategorias():array{
        $sql = "SELECT id, nombre, imagen, descripcion 
        FROM categoria";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->execute();
            return $stn->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $ex){
            throw $ex;
        }catch(\Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }
    }
    public function getArticulosPorCategoria(int $idCategoria):array{
        $sql = "SELECT codigo, descripcion, pv, stock, reponerA, idCategoria 
        FROM articulo 
        WHERE idCategoria = :idCategoria";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(":idCategoria",$idCategoria);
            $stn->execute();
            return $stn->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $ex){
            throw $ex;
        }catch(\Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;            
        }
    }

    public function acutializarArticulo(int $cantidad, string $codArticulo){
        $sql = "UPDATE articulo 
            SET stock = stock - :cantidad
            WHERE codigo = :codArticulo";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':cantidad',$cantidad);
            $stn->bindValue(':codArticulo',$codArticulo);
            $stn->execute();
        }catch(\PDOException $ex){
            throw $ex;          
        }catch(\Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }
    }
}
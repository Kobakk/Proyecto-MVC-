<?php
class PedidoRepositorio{
    public function setPedido(array $pedido):int{
        $sql = "INSERT INTO pedido (idCliente, fPedido)
        VALUES (:idCliente,:fecha)";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':idCliente',$pedido['idCliente']);
            $stn->bindValue(':fecha',$pedido['fecha']);
            $stn->execute();
            return $con->lastInsertId();
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }
    }
    public function updateLineaPedido(int $codigo,int $cantidad){
        $sql = "UPDATE lineaPedido 
                SET cantidad += :cantidad
                WHERE codArticulo = :codigo";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':codigo',$codigo);
            $stn->bindValue(':cantidad',$cantidad);
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
    //Comprobamos is ya existe el pedido
    public function comprobarCodArticuloEnLineaPedido(int $codArticulo):bool
    {
        $sql = "IF EXISTS 
                (SELECT * FROM lineaPedido where codArticulo = :codArticulo)
	            begin
                select 1;
                end
                ELSE
                begin
                select 0;
                end";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':codigo',$codigo);
            $stn->execute();
            return (bool)$snt->fetchColumn(0);
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }     
    }
    public function setLineaPedido(array $pedido, int $id):int{
        $sql = "INSERT INTO lineaPedido (idPedido, codArticulo,cantidad,pv)
        VALUES (:idPedido,:codArticulo, :cantidad, :pv)";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':idPedido',$id);
            $stn->bindValue(':codArticulo',$pedido['codArticulo']);
            $stn->bindValue(':cantidad',$pedido['cantidad']);
            $stn->bindValue(':pv',$pedido['precio']);
            $stn->execute();
            return $con->lastInsertId();
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }        
    }
    public function setPedidoYlineaPedido():array{
        $sql = "INSERT INTO pedido (idCliente, fPedido)
            VALUES(:idCliente, :fecha)";
        $sql2 = "INSERT INTO lineaPedido (codArticulo,cantidad,pv) 
        VALUES (:codigo, :cantidad,:pv)";
        return $array = [];
    }
    public function añadirPedido(int $codigo, string $fecha):array{
        return $array = [];
    }
}
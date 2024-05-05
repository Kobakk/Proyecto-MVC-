<?php
class PedidoRepositorio{
    public function setPedido(array $pedido){
        $sql = "INSERT INTO pedido (idCliente, codArticulo,fPedido, cantidad, pv)
        VALUES (:idCliente,:codArticulo,:fecha,:cantidad,:pv)";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':idCliente',$pedido['idCliente']);
            $stn->bindValue(':codArticulo',$pedido['codArticulo']);
            $stn->bindValue(':fecha',$pedido['fecha']);
            $stn->bindValue(':cantidad',$pedido['cantidad']);
            $stn->bindValue(':pv',$pedido['total']);
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
    public function setPedidoYlineaPedido():array{
        $sql = "";
        return $array = [];
    }

    public function updatePedido(){
        $sql = "";
        return $array = [];
    }
}
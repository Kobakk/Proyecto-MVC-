<?php
class FacturaRepositorio{
    public function setFactura(int $id, string $correo, string $fecha,float $total):int{
        $sql = "INSERT INTO factura (idPedido, eCorreo, fFactura, total)
        VALUES(:idPedido, :eCorreo, :fFactura, :total)";
        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':idPedido',$id);
            $stn->bindValue(':eCorreo',$correo);
            $stn->bindValue(':fFactura',$fecha);
            $stn->bindValue(':total',$total);
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
    
    public function setLineaFactura(int  $id, int $idFactura){
        $sql1 = "INSERT INTO lineaFactura (idFactura, codigoArticulo, cantidad, pc)
        VALUES (:idFactura, :codigoArticulo, :cantidad, :pc)";

        $sql2 = "SELECT codArticulo, cantidad, pv FROM lineaPedido WHERE idPedido = :idPedido";

        try{
            require_once __DIR__ . '/../../core/ConexionBd.inc';
            $con = (new ConexionBd())->getConexion();
            $stn = $con->prepare($sql2);
            $stn->bindValue(':idPedido',$id);
            $stn->execute();
            $lineaPedido =  $stn->fetchAll(\PDO::FETCH_ASSOC);

            $codigoArticulo = '';
            $cantidad = '';
            $pc = '';

            $stn = $con->prepare($sql1);
            $stn->bindValue(':idFactura',$idFactura);
            $stn->bindParam(':codigoArticulo',$codigoArticulo);
            $stn->bindParam(':cantidad',$cantidad);
            $stn->bindParam(':pc',$pc);

            foreach($lineaPedido as $numFila => $fila){
                $codigoArticulo = $fila['codArticulo'];
                $cantidad = $fila['cantidad'];
                $pc = $fila['pv'];
                $stn->execute();
            }
        }catch(\PDOException $ex){
            throw $ex;
        }catch(Exception $ex){
            throw $ex;
        }finally{
            $con = null;
            $stn = null;
        }          
    }
    public function setFacturaYlineaFactura():array{
        $sql = "";
        return $array = [];
    }

    public function updateFactura(){
        $sql = "";
        return $array = [];
    }
}
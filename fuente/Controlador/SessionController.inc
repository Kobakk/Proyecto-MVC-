<?php
class SessionController{
    public function inicioSesion(){

        require_once __DIR__ . ('../../../app/plantillas/formularioInicioSesion.inc');
    }
    public function comprobarFormularioSesion(){
        if(isset($_POST['ok'])){
            if(empty($_POST['email']) || empty($_POST['pwd'])){
                $_SESSION['error'] = 'Los dos campos deben rellenarse';
                header('Location: index.php?ctl=inicioSesion');
            }else{
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $_SESSION['error'] = 'Formato incorrecto';
                } else{
                    require_once __DIR__ . ("../../Repositorio/SessionRepositorio.php");
                    $cliente = (new SessionRepositorio())->getUsuarioPorCorreo($_POST['email']);
                    if(!password_verify($_POST['pwd'], $cliente[0]['pwd'])){
                        $_SESSION['error'] = 'La contraseña no coincide.';
                        header('Location: index.php?ctl=inicioSesion');
                    } else{
                        $_SESSION['usuario'] = $cliente[0];
                        unset($_SESSION['error']);
                        session_destroy();
                        header('Location: index.php?ctl=inicio');
                    }
                }
            }
        }
    }
    public function cerrarSesion(){
        unset($_SESSION['usuario']);
        header('Location: index.php?ctl=inicio');
    }
}
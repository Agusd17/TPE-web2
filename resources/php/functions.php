<?php 

/**
 * Listado de funciones útiles para todo el sistema, que pueden necesitar ser llamadas
 * desde distintos puntos del mismo
 */

 /**
  * Chequea si existe una sesión iniciada, y si hay un usuario logueado
  */
function checkIfAdmin() {
    
    session_start();

    if (!isset($_SESSION['USER_ROLE']) || $_SESSION['USER_ROLE'] != '1') {
        return false;
    } else {
        return true;
    }
    
}
<?php

// Função para verificar os campos vindo do input via POST
function ValidarUsuario($inputValue, $characterCounter)
{
    if (strlen($inputValue) < $characterCounter) {
        return false;
    } else {
        return true;
    }
}

// Função para verificar os campos vindo do input via POST
function ValidarSenha($password, $passwordConfirmation) 
{

    if ($password != $passwordConfirmation) {
        return false;
    } else {
        return true;
    }

}

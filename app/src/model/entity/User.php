<?php

namespace model\entity;

class User
{
    private int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }
    private string $nombre {
        get {
            return $this->nombre;
        }
        set {
            $this->nombre = $value;
        }
    }
    private string $email {
        get {
            return $this->email;
        }
        set {
            $this->email = $value;
        }
    }
    private string $password {
        get {
            return $this->password;
        }
        set {
            $this->password = $value;
        }
    }
    private string $rol {
        get {
            return $this->rol;
        }
        set {
            $this->rol = $value;
        }
    }
}
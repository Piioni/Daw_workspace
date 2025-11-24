<?php

namespace model\user;

class User
{
    public int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }
    public string $nombre {
        get {
            return $this->nombre;
        }
        set {
            $this->nombre = $value;
        }
    }
    public string $email {
        get {
            return $this->email;
        }
        set {
            $this->email = $value;
        }
    }
    public string $password {
        get {
            return $this->password;
        }
        set {
            $this->password = $value;
        }
    }
    public string $rol {
        get {
            return $this->rol;
        }
        set {
            $this->rol = $value;
        }
    }
}
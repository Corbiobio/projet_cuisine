<?php

namespace Cuisine\Models;

class Client
{
    private string $id_client;
    private string $mail_client;
    private string $password_client;
    private bool $is_admin;

    public function setId_client($id_client): void
    {
        $this->id_client = $id_client;
    }

    public function getId_client(): string
    {
        return $this->id_client;
    }
    public function setMail_client($mail_client): void
    {
        $this->mail_client = $mail_client;
    }

    public function getMail_client(): string
    {
        return $this->mail_client;
    }
    public function setPassword_client($password_client): void
    {
        $this->password_client = $password_client;
    }

    public function getPassword_client(): string
    {
        return $this->password_client;
    }
    public function setIs_admin($is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    public function getIs_admin(): bool
    {
        return $this->is_admin;
    }
}

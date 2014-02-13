<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User', array("controller" => "users", "action" => "login", "method" => "post"));

    echo $this->Form->input('username', array("label" => "Username:"));
    echo $this->Form->input('password', array("label" => "Password: "));
    echo $this->Form->end('Login');
?>
<?php

abstract class Authenticator {

  public abstract function authenticate($username, $password);
  
}
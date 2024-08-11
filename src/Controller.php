<?php
namespace Src;
use Src\Model;
use Src\View;
abstract class Controller {
  use View;
  protected Model $model;
}
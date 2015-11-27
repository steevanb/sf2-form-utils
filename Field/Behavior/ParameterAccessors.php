<?php

namespace steevanb\FormUtils\Field\Behavior;

trait ParameterAccessors
{
    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    abstract public function setParameter($name, $value);

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    abstract public function getParameter($name, $default = null);
}
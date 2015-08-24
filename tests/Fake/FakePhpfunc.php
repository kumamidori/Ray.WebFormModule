<?php
/**
 * This file is taken from Aura.Session and modified.
 */
namespace Ray\WebFormModule;

use Aura\Session\Phpfunc;

class FakePhpfunc extends Phpfunc
{
    public $extensions = array();

    public $functions = array();

    public function __construct()
    {
        $this->extensions = get_loaded_extensions();
    }

    public function session_start()
    {
        return true;
    }

    public function extension_loaded($name)
    {
        // for parent coverage
        $this->__call('extension_loaded', array($name));

        // for testing
        return in_array($name, $this->extensions);
    }

    public function function_exists($name)
    {
        if (isset($this->functions[$name])) {
            return $this->functions[$name];
        } else {
            return $this->__call('function_exists', array($name));
        }
    }
}

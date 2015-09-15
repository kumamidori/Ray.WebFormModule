<?php
/**
 * This file is part of the Ray.WebFormModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\WebFormModule\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class FormValidation extends AbstractValidation
{
    /**
     * @var bool
     */
    public $antiCsrf = false;

    /**
     * Method name on validation faild.
     *
     * @var string
     */
    public $onFailure;
}

<?php

namespace Ray\WebFormModule;

class FakeForm extends AbstractForm
{
    use SetAntiCsrfTrait;

    /**
     * @var array
     */
    private $submit = [];

    public function setSubmit(array $submit)
    {
        $this->submit = $submit;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->setField('name', 'text')
             ->setAttribs([
                 'id' => 'name'
             ]);
        $this->filter->validate('name')->is('alnum');
        $this->filter->useFieldMessage('name', 'Name must be alphabetic only.');
    }

    /**
     * {@inheritdoc}
     */
    public function submit()
    {
        return $this->submit;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $form = $this->form();
        // name
        $form .= $this->helper->tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'name']);
        $form .= 'Name:';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('name');
        $form .= $this->error('name');
        $form .= $this->helper->tag('/div') . PHP_EOL;
        // message
        $form .= $this->helper->tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'message']);
        $form .= 'Message:';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('message');
        $form .= $this->error('message');
        $form .= $this->helper->tag('/div') . PHP_EOL;
        // submit
        $form .= $this->input('submit');
        $form .= $this->helper->tag('/form');

        return $form;
    }
}

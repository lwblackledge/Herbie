<?php

/* user_activate.txt */
class __TwigTemplate_5c8bd7e787a8592fc62e8bb4f6c0c7f298a5b3f1b097c89899fa0bea9bc62993 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Subject: Reactivate your account

Hello ";
        // line 3
        echo (isset($context["USERNAME"]) ? $context["USERNAME"] : null);
        echo ",

Your account on \"";
        // line 5
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "\" has been deactivated, most likely due to changes made to your profile. In order to reactivate your account you must click on the link below:

";
        // line 7
        echo (isset($context["U_ACTIVATE"]) ? $context["U_ACTIVATE"] : null);
        echo "

";
        // line 9
        echo (isset($context["EMAIL_SIG"]) ? $context["EMAIL_SIG"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "user_activate.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 9,  33 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}

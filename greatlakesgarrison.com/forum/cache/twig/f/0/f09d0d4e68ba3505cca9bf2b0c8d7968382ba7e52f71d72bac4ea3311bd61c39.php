<?php

/* user_remind_inactive.txt */
class __TwigTemplate_f09d0d4e68ba3505cca9bf2b0c8d7968382ba7e52f71d72bac4ea3311bd61c39 extends Twig_Template
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
        echo "Subject: Inactive account reminder

Hello ";
        // line 3
        echo (isset($context["USERNAME"]) ? $context["USERNAME"] : null);
        echo ",

This notification is a reminder that your account at \"";
        // line 5
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "\", created on ";
        echo (isset($context["REGISTER_DATE"]) ? $context["REGISTER_DATE"] : null);
        echo ", remains inactive. If you would like to activate this account, please visit the following link:

";
        // line 7
        echo (isset($context["U_ACTIVATE"]) ? $context["U_ACTIVATE"] : null);
        echo "

Thank you for registering at \"";
        // line 9
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "\", we look forward to your participation.

";
        // line 11
        echo (isset($context["EMAIL_SIG"]) ? $context["EMAIL_SIG"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "user_remind_inactive.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 11,  40 => 9,  35 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}

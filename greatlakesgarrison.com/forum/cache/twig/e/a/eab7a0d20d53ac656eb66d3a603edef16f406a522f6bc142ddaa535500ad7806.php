<?php

/* quote.txt */
class __TwigTemplate_eab7a0d20d53ac656eb66d3a603edef16f406a522f6bc142ddaa535500ad7806 extends Twig_Template
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
        echo "Subject: Topic reply notification - \"";
        echo (isset($context["TOPIC_TITLE"]) ? $context["TOPIC_TITLE"] : null);
        echo "\"

Hello ";
        // line 3
        echo (isset($context["USERNAME"]) ? $context["USERNAME"] : null);
        echo ",

You are receiving this notification because \"";
        // line 5
        echo (isset($context["AUTHOR_NAME"]) ? $context["AUTHOR_NAME"] : null);
        echo "\" quoted you in the topic \"";
        echo (isset($context["TOPIC_TITLE"]) ? $context["TOPIC_TITLE"] : null);
        echo "\" at \"";
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "\". You can use the following link to view the reply made.

If you want to view the quoted post, click the following link:
";
        // line 8
        echo (isset($context["U_VIEW_POST"]) ? $context["U_VIEW_POST"] : null);
        echo "

If you want to view the topic, click the following link:
";
        // line 11
        echo (isset($context["U_TOPIC"]) ? $context["U_TOPIC"] : null);
        echo "

If you want to view the forum, click the following link:
";
        // line 14
        echo (isset($context["U_FORUM"]) ? $context["U_FORUM"] : null);
        echo "

If you no longer wish to receive updates about replies quoting you, please update your notification settings here:

";
        // line 18
        echo (isset($context["U_NOTIFICATION_SETTINGS"]) ? $context["U_NOTIFICATION_SETTINGS"] : null);
        echo "

";
        // line 20
        echo (isset($context["EMAIL_SIG"]) ? $context["EMAIL_SIG"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "quote.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  59 => 18,  52 => 14,  46 => 11,  40 => 8,  30 => 5,  25 => 3,  19 => 1,);
    }
}

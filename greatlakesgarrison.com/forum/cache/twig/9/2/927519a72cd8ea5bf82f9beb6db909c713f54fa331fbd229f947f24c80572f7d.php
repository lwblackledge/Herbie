<?php

/* bookmark.txt */
class __TwigTemplate_927519a72cd8ea5bf82f9beb6db909c713f54fa331fbd229f947f24c80572f7d extends Twig_Template
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

You are receiving this notification because a topic you bookmarked, \"";
        // line 5
        echo (isset($context["TOPIC_TITLE"]) ? $context["TOPIC_TITLE"] : null);
        echo "\" at \"";
        echo (isset($context["SITENAME"]) ? $context["SITENAME"] : null);
        echo "\", has received a reply since your last visit. You can use the following link to view the replies made, no more notifications will be sent until you visit the topic.

If you want to view the newest post made since your last visit, click the following link:
";
        // line 8
        echo (isset($context["U_NEWEST_POST"]) ? $context["U_NEWEST_POST"] : null);
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

If you no longer wish to receive updates about replies to bookmarks, please update your notification settings here:

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
        return "bookmark.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 20,  57 => 18,  50 => 14,  44 => 11,  38 => 8,  30 => 5,  25 => 3,  19 => 1,);
    }
}

<?php

/* ucp_avatar_options_remote.html */
class __TwigTemplate_31c95b586449d39dbdeccf7903293c352833db100837a9af8fdf6d7394e06b58 extends Twig_Template
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
        echo "<dl>
\t<dt><label for=\"avatar_remote_url\">";
        // line 2
        echo $this->env->getExtension('phpbb')->lang("LINK_REMOTE_AVATAR");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("LINK_REMOTE_AVATAR_EXPLAIN");
        echo "</span></dt>
\t<dd><input type=\"url\" name=\"avatar_remote_url\" id=\"avatar_remote_url\" value=\"";
        // line 3
        echo (isset($context["AVATAR_REMOTE_URL"]) ? $context["AVATAR_REMOTE_URL"] : null);
        echo "\" class=\"inputbox\" data-reset-on-edit=\"#avatar_remote_width, #avatar_remote_height\" /></dd>
</dl>
<dl>
\t<dt><label for=\"avatar_remote_width\">";
        // line 6
        echo $this->env->getExtension('phpbb')->lang("LINK_REMOTE_SIZE");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("LINK_REMOTE_SIZE_EXPLAIN");
        echo "</span></dt>
\t<dd>
\t\t<label for=\"avatar_remote_width\"><input type=\"text\" name=\"avatar_remote_width\" id=\"avatar_remote_width\" size=\"3\" value=\"";
        // line 8
        echo (isset($context["AVATAR_REMOTE_WIDTH"]) ? $context["AVATAR_REMOTE_WIDTH"] : null);
        echo "\" class=\"inputbox autowidth\" /> ";
        echo $this->env->getExtension('phpbb')->lang("PIXEL");
        echo "</label> &times;&nbsp; 
\t\t<label for=\"avatar_remote_height\"><input type=\"text\" name=\"avatar_remote_height\" id=\"avatar_remote_height\" size=\"3\" value=\"";
        // line 9
        echo (isset($context["AVATAR_REMOTE_HEIGHT"]) ? $context["AVATAR_REMOTE_HEIGHT"] : null);
        echo "\" class=\"inputbox autowidth\" /> ";
        echo $this->env->getExtension('phpbb')->lang("PIXEL");
        echo "</label>
\t</dd>
</dl>
";
    }

    public function getTemplateName()
    {
        return "ucp_avatar_options_remote.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 9,  43 => 8,  35 => 6,  29 => 3,  22 => 2,  19 => 1,);
    }
}

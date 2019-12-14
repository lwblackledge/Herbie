<?php

/* banhammer_body.html */
class __TwigTemplate_5c7ac25dd90fe479d5222b0f390c4ad09f8788e83526e65a79b39c8f6ac09c29 extends Twig_Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "banhammer_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<h1>";
        // line 3
        echo $this->env->getExtension('phpbb')->lang("ACP_BH_SETTINGS");
        echo "</h1>

";
        // line 5
        if ((isset($context["S_SAVED"]) ? $context["S_SAVED"] : null)) {
            // line 6
            echo "\t<div class=\"successbox\">";
            echo $this->env->getExtension('phpbb')->lang("SETTINGS_SAVED");
            echo "</div>
";
        }
        // line 8
        echo "
<form id=\"acp_board\" method=\"post\" action=\"";
        // line 9
        echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
        echo "\">
\t<fieldset>
\t\t<dl>
\t\t\t<dt><label for=\"ban_email\">";
        // line 12
        echo $this->env->getExtension('phpbb')->lang("ACP_BAN_EMAIL");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"1\" ";
        // line 14
        if ((isset($context["BAN_EMAIL"]) ? $context["BAN_EMAIL"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"0\" ";
        // line 15
        if ( !(isset($context["BAN_EMAIL"]) ? $context["BAN_EMAIL"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"ban_ip\">";
        // line 19
        echo $this->env->getExtension('phpbb')->lang("ACP_BAN_IP");
        echo ":</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("ACP_BAN_IP_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"1\" ";
        // line 21
        if ((isset($context["BAN_IP"]) ? $context["BAN_IP"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"0\" ";
        // line 22
        if ( !(isset($context["BAN_IP"]) ? $context["BAN_IP"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_posts\">";
        // line 26
        echo $this->env->getExtension('phpbb')->lang("ACP_DEL_POSTS");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"1\" ";
        // line 28
        if ((isset($context["DEL_POSTS"]) ? $context["DEL_POSTS"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"0\" ";
        // line 29
        if ( !(isset($context["DEL_POSTS"]) ? $context["DEL_POSTS"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_privmsgs\">";
        // line 33
        echo $this->env->getExtension('phpbb')->lang("ACP_DEL_PRIVMSGS");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"1\" ";
        // line 35
        if ((isset($context["DEL_PRIVMSGS"]) ? $context["DEL_PRIVMSGS"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"0\" ";
        // line 36
        if ( !(isset($context["DEL_PRIVMSGS"]) ? $context["DEL_PRIVMSGS"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_avatar\">";
        // line 40
        echo $this->env->getExtension('phpbb')->lang("ACP_DEL_AVATAR");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"1\" ";
        // line 42
        if ((isset($context["DEL_AVATAR"]) ? $context["DEL_AVATAR"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"0\" ";
        // line 43
        if ( !(isset($context["DEL_AVATAR"]) ? $context["DEL_AVATAR"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_signature\">";
        // line 47
        echo $this->env->getExtension('phpbb')->lang("ACP_DEL_SIGNATURE");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"1\" ";
        // line 49
        if ((isset($context["DEL_SIGNATURE"]) ? $context["DEL_SIGNATURE"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"0\" ";
        // line 50
        if ( !(isset($context["DEL_SIGNATURE"]) ? $context["DEL_SIGNATURE"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_profile\">";
        // line 54
        echo $this->env->getExtension('phpbb')->lang("ACP_DEL_PROFILE");
        echo ":</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"1\" ";
        // line 56
        if ((isset($context["DEL_PROFILE"]) ? $context["DEL_PROFILE"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"0\" ";
        // line 57
        if ( !(isset($context["DEL_PROFILE"]) ? $context["DEL_PROFILE"] : null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"move_group\">";
        // line 61
        echo $this->env->getExtension('phpbb')->lang("ACP_MOVE_GROUP");
        echo ":</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("ACP_MOVE_GROUP_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><select id=\"move_group\" name=\"move_group\">";
        // line 62
        echo (isset($context["MOVE_GROUP"]) ? $context["MOVE_GROUP"] : null);
        echo "</select></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"sfs_api_key\">";
        // line 65
        echo $this->env->getExtension('phpbb')->lang("SFS_API_KEY");
        echo ":</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("SFS_API_KEY_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t";
        // line 67
        if ( !(isset($context["SFS_CURL"]) ? $context["SFS_CURL"] : null)) {
            // line 68
            echo "\t\t\t\t\t";
            echo $this->env->getExtension('phpbb')->lang("SFS_NEEDS_CURL");
            echo "
\t\t\t\t";
        } else {
            // line 70
            echo "\t\t\t\t\t<input type=\"text\" class=\"input small\" name=\"sfs_api_key\" id=\"sfs_api_key\" value=\"";
            echo (isset($context["SFS_API_KEY"]) ? $context["SFS_API_KEY"] : null);
            echo "\" />
\t\t\t\t";
        }
        // line 72
        echo "\t\t\t</dd>
\t\t</dl>

\t\t<p class=\"submit-buttons\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 76
        echo $this->env->getExtension('phpbb')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
        // line 77
        echo $this->env->getExtension('phpbb')->lang("RESET");
        echo "\" />
\t\t</p>

\t\t";
        // line 80
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
\t</fieldset>
</form>

";
        // line 84
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "banhammer_body.html", 84)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "banhammer_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 84,  275 => 80,  269 => 77,  265 => 76,  259 => 72,  253 => 70,  247 => 68,  245 => 67,  238 => 65,  232 => 62,  226 => 61,  215 => 57,  207 => 56,  202 => 54,  191 => 50,  183 => 49,  178 => 47,  167 => 43,  159 => 42,  154 => 40,  143 => 36,  135 => 35,  130 => 33,  119 => 29,  111 => 28,  106 => 26,  95 => 22,  87 => 21,  80 => 19,  69 => 15,  61 => 14,  56 => 12,  50 => 9,  47 => 8,  41 => 6,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }
}

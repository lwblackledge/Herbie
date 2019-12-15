<?php

/* @phpbbmodders_banhammer/event/memberlist_view_content_prepend.html */
class __TwigTemplate_7394b34b7c0bb81f998f5544490c5d2914abe8ef43d6a3f79847c4c8c57cfd0b extends Twig_Template
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
        if ((isset($context["BH_MESSAGE"]) ? $context["BH_MESSAGE"] : null)) {
            // line 2
            echo "<div class=\"panel bg2\" style=\"background-color: ";
            echo (isset($context["BH_STYLE"]) ? $context["BH_STYLE"] : null);
            echo ";\">
\t<div class=\"inner bh\">
\t\t<span>";
            // line 4
            echo (isset($context["BH_MESSAGE"]) ? $context["BH_MESSAGE"] : null);
            echo "</span>
\t</div>
</div>

";
        } elseif (        // line 8
(isset($context["S_SHOW_BH"]) ? $context["S_SHOW_BH"] : null)) {
            // line 9
            echo "<div class=\"panel bg2\">
\t<p class=\"bh bh-click\">";
            // line 10
            echo $this->env->getExtension('phpbb')->lang("BH_THIS_USER");
            echo "</p>
\t<div class=\"inner\" id=\"bh-options\" style=\"display: none;\">
\t\t<form id=\"bh-form\" method=\"post\" action=\"";
            // line 12
            echo (isset($context["U_HAMMERBAN"]) ? $context["U_HAMMERBAN"] : null);
            echo "\">
\t\t\t<fieldset>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 15
            echo $this->env->getExtension('phpbb')->lang("BH_BAN_EMAIL");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"1\" ";
            // line 17
            if ((isset($context["BH_BAN_EMAIL"]) ? $context["BH_BAN_EMAIL"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"0\" ";
            // line 18
            if ( !(isset($context["BH_BAN_EMAIL"]) ? $context["BH_BAN_EMAIL"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 22
            echo $this->env->getExtension('phpbb')->lang("BH_BAN_IP");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label><br /><span>";
            echo $this->env->getExtension('phpbb')->lang("BH_BAN_IP_EXPLAIN");
            echo "</span></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"1\" ";
            // line 24
            if ((isset($context["BH_BAN_IP"]) ? $context["BH_BAN_IP"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"0\" ";
            // line 25
            if ( !(isset($context["BH_BAN_IP"]) ? $context["BH_BAN_IP"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 29
            echo $this->env->getExtension('phpbb')->lang("BH_DEL_POSTS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"1\" ";
            // line 31
            if ((isset($context["BH_DEL_POSTS"]) ? $context["BH_DEL_POSTS"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"0\" ";
            // line 32
            if ( !(isset($context["BH_DEL_POSTS"]) ? $context["BH_DEL_POSTS"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 36
            echo $this->env->getExtension('phpbb')->lang("BH_DEL_PRIVMSGS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"1\" ";
            // line 38
            if ((isset($context["BH_DEL_PRIVMSGS"]) ? $context["BH_DEL_PRIVMSGS"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"0\" ";
            // line 39
            if ( !(isset($context["BH_DEL_PRIVMSGS"]) ? $context["BH_DEL_PRIVMSGS"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 43
            echo $this->env->getExtension('phpbb')->lang("BH_DEL_AVATAR");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"1\" ";
            // line 45
            if ((isset($context["BH_DEL_AVATAR"]) ? $context["BH_DEL_AVATAR"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"0\" ";
            // line 46
            if ( !(isset($context["BH_DEL_AVATAR"]) ? $context["BH_DEL_AVATAR"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 50
            echo $this->env->getExtension('phpbb')->lang("BH_DEL_SIGNATURE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"1\" ";
            // line 52
            if ((isset($context["BH_DEL_SIGNATURE"]) ? $context["BH_DEL_SIGNATURE"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"0\" ";
            // line 53
            if ( !(isset($context["BH_DEL_SIGNATURE"]) ? $context["BH_DEL_SIGNATURE"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 57
            echo $this->env->getExtension('phpbb')->lang("BH_DEL_PROFILE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"1\" ";
            // line 59
            if ((isset($context["BH_DEL_PROFILE"]) ? $context["BH_DEL_PROFILE"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"0\" ";
            // line 60
            if ( !(isset($context["BH_DEL_PROFILE"]) ? $context["BH_DEL_PROFILE"] : null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            // line 63
            if ((isset($context["L_BH_MOVE_GROUP"]) ? $context["L_BH_MOVE_GROUP"] : null)) {
                // line 64
                echo "\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
                // line 65
                echo $this->env->getExtension('phpbb')->lang("BH_MOVE_GROUP");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"move_group\" value=\"1\" checked=\"checked\" /> ";
                // line 67
                echo $this->env->getExtension('phpbb')->lang("YES");
                echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"move_group\" value=\"0\" /> ";
                // line 68
                echo $this->env->getExtension('phpbb')->lang("NO");
                echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            }
            // line 72
            echo "\t\t\t\t";
            if ((isset($context["S_BH_SFS"]) ? $context["S_BH_SFS"] : null)) {
                // line 73
                echo "\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
                // line 74
                echo $this->env->getExtension('phpbb')->lang("SFS_REPORT");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"sfs_report\" value=\"1\" checked=\"checked\" /> ";
                // line 76
                echo $this->env->getExtension('phpbb')->lang("YES");
                echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"sfs_report\" value=\"0\" /> ";
                // line 77
                echo $this->env->getExtension('phpbb')->lang("NO");
                echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            }
            // line 81
            echo "\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
            // line 82
            echo $this->env->getExtension('phpbb')->lang("BH_BAN_REASON");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd><input name=\"bh_reason\" type=\"text\" class=\"text medium\" maxlength=\"255\" /></dd>
\t\t\t\t</dl>
\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
            // line 86
            echo $this->env->getExtension('phpbb')->lang("BH_BAN_GIVE_REASON");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd><input name=\"bh_reason_user\" type=\"text\" class=\"text medium\" maxlength=\"255\" /></dd>
\t\t\t\t</dl>
\t\t\t</fieldset>
\t\t\t<fieldset class=\"submit-buttons\">
\t\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
            // line 91
            echo $this->env->getExtension('phpbb')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 92
            echo $this->env->getExtension('phpbb')->lang("RESET");
            echo "\" />
\t\t\t</fieldset>
\t\t</form>
\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@phpbbmodders_banhammer/event/memberlist_view_content_prepend.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 92,  291 => 91,  282 => 86,  274 => 82,  271 => 81,  264 => 77,  260 => 76,  254 => 74,  251 => 73,  248 => 72,  241 => 68,  237 => 67,  231 => 65,  228 => 64,  226 => 63,  216 => 60,  208 => 59,  202 => 57,  191 => 53,  183 => 52,  177 => 50,  166 => 46,  158 => 45,  152 => 43,  141 => 39,  133 => 38,  127 => 36,  116 => 32,  108 => 31,  102 => 29,  91 => 25,  83 => 24,  75 => 22,  64 => 18,  56 => 17,  50 => 15,  44 => 12,  39 => 10,  36 => 9,  34 => 8,  27 => 4,  21 => 2,  19 => 1,);
    }
}

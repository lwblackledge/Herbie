<?php

/* acp_users_signature.html */
class __TwigTemplate_900468d75d287bacbcad786e4de50e5292207bedf99932b566b99c493b4fa5e3 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
// <![CDATA[

\tvar form_name = 'user_signature';
\tvar text_name = 'signature';
\tvar load_draft = false;
\tvar upload = false;
\tvar imageTag = false;

// ]]>
</script>

<form id=\"user_signature\" method=\"post\" action=\"";
        // line 13
        echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
        echo "\">

\t";
        // line 15
        if ((isset($context["SIGNATURE_PREVIEW"]) ? $context["SIGNATURE_PREVIEW"] : null)) {
            // line 16
            echo "\t\t<fieldset>
\t\t\t<legend>";
            // line 17
            echo $this->env->getExtension('phpbb')->lang("ADMIN_SIG_PREVIEW");
            echo "</legend>
\t\t\t<p>";
            // line 18
            echo (isset($context["SIGNATURE_PREVIEW"]) ? $context["SIGNATURE_PREVIEW"] : null);
            echo "</p>
\t\t</fieldset>
\t";
        }
        // line 21
        echo "
\t<fieldset>
\t\t<legend>";
        // line 23
        echo $this->env->getExtension('phpbb')->lang("SIGNATURE");
        echo "</legend>
\t\t<p>";
        // line 24
        echo $this->env->getExtension('phpbb')->lang("SIGNATURE_EXPLAIN");
        echo "</p>

\t\t";
        // line 26
        $location = "acp_posting_buttons.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("acp_posting_buttons.html", "acp_users_signature.html", 26)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 27
        echo "
\t\t<dl class=\"responsive-columns\">
\t\t\t<dt style=\"width: 90px;\" id=\"color_palette_placeholder\" data-orientation=\"v\" data-height=\"12\" data-width=\"15\" data-bbcode=\"true\">
\t\t\t</dt>
\t\t\t<dd style=\"margin-";
        // line 31
        echo (isset($context["S_CONTENT_FLOW_BEGIN"]) ? $context["S_CONTENT_FLOW_BEGIN"] : null);
        echo ": 90px;\"><textarea name=\"signature\" rows=\"10\" cols=\"60\" style=\"width: 95%;\" onselect=\"storeCaret(this);\" onclick=\"storeCaret(this);\" onkeyup=\"storeCaret(this);\" onfocus=\"initInsertions();\" data-bbcode=\"true\">";
        echo (isset($context["SIGNATURE"]) ? $context["SIGNATURE"] : null);
        echo "</textarea></dd>
\t\t\t<dd style=\"margin-";
        // line 32
        echo (isset($context["S_CONTENT_FLOW_BEGIN"]) ? $context["S_CONTENT_FLOW_BEGIN"] : null);
        echo ": 90px; margin-top: 5px;\">
\t\t\t";
        // line 33
        if ((isset($context["S_BBCODE_ALLOWED"]) ? $context["S_BBCODE_ALLOWED"] : null)) {
            // line 34
            echo "\t\t\t\t<label><input type=\"checkbox\" class=\"radio\" name=\"disable_bbcode\"";
            echo (isset($context["S_BBCODE_CHECKED"]) ? $context["S_BBCODE_CHECKED"] : null);
            echo " /> ";
            echo $this->env->getExtension('phpbb')->lang("DISABLE_BBCODE");
            echo "</label>
\t\t\t";
        }
        // line 36
        echo "\t\t\t";
        if ((isset($context["S_SMILIES_ALLOWED"]) ? $context["S_SMILIES_ALLOWED"] : null)) {
            // line 37
            echo "\t\t\t\t<label><input type=\"checkbox\" class=\"radio\" name=\"disable_smilies\"";
            echo (isset($context["S_SMILIES_CHECKED"]) ? $context["S_SMILIES_CHECKED"] : null);
            echo " /> ";
            echo $this->env->getExtension('phpbb')->lang("DISABLE_SMILIES");
            echo "</label>
\t\t\t";
        }
        // line 39
        echo "\t\t\t";
        if ((isset($context["S_LINKS_ALLOWED"]) ? $context["S_LINKS_ALLOWED"] : null)) {
            // line 40
            echo "\t\t\t\t<label><input type=\"checkbox\" class=\"radio\" name=\"disable_magic_url\"";
            echo (isset($context["S_MAGIC_URL_CHECKED"]) ? $context["S_MAGIC_URL_CHECKED"] : null);
            echo " /> ";
            echo $this->env->getExtension('phpbb')->lang("DISABLE_MAGIC_URL");
            echo "</label>
\t\t\t";
        }
        // line 42
        echo "\t\t\t</dd>
\t\t\t<dd style=\"margin-";
        // line 43
        echo (isset($context["S_CONTENT_FLOW_BEGIN"]) ? $context["S_CONTENT_FLOW_BEGIN"] : null);
        echo ": 90px; margin-top: 10px;\"><strong>";
        echo $this->env->getExtension('phpbb')->lang("OPTIONS");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo " </strong>";
        echo (isset($context["BBCODE_STATUS"]) ? $context["BBCODE_STATUS"] : null);
        echo " :: ";
        echo (isset($context["IMG_STATUS"]) ? $context["IMG_STATUS"] : null);
        echo " :: ";
        echo (isset($context["FLASH_STATUS"]) ? $context["FLASH_STATUS"] : null);
        echo " :: ";
        echo (isset($context["URL_STATUS"]) ? $context["URL_STATUS"] : null);
        echo " :: ";
        echo (isset($context["SMILIES_STATUS"]) ? $context["SMILIES_STATUS"] : null);
        echo "</dd>
\t\t</dl>
\t</fieldset>

\t<fieldset class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
        // line 48
        echo $this->env->getExtension('phpbb')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"submit\" name=\"preview\" value=\"";
        // line 49
        echo $this->env->getExtension('phpbb')->lang("PREVIEW");
        echo "\" />
\t\t";
        // line 50
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
\t</fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "acp_users_signature.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 50,  154 => 49,  150 => 48,  129 => 43,  126 => 42,  118 => 40,  115 => 39,  107 => 37,  104 => 36,  96 => 34,  94 => 33,  90 => 32,  84 => 31,  78 => 27,  66 => 26,  61 => 24,  57 => 23,  53 => 21,  47 => 18,  43 => 17,  40 => 16,  38 => 15,  33 => 13,  19 => 1,);
    }
}

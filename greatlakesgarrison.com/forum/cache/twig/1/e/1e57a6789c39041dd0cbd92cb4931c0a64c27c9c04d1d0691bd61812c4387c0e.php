<?php

/* acp_words.html */
class __TwigTemplate_1e57a6789c39041dd0cbd92cb4931c0a64c27c9c04d1d0691bd61812c4387c0e extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "acp_words.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if ((isset($context["S_EDIT_WORD"]) ? $context["S_EDIT_WORD"] : null)) {
            // line 6
            echo "
\t<a href=\"";
            // line 7
            echo (isset($context["U_BACK"]) ? $context["U_BACK"] : null);
            echo "\" style=\"float: ";
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb')->lang("BACK");
            echo "</a>

\t<h1>";
            // line 9
            echo $this->env->getExtension('phpbb')->lang("ACP_WORDS");
            echo "</h1>

\t<p>";
            // line 11
            echo $this->env->getExtension('phpbb')->lang("ACP_WORDS_EXPLAIN");
            echo "</p>

\t<form id=\"acp_words\" method=\"post\" action=\"";
            // line 13
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 16
            echo $this->env->getExtension('phpbb')->lang("EDIT_WORD");
            echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"word\">";
            // line 18
            echo $this->env->getExtension('phpbb')->lang("WORD");
            echo "</label></dt>
\t\t\t<dd><input id=\"word\" type=\"text\" name=\"word\" value=\"";
            // line 19
            echo (isset($context["WORD"]) ? $context["WORD"] : null);
            echo "\" maxlength=\"255\" /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"replacement\">";
            // line 22
            echo $this->env->getExtension('phpbb')->lang("REPLACEMENT");
            echo "</label></dt>
\t\t\t<dd><input id=\"replacement\" type=\"text\" name=\"replacement\" value=\"";
            // line 23
            echo (isset($context["REPLACEMENT"]) ? $context["REPLACEMENT"] : null);
            echo "\" maxlength=\"255\" /></dd>
\t\t</dl>
\t\t";
            // line 25
            echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
            echo "

\t<p class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"save\" value=\"";
            // line 28
            echo $this->env->getExtension('phpbb')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 29
            echo $this->env->getExtension('phpbb')->lang("RESET");
            echo "\" />
\t\t";
            // line 30
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</p>
\t</fieldset>
\t</form>

";
        } else {
            // line 36
            echo "
\t<h1>";
            // line 37
            echo $this->env->getExtension('phpbb')->lang("ACP_WORDS");
            echo "</h1>

\t<p>";
            // line 39
            echo $this->env->getExtension('phpbb')->lang("ACP_WORDS_EXPLAIN");
            echo "</p>

\t<form id=\"acp_words\" method=\"post\" action=\"";
            // line 41
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset class=\"tabulated\">
\t<legend>";
            // line 44
            echo $this->env->getExtension('phpbb')->lang("ACP_WORDS");
            echo "</legend>
\t<p class=\"quick\">
\t\t";
            // line 46
            echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
            echo "
\t\t<input class=\"button2\" name=\"add\" type=\"submit\" value=\"";
            // line 47
            echo $this->env->getExtension('phpbb')->lang("ADD_WORD");
            echo "\" />
\t</p>

\t<table class=\"table1 zebra-table\">
\t<thead>
\t<tr>
\t\t<th>";
            // line 53
            echo $this->env->getExtension('phpbb')->lang("WORD");
            echo "</th>
\t\t<th>";
            // line 54
            echo $this->env->getExtension('phpbb')->lang("REPLACEMENT");
            echo "</th>
\t\t<th>";
            // line 55
            echo $this->env->getExtension('phpbb')->lang("ACTION");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "words", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["words"]) {
                // line 60
                echo "\t<tr>
\t\t<td style=\"text-align: center;\">";
                // line 61
                echo $this->getAttribute($context["words"], "WORD", array());
                echo "</td>
\t\t<td style=\"text-align: center;\">";
                // line 62
                echo $this->getAttribute($context["words"], "REPLACEMENT", array());
                echo "</td>
\t\t<td>&nbsp;<a href=\"";
                // line 63
                echo $this->getAttribute($context["words"], "U_EDIT", array());
                echo "\">";
                echo (isset($context["ICON_EDIT"]) ? $context["ICON_EDIT"] : null);
                echo "</a>&nbsp;&nbsp;<a href=\"";
                echo $this->getAttribute($context["words"], "U_DELETE", array());
                echo "\" data-ajax=\"row_delete\">";
                echo (isset($context["ICON_DELETE"]) ? $context["ICON_DELETE"] : null);
                echo "</a>&nbsp;</td>
\t</tr>
\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 66
                echo "\t<tr class=\"row3\">
\t\t<td colspan=\"3\">";
                // line 67
                echo $this->env->getExtension('phpbb')->lang("ACP_NO_ITEMS");
                echo "</td>
\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['words'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "\t</tbody>
\t</table>
\t";
            // line 72
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>
";
        }
        // line 76
        echo "
";
        // line 77
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_words.html", 77)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_words.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 77,  218 => 76,  211 => 72,  207 => 70,  198 => 67,  195 => 66,  181 => 63,  177 => 62,  173 => 61,  170 => 60,  165 => 59,  158 => 55,  154 => 54,  150 => 53,  141 => 47,  137 => 46,  132 => 44,  126 => 41,  121 => 39,  116 => 37,  113 => 36,  104 => 30,  100 => 29,  96 => 28,  90 => 25,  85 => 23,  81 => 22,  75 => 19,  71 => 18,  66 => 16,  60 => 13,  55 => 11,  50 => 9,  41 => 7,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }
}

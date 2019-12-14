<?php

/* mcp_warn_front.html */
class __TwigTemplate_0eed6faa2f4b60a3de7ed870c08b3c94974889cdca0adb776bd34897ba8e0f42 extends Twig_Template
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
        $location = "mcp_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_header.html", "mcp_warn_front.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form method=\"post\" id=\"mcp\" action=\"";
        // line 3
        echo (isset($context["U_POST_ACTION"]) ? $context["U_POST_ACTION"] : null);
        echo "\">

<h2>";
        // line 5
        echo $this->env->getExtension('phpbb')->lang("WARN_USER");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 10
        echo $this->env->getExtension('phpbb')->lang("SELECT_USER");
        echo "</h3>

\t<fieldset>
\t<dl>
\t\t<dt><label for=\"username\">";
        // line 14
        echo $this->env->getExtension('phpbb')->lang("SELECT_USER");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label></dt>
\t\t<dd><input name=\"username\" id=\"username\" type=\"text\" class=\"inputbox\" /></dd>
\t\t<dd><strong><a href=\"";
        // line 16
        echo (isset($context["U_FIND_USERNAME"]) ? $context["U_FIND_USERNAME"] : null);
        echo "\" onclick=\"find_username(this.href); return false;\">";
        echo $this->env->getExtension('phpbb')->lang("FIND_USERNAME");
        echo "</a></strong></dd>
\t</dl>
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t<input type=\"reset\" value=\"";
        // line 24
        echo $this->env->getExtension('phpbb')->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp; 
\t<input type=\"submit\" name=\"submituser\" value=\"";
        // line 25
        echo $this->env->getExtension('phpbb')->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 26
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
</fieldset>
</form>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 33
        echo $this->env->getExtension('phpbb')->lang("MOST_WARNINGS");
        echo "</h3>

\t";
        // line 35
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "highest", array()))) {
            // line 36
            echo "\t\t<table class=\"table1\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th class=\"name\">";
            // line 39
            echo $this->env->getExtension('phpbb')->lang("USERNAME");
            echo "</th>
\t\t\t\t<th class=\"name\">";
            // line 40
            echo $this->env->getExtension('phpbb')->lang("WARNINGS");
            echo "</th>
\t\t\t\t<th class=\"name\">";
            // line 41
            echo $this->env->getExtension('phpbb')->lang("LATEST_WARNING_TIME");
            echo "</th>
\t\t\t\t<th></th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>

\t\t";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "highest", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["highest"]) {
                // line 48
                echo "\t\t\t<tr class=\"";
                if (($this->getAttribute($context["highest"], "S_ROW_COUNT", array()) % 2 == 0)) {
                    echo "bg1";
                } else {
                    echo "bg2";
                }
                echo "\">
\t\t\t\t<td>";
                // line 49
                echo $this->getAttribute($context["highest"], "USERNAME_FULL", array());
                echo "</td>
\t\t\t\t<td>";
                // line 50
                echo $this->getAttribute($context["highest"], "WARNINGS", array());
                echo "</td>
\t\t\t\t<td>";
                // line 51
                echo $this->getAttribute($context["highest"], "WARNING_TIME", array());
                echo "</td>
\t\t\t\t<td><a href=\"";
                // line 52
                echo $this->getAttribute($context["highest"], "U_NOTES", array());
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("VIEW_NOTES");
                echo "</a></td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['highest'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "\t\t</tbody>
\t\t</table>
\t";
        } else {
            // line 58
            echo "\t\t<p><strong>";
            echo $this->env->getExtension('phpbb')->lang("NO_WARNINGS");
            echo "</strong></p>
\t";
        }
        // line 60
        echo "
\t</div>
</div>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 67
        echo $this->env->getExtension('phpbb')->lang("LATEST_WARNINGS");
        echo "</h3>

\t";
        // line 69
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "latest", array()))) {
            // line 70
            echo "\t\t<table class=\"table1\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th class=\"name\">";
            // line 73
            echo $this->env->getExtension('phpbb')->lang("USERNAME");
            echo "</th>
\t\t\t\t<th class=\"name\">";
            // line 74
            echo $this->env->getExtension('phpbb')->lang("TIME");
            echo "</th>
\t\t\t\t<th class=\"name\">";
            // line 75
            echo $this->env->getExtension('phpbb')->lang("TOTAL_WARNINGS");
            echo "</th>
\t\t\t\t<th></th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
            // line 80
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "latest", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["latest"]) {
                // line 81
                echo "\t\t\t<tr class=\"";
                if (($this->getAttribute($context["latest"], "S_ROW_COUNT", array()) % 2 == 0)) {
                    echo "bg1";
                } else {
                    echo "bg2";
                }
                echo "\">
\t\t\t\t<td>";
                // line 82
                echo $this->getAttribute($context["latest"], "USERNAME_FULL", array());
                echo "</td>
\t\t\t\t<td>";
                // line 83
                echo $this->getAttribute($context["latest"], "WARNING_TIME", array());
                echo "</td>
\t\t\t\t<td>";
                // line 84
                echo $this->getAttribute($context["latest"], "WARNINGS", array());
                echo "</td>
\t\t\t\t<td><a href=\"";
                // line 85
                echo $this->getAttribute($context["latest"], "U_NOTES", array());
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("VIEW_NOTES");
                echo "</a></td>
\t\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latest'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "\t\t</tbody>
\t\t</table>
\t";
        } else {
            // line 91
            echo "\t\t<p><strong>";
            echo $this->env->getExtension('phpbb')->lang("NO_WARNINGS");
            echo "</strong></p>
\t";
        }
        // line 93
        echo "
\t</div>
</div>

";
        // line 97
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_warn_front.html", 97)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_warn_front.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 97,  251 => 93,  245 => 91,  240 => 88,  229 => 85,  225 => 84,  221 => 83,  217 => 82,  208 => 81,  204 => 80,  196 => 75,  192 => 74,  188 => 73,  183 => 70,  181 => 69,  176 => 67,  167 => 60,  161 => 58,  156 => 55,  145 => 52,  141 => 51,  137 => 50,  133 => 49,  124 => 48,  120 => 47,  111 => 41,  107 => 40,  103 => 39,  98 => 36,  96 => 35,  91 => 33,  81 => 26,  77 => 25,  73 => 24,  60 => 16,  54 => 14,  47 => 10,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }
}

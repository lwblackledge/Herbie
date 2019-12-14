<?php

/* profilefields/text.html */
class __TwigTemplate_8f82c7a45ce4f4224bdf7f36d2591e9474435e55184e9e75ad7802ad70d4615e extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "text", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["text"]) {
            // line 2
            echo "<textarea name=\"";
            echo $this->getAttribute($context["text"], "FIELD_IDENT", array());
            echo "\" id=\"";
            echo $this->getAttribute($context["text"], "FIELD_IDENT", array());
            echo "\" rows=\"";
            echo $this->getAttribute($context["text"], "FIELD_ROWS", array());
            echo "\" cols=\"";
            echo $this->getAttribute($context["text"], "FIELD_COLS", array());
            echo "\">";
            echo $this->getAttribute($context["text"], "FIELD_VALUE", array());
            echo "</textarea>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "profilefields/text.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 2,  19 => 1,);
    }
}

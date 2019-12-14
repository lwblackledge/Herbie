<?php

/* posting_smilies.html */
class __TwigTemplate_1fa1e2596dca490d202cc86ac8e83ed632bfec3bd766136890e4b45ef322934d extends Twig_Template
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
        $location = "simple_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("simple_header.html", "posting_smilies.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<script type=\"text/javascript\">
// <![CDATA[
\tvar form_name = opener.form_name;
\tvar text_name = opener.text_name;
// ]]>
</script>
";
        // line 9
        $asset_file = (("" . (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null)) . "/javascript/editor.js");
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('12');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 10
        echo "
<h2>";
        // line 11
        echo $this->env->getExtension('phpbb')->lang("SMILIES");
        echo "</h2>
<div class=\"panel\">
\t<div class=\"inner\">
\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "smiley", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["smiley"]) {
            echo " 
\t\t\t<a href=\"#\" onclick=\"initInsertions(); insert_text('";
            // line 15
            echo $this->getAttribute($context["smiley"], "A_SMILEY_CODE", array());
            echo "', true, true); return false;\"><img src=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_IMG", array());
            echo "\" width=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_WIDTH", array());
            echo "\" height=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_HEIGHT", array());
            echo "\" alt=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_CODE", array());
            echo "\" title=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_DESC", array());
            echo "\" /></a> 
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['smiley'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t
\t</div>
</div>
";
        // line 20
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", array()))) {
            echo " 
\t<div class=\"pagination\">
\t\t";
            // line 22
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "posting_smilies.html", 22)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 23
            echo "\t</div>
";
        }
        // line 25
        echo "<a href=\"#\" onclick=\"window.close(); return false;\">";
        echo $this->env->getExtension('phpbb')->lang("CLOSE_WINDOW");
        echo "</a>

";
        // line 27
        $location = "simple_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("simple_footer.html", "posting_smilies.html", 27)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "posting_smilies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 27,  114 => 25,  110 => 23,  98 => 22,  93 => 20,  88 => 17,  70 => 15,  64 => 14,  58 => 11,  55 => 10,  40 => 9,  31 => 2,  19 => 1,);
    }
}

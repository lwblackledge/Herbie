<?php

/* @derky_sortablescaptcha/captcha_sortables.html */
class __TwigTemplate_7db9f0df6fd62cd55e66a2ec1b5c62428daa4b092a0a18332be3a17f9a4a6c68 extends Twig_Template
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
        if ( !$this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "INCLUDED_JQUERYUIJS", array())) {
            // line 2
            echo "\t";
            $asset_file = "@derky_sortablescaptcha/js/jquery-ui-1.11.1.custom.min.js";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                $asset->add_assets_version('11');
                $asset_file = $asset->get_url();
                }
            }
            $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
            // line 3
            echo "\t";
            $value = true;
            $context['definition']->set('INCLUDED_JQUERYUIJS', $value);
        }
        // line 5
        if ( !$this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "INCLUDED_JQUERYUITOUCHPUNCHJS", array())) {
            // line 6
            echo "\t";
            $asset_file = "@derky_sortablescaptcha/js/jquery-ui-touch-punch.min.js";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                $asset->add_assets_version('11');
                $asset_file = $asset->get_url();
                }
            }
            $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
            // line 7
            echo "\t";
            $value = true;
            $context['definition']->set('INCLUDED_JQUERYUITOUCHPUNCHJS', $value);
        }
        // line 9
        $asset_file = "@derky_sortablescaptcha/js/sortablescaptcha.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('11');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 10
        $value = true;
        $context['definition']->set('INCLUDEDED_JQUERY_SORTABLES_CAPTCHA', $value);
        // line 11
        echo "
";
        // line 12
        if (((isset($context["S_TYPE"]) ? $context["S_TYPE"] : null) == 1)) {
            // line 13
            echo "<div class=\"panel\">
\t<div class=\"inner\"><span class=\"corners-top\"><span></span></span>

\t<h3>";
            // line 16
            echo $this->env->getExtension('phpbb')->lang("CONFIRMATION");
            echo "</h3>
\t<fieldset class=\"fields2\">
";
        }
        // line 19
        echo "
\t<!-- Very simple version for javascript off with no dragging support -->
\t<noscript>
\t<dl>
\t\t<dt><label>";
        // line 23
        echo (isset($context["SORTABLES_CONFIRM_QUESTION"]) ? $context["SORTABLES_CONFIRM_QUESTION"] : null);
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_QUESTION_EXPLAIN_NOJS");
        echo "</span></dt>
\t\t<dd>
\t\t\t<div class=\"sortables_nojs\">
\t\t\t\t<div class=\"sortables_nojs_row\">
\t\t\t\t\t<strong class=\"sortables_nojs_left\">";
        // line 27
        if (((isset($context["SORTABLES_NAME_LEFT"]) ? $context["SORTABLES_NAME_LEFT"] : null) != "")) {
            echo (isset($context["SORTABLES_NAME_LEFT"]) ? $context["SORTABLES_NAME_LEFT"] : null);
        } else {
            echo $this->env->getExtension('phpbb')->lang("COLUMN_LEFT");
        }
        echo "</strong>
\t\t\t\t\t<strong class=\"sortables_nojs_right\">";
        // line 28
        if (((isset($context["SORTABLES_NAME_RIGHT"]) ? $context["SORTABLES_NAME_RIGHT"] : null) != "")) {
            echo (isset($context["SORTABLES_NAME_RIGHT"]) ? $context["SORTABLES_NAME_RIGHT"] : null);
        } else {
            echo $this->env->getExtension('phpbb')->lang("COLUMN_RIGHT");
        }
        echo "</strong>
\t\t\t\t</div>
\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "options", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["options"]) {
            // line 31
            echo "\t\t\t\t<div class=\"sortables_nojs_row\">
\t\t\t\t\t<input class=\"sortables_nojs_left\" type=\"checkbox\" name=\"sortables_options_left[]\" value=\"";
            // line 32
            echo $this->getAttribute($context["options"], "ID", array());
            echo "\" />
\t\t\t\t\t<input class=\"sortables_nojs_right\" type=\"checkbox\" name=\"sortables_options_right[]\" value=\"";
            // line 33
            echo $this->getAttribute($context["options"], "ID", array());
            echo "\" />
\t\t\t\t\t<div>";
            // line 34
            echo $this->getAttribute($context["options"], "TEXT", array());
            echo "</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['options'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "\t\t\t</div>
\t\t</dd>
\t</dl>
\t</noscript>

\t<!-- The normal version -->
\t<dl id=\"enable_js\" style=\"display:none;\">
\t\t<dt><label>";
        // line 44
        echo (isset($context["SORTABLES_CONFIRM_QUESTION"]) ? $context["SORTABLES_CONFIRM_QUESTION"] : null);
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb')->lang("CONFIRM_QUESTION_EXPLAIN");
        echo "</span></dt>
\t\t<dd>

\t\t\t<div class=\"attachbox sortables_captcha_box\">
\t\t\t\t<strong>";
        // line 48
        if (((isset($context["SORTABLES_NAME_LEFT"]) ? $context["SORTABLES_NAME_LEFT"] : null) != "")) {
            echo (isset($context["SORTABLES_NAME_LEFT"]) ? $context["SORTABLES_NAME_LEFT"] : null);
        } else {
            echo $this->env->getExtension('phpbb')->lang("COLUMN_LEFT");
        }
        echo "</strong><hr />
\t\t\t\t<ul id=\"sortable1\" class=\"sortables_captcha_list\">
\t\t\t\t";
        // line 50
        if (((isset($context["SORTABLES_DEFAULT_SORT"]) ? $context["SORTABLES_DEFAULT_SORT"] : null) == "LEFT")) {
            // line 51
            echo "\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "options", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["options"]) {
                // line 52
                echo "\t\t\t\t\t<li class=\"bg2\" id=\"answer_";
                echo $this->getAttribute($context["options"], "ID", array());
                echo "\">";
                echo $this->getAttribute($context["options"], "TEXT", array());
                echo "</li>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['options'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"attachbox sortables_captcha_box\">
\t\t\t\t<strong>";
        // line 59
        if (((isset($context["SORTABLES_NAME_RIGHT"]) ? $context["SORTABLES_NAME_RIGHT"] : null) != "")) {
            echo (isset($context["SORTABLES_NAME_RIGHT"]) ? $context["SORTABLES_NAME_RIGHT"] : null);
        } else {
            echo $this->env->getExtension('phpbb')->lang("COLUMN_RIGHT");
        }
        echo "</strong><hr />
\t\t\t\t<ul id=\"sortable2\" class=\"sortables_captcha_list\">
\t\t\t\t";
        // line 61
        if (((isset($context["SORTABLES_DEFAULT_SORT"]) ? $context["SORTABLES_DEFAULT_SORT"] : null) == "RIGHT")) {
            // line 62
            echo "\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "options", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["options"]) {
                // line 63
                echo "\t\t\t\t\t<li class=\"bg2\" id=\"answer_";
                echo $this->getAttribute($context["options"], "ID", array());
                echo "\">";
                echo $this->getAttribute($context["options"], "TEXT", array());
                echo "</li>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['options'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "\t\t\t\t";
        }
        // line 66
        echo "\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<input type=\"hidden\" name=\"sortables_confirm_id\" id=\"confirm_id\" value=\"";
        // line 69
        echo (isset($context["SORTABLES_CONFIRM_ID"]) ? $context["SORTABLES_CONFIRM_ID"] : null);
        echo "\" />
\t\t\t<div id=\"sortables_options_left\"></div>
\t\t\t<div id=\"sortables_options_right\"></div>
\t\t</dd>
\t</dl>

";
        // line 75
        if (((isset($context["S_TYPE"]) ? $context["S_TYPE"] : null) == 1)) {
            // line 76
            echo "\t</fieldset>
\t<span class=\"corners-bottom\"><span></span></span></div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@derky_sortablescaptcha/captcha_sortables.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 76,  253 => 75,  244 => 69,  239 => 66,  236 => 65,  225 => 63,  220 => 62,  218 => 61,  209 => 59,  203 => 55,  200 => 54,  189 => 52,  184 => 51,  182 => 50,  173 => 48,  164 => 44,  155 => 37,  146 => 34,  142 => 33,  138 => 32,  135 => 31,  131 => 30,  122 => 28,  114 => 27,  105 => 23,  99 => 19,  93 => 16,  88 => 13,  86 => 12,  83 => 11,  80 => 10,  65 => 9,  60 => 7,  44 => 6,  42 => 5,  37 => 3,  21 => 2,  19 => 1,);
    }
}

<?php

/* @phpbbmodders_banhammer/event/overall_header_head_append.html */
class __TwigTemplate_8fb6986cd2061988f5f47d9d24a004c9f5d88999c7fa31968c881564195ffe26 extends Twig_Template
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
        if ((((isset($context["S_SHOW_BH"]) ? $context["S_SHOW_BH"] : null) || (isset($context["BH_MESSAGE"]) ? $context["BH_MESSAGE"] : null)) || (isset($context["S_IS_BANNED"]) ? $context["S_IS_BANNED"] : null))) {
            // line 2
            echo "\t";
            $asset_file = "@phpbbmodders_banhammer/banhammer.css";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                $asset->add_assets_version('12');
                $asset_file = $asset->get_url();
                }
            }
            $context['definition']->append('STYLESHEETS', '<link href="' . $asset_file . '" rel="stylesheet" type="text/css" media="screen" />
');
        }
    }

    public function getTemplateName()
    {
        return "@phpbbmodders_banhammer/event/overall_header_head_append.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}

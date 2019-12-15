<?php

/* @phpbbmodders_banhammer/event/overall_footer_after.html */
class __TwigTemplate_98b4a8e45ccd183dc3431507601e7e1a68b0d889b0f4c199d013b8aa4ed47709 extends Twig_Template
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
        if ((isset($context["S_SHOW_BH"]) ? $context["S_SHOW_BH"] : null)) {
            // line 2
            echo "<script type=\"text/javascript\">
(function(\$){  // Avoid conflicts with other libraries
\t'use strict';
\t\$('.bh-click').click(
\tfunction() {
\t\t\$('#bh-options').toggle('slow');
\t});

\t\$(\".bh_hover\").hover(
\tfunction() {
\t\t\$(this).css('background-color', '#ecf3f7')
\t},
\tfunction() {
\t\t\$(this).css('background-color', '')
\t});
})(jQuery);
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@phpbbmodders_banhammer/event/overall_footer_after.html";
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

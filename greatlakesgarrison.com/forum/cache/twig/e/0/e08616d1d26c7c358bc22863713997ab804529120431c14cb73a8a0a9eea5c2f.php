<?php

/* progress_bar.html */
class __TwigTemplate_e08616d1d26c7c358bc22863713997ab804529120431c14cb73a8a0a9eea5c2f extends Twig_Template
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
        $this->loadTemplate("simple_header.html", "progress_bar.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<script type=\"text/javascript\">
// <![CDATA[
\t/**
\t* Close previously opened popup
\t*/
\tfunction close_popup()
\t{
\t\tif (opener != null)
\t\t{
\t\t\tif (opener.close_waitscreen != null)
\t\t\t{
\t\t\t\tif (opener.close_waitscreen == 1)
\t\t\t\t{
\t\t\t\t\topener.close_waitscreen = 0;
\t\t\t\t\tself.close();
\t\t\t\t\treturn 0;
\t\t\t\t}
\t\t\t}
\t\t}
\t\tsetTimeout(\"close_popup()\", 1000);
\t\treturn 0;
\t}
// ]]>
</script>

<div class=\"successbox\">
\t<h3>";
        // line 29
        echo $this->env->getExtension('phpbb')->lang("PROGRESS");
        echo "</h3>
\t<img src=\"images/progress_bar.gif\" alt=\"";
        // line 30
        echo $this->env->getExtension('phpbb')->lang("PROGRESS");
        echo "\" />
\t<p>";
        // line 31
        echo $this->env->getExtension('phpbb')->lang("PROGRESS_EXPLAIN");
        echo "</p>
</div>

<script type=\"text/javascript\">
// <![CDATA[
\tclose_popup();
// ]]>
</script>

";
        // line 40
        $location = "simple_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("simple_footer.html", "progress_bar.html", 40)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "progress_bar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 40,  68 => 31,  64 => 30,  60 => 29,  31 => 2,  19 => 1,);
    }
}

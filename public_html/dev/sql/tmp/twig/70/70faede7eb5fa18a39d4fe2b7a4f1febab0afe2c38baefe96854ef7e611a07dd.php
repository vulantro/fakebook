<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* navigation/tree/state.twig */
class __TwigTemplate_2d171d3a242ab9312790bf557a2b649a88a36e08478782fd55285343bb557ce6 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["quick_warp"] ?? null);
        echo "

<div class=\"clearfloat\"></div>

<ul>
  ";
        // line 6
        echo ($context["fast_filter"] ?? null);
        echo "
  ";
        // line 7
        echo ($context["controls"] ?? null);
        echo "
</ul>

";
        // line 10
        echo ($context["page_selector"] ?? null);
        echo "

<div id='pma_navigation_tree_content'>
  <ul>
    ";
        // line 14
        echo ($context["nodes"] ?? null);
        echo "
  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "navigation/tree/state.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 14,  55 => 10,  49 => 7,  45 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navigation/tree/state.twig", "/home/arsenal1/public_html/fakebook/phpmyadmin/templates/navigation/tree/state.twig");
    }
}

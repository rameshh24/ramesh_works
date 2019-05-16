<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/bootstrap/templates/menu/menu--main.html.twig */
class __TwigTemplate_fa0461f19915275b4f695621fe0b57f533621cb07a0f4d6d1eb6947f9b0e28b5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 20
        $this->parent = $this->loadTemplate("menu.html.twig", "themes/bootstrap/templates/menu/menu--main.html.twig", 20);
        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 22];
        $filters = ["clean_class" => 24];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doGetParent(array $context)
    {
        return "menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 22
        $context["classes"] = [0 => "menu", 1 => ("menu--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 24
($context["menu_name"] ?? null)))), 2 => "nav", 3 => "navbar-nav"];
        // line 20
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/menu/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 20,  61 => 24,  60 => 22,  22 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a menu.
 *
 * Available variables:
 * - classes: A list of classes to apply to the top level <ul> element.
 * - dropdown_classes: A list of classes to apply to the dropdown <ul> element.
 * - menu_name: The machine name of the menu.
 * - items: A nested list of menu items. Each menu item contains:
 *   - attributes: HTML attributes for the menu item.
 *   - below: The menu item child items.
 *   - title: The menu link title.
 *   - url: The menu link url, instance of \\Drupal\\Core\\Url
 *   - localized_options: Menu link localized options.
 *
 * @ingroup templates
 */
#}
{% extends \"menu.html.twig\" %}
{%
  set classes = [
    'menu',
    'menu--' ~ menu_name|clean_class,
    'nav',
    'navbar-nav',
  ]
%}
", "themes/bootstrap/templates/menu/menu--main.html.twig", "C:\\Users\\hbhanuda\\Sites\\devdesktop\\drupal-test\\themes\\bootstrap\\templates\\menu\\menu--main.html.twig");
    }
}

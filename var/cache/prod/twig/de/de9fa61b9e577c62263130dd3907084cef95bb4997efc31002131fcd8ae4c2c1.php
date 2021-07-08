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

/* @PrestaShop/Admin/Module/Includes/tab-module-line.html.twig */
class __TwigTemplate_7b89036db78b182f0795ec19a352e9eb1e6533eef1f6315705b1e0db4f9f89fd extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 26
        $context["moduleImage"] = (((null === $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "img", []))) ? ((((twig_constant("_MODULE_DIR_") . $this->getAttribute($this->getAttribute(        // line 27
($context["module"] ?? null), "attributes", []), "name", [])) . "/") . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "logo", []))) : ($this->getAttribute($this->getAttribute(        // line 28
($context["module"] ?? null), "attributes", []), "img", [])));
        // line 30
        echo "<tr>
  <td class=\"fixed-with-sm center\">
    <img
      class=\"img-thumbnail\"
      alt=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
        echo "\"
      src=\"";
        // line 35
        echo twig_escape_filter($this->env, ($context["moduleImage"] ?? null), "html", null, true);
        echo "\"
    />
  </td>
  <td>
    <div id=\"anchor";
        // line 39
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", [])), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "\">
      <div class=\"module_name\">
        <span style=\"display:none\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
        echo "</span>
        ";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "
        <small class=\"text-muted\">v";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version", []), "html", null, true);
        echo " - by ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "author", []), "html", null, true);
        echo "</small>
        ";
        // line 44
        if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsBought"))) {
            // line 45
            echo "        - <span class=\"module-badge-bought help-tooltip text-warning\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You bought this module on PrestaShop Addons. Thank You.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-pushpin\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bought", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (( !twig_test_empty($this->getAttribute($this->getAttribute(        // line 46
($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsMustHave"))) {
            // line 47
            echo "        - <span class=\"module-badge-popular help-tooltip text-primary\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This module is available on PrestaShop Addons.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-group\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Popular", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (( !twig_test_empty($this->getAttribute($this->getAttribute(        // line 48
($context["module"] ?? null), "attributes", []), "type", [])) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) == "addonsPartner"))) {
            // line 49
            echo "        - <span class=\"module-badge-partner help-tooltip text-warning\" data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This module is available for free thanks to our partner.", [], "Admin.Modules.Help"), "html", null, true);
            echo "\"><i class=\"icon-pushpin\"></i> <small>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Official", [], "Admin.Modules.Help"), "html", null, true);
            echo "</small></span>
        ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 50
($context["module"] ?? null), "attributes", [], "any", false, true), "id", [], "any", true, true) && ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "id", []) >= 0))) {
            // line 51
            echo "          ";
            if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "version_addons", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version_addons", []))) {
                // line 52
                echo "            <span class=\"label label-warning\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Need update", [], "Admin.Modules.Help"), "html", null, true);
                echo "</span>
          ";
            }
            // line 54
            echo "        ";
        }
        // line 55
        echo "      </div>
      <p class=\"module_description\">
        ";
        // line 57
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "description", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", [])))) {
            // line 58
            echo "          ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", []), "html", null, true);
            echo "
        ";
        }
        // line 60
        echo "      </p>
      ";
        // line 61
        if ((($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "message", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []))) && (( !$this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", [], "any", false, true), "type", [], "any", true, true) || ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) != "addonsMustHave")) || ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "type", []) != "addonsNative")))) {
            // line 62
            echo "        <div class=\"alert alert-success\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
          <p class=\"alert-text\">
            ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "message", []), "html", null, true);
            echo "
          </p>
        </div>
      ";
        }
        // line 69
        echo "    </div>
  </td>
  <td class=\"module-container module-quick-action-list clearfix\">
    ";
        // line 72
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", ["module" => ($context["module"] ?? null)]);
        echo "
  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/tab-module-line.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 72,  142 => 69,  135 => 65,  130 => 62,  128 => 61,  125 => 60,  119 => 58,  117 => 57,  113 => 55,  110 => 54,  104 => 52,  101 => 51,  99 => 50,  92 => 49,  90 => 48,  83 => 47,  81 => 46,  74 => 45,  72 => 44,  66 => 43,  62 => 42,  58 => 41,  51 => 39,  44 => 35,  40 => 34,  34 => 30,  32 => 28,  31 => 27,  30 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/tab-module-line.html.twig", "/home/povilasbrilius/.atom-projects/prestashop-gaming/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/tab-module-line.html.twig");
    }
}

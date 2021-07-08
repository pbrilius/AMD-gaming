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

/* @PrestaShop/Admin/Module/Includes/card_grid.html.twig */
class __TwigTemplate_91a584bc101d39e2d4447c0ad6d2470f428dd2f3d6fb1f199e1cc23ed203bf4c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'addon_version' => [$this, 'block_addon_version'],
            'addon_description' => [$this, 'block_addon_description'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        $context["isModuleActive"] = $this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", []), "active", []);
        // line 26
        echo "
<div
  class=\"module-item module-item-grid col-md-12 col-lg-6 col-xl-3 ";
        // line 28
        if (((($context["origin"] ?? null) == "manage") && (($context["isModuleActive"] ?? null) == "0"))) {
            echo "module-item-grid-isNotActive";
        }
        echo "\"
  data-id=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "id", []), "html", null, true);
        echo "\"
  data-name=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "\"
  data-scoring=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "avgRate", []), "html", null, true);
        echo "\"
  data-logo=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "img", []), "html", null, true);
        echo "\"
  data-author=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "author", []), "html", null, true);
        echo "\"
  data-version=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version", []), "html", null, true);
        echo "\"
  data-description=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", []), "html", null, true);
        echo "\"
  data-tech-name=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
        echo "\"
  data-child-categories=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "categoryName", []), "html", null, true);
        echo "\"
  data-categories=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["category"] ?? null), "html", null, true);
        echo "\"
  data-type=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "productType", []), "html", null, true);
        echo "\"
  data-price=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "price", []), "raw", []), "html", null, true);
        echo "\"
  data-active=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["isModuleActive"] ?? null), "html", null, true);
        echo "\"
>
  <div class=\"module-item-wrapper-grid\">
    <div class=\"module-item-heading-grid\">
      <div class=\"module-logo-thumb-grid\">
        <img src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "img", []), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
        echo "\"/>
      </div>
      <h3
        class=\"text-ellipsis module-name-grid\"
        data-toggle=\"pstooltip\"
        data-placement=\"top\"
        title=\"";
        // line 52
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []);
        echo "\"
      >
        ";
        // line 54
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", [])) {
            // line 55
            echo "          ";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []);
            echo "
        ";
        } else {
            // line 57
            echo "          ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
            echo "
        ";
        }
        // line 59
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "picos", []));
        foreach ($context['_seq'] as $context["_key"] => $context["pico"]) {
            // line 60
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["pico"], "img", []), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["pico"], "label", []), "html", null, true);
            echo "\" />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pico'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "      </h3>
      <div class=\"text-ellipsis small-text module-version-author-grid\">
        ";
        // line 64
        $this->displayBlock('addon_version', $context, $blocks);
        // line 71
        echo "      </div>
    </div>
    <div class=\"module-quick-description-grid small no-padding mb-0\">
      ";
        // line 74
        $this->displayBlock('addon_description', $context, $blocks);
        // line 87
        echo "    </div>

    <div class=\"module-container module-quick-action-grid clearfix\">
        <div class=\"badges-container\">
          ";
        // line 91
        $context["badges"] = $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "badges", []);
        // line 92
        echo "          ";
        if (($context["badges"] ?? null)) {
            // line 93
            echo "            ";
            $context["badge"] = twig_first($this->env, ($context["badges"] ?? null));
            // line 94
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "img", []), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "label", []), "html", null, true);
            echo "\"/>
            ";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "label", []), "html", null, true);
            echo "
          ";
        }
        // line 97
        echo "        </div>
      <hr />
      ";
        // line 99
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "nbRates", []) > 0)) {
            // line 100
            echo "        <div class=\"module-stars module-star-ranking-grid-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "starsRate", []), "html", null, true);
            echo " small\">
          (";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "nbRates", []), "html", null, true);
            echo ")
        </div>
      ";
        }
        // line 104
        echo "      <div class=\"float-right module-price\">
      ";
        // line 105
        if ((($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "url_active", []) == "buy") && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "price", []), "raw", []) != "0.00"))) {
            // line 106
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "price", []), "displayPrice", []), "html", null, true);
            echo "
      ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 107
($context["module"] ?? null), "attributes", []), "url_active", []) != "buy")) {
            // line 108
            echo "        <span class=\"pt-2\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Free", [], "Admin.Modules.Feature"), "html", null, true);
            echo "</span>
      ";
        }
        // line 110
        echo "      </div>
      ";
        // line 111
        if (((isset($context["requireBulkActions"]) || array_key_exists("requireBulkActions", $context)) && (($context["requireBulkActions"] ?? null) == true))) {
            // line 112
            echo "        <div class=\"float-right module-checkbox-bulk-grid\">
          <input type=\"checkbox\" data-name=\"";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "displayName", []), "html", null, true);
            echo "\" data-tech-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
            echo "\" />
        </div>
      ";
        }
        // line 116
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/action_menu.html.twig", "@PrestaShop/Admin/Module/Includes/card_grid.html.twig", 116)->display(twig_array_merge($context, ["module" => ($context["module"] ?? null), "level" => ($context["level"] ?? null)]));
        // line 117
        echo "    </div>
    ";
        // line 118
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_read_more.html.twig", "@PrestaShop/Admin/Module/Includes/card_grid.html.twig", 118)->display(twig_array_merge($context, ["module" => ($context["module"] ?? null), "additionalModalSuffix" => (((isset($context["additionalModalSuffix"]) || array_key_exists("additionalModalSuffix", $context))) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")), "level" => ($context["level"] ?? null)]));
        // line 119
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig", "@PrestaShop/Admin/Module/Includes/card_grid.html.twig", 119)->display(twig_array_merge($context, ["module" => ($context["module"] ?? null)]));
        // line 120
        echo "  </div>
</div>
";
    }

    // line 64
    public function block_addon_version($context, array $blocks = [])
    {
        // line 65
        echo "          ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "productType", []) == "service")) {
            // line 66
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", ["%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "author", [])) . "</b>")], "Admin.Modules.Feature");
            echo "
          ";
        } else {
            // line 68
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", ["%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "version", []), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "author", [])) . "</b>")], "Admin.Modules.Feature");
            echo "
          ";
        }
        // line 70
        echo "        ";
    }

    // line 74
    public function block_addon_description($context, array $blocks = [])
    {
        // line 75
        echo "        <div class=\"module-quick-description-text\">
          ";
        // line 76
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", []);
        echo "
          ";
        // line 77
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", [])) > 0) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "description", [])) < twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "fullDescription", []))))) {
            // line 78
            echo "            ...
          ";
        }
        // line 80
        echo "        </div>
        <div class=\"module-read-more-grid\">
          ";
        // line 82
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "id", []) != "0")) {
            // line 83
            echo "            <a class=\"module-read-more-grid-btn url\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_cart", ["moduleId" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "id", [])]), "html", null, true);
            echo "\" data-target=\"#module-modal-read-more-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", []), "name", []), "html", null, true);
            echo twig_escape_filter($this->env, (((isset($context["additionalModalSuffix"]) || array_key_exists("additionalModalSuffix", $context))) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read More", [], "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
          ";
        }
        // line 85
        echo "        </div>
      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/card_grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  308 => 85,  297 => 83,  295 => 82,  291 => 80,  287 => 78,  285 => 77,  281 => 76,  278 => 75,  275 => 74,  271 => 70,  265 => 68,  259 => 66,  256 => 65,  253 => 64,  247 => 120,  244 => 119,  242 => 118,  239 => 117,  236 => 116,  228 => 113,  225 => 112,  223 => 111,  220 => 110,  214 => 108,  212 => 107,  207 => 106,  205 => 105,  202 => 104,  196 => 101,  191 => 100,  189 => 99,  185 => 97,  180 => 95,  173 => 94,  170 => 93,  167 => 92,  165 => 91,  159 => 87,  157 => 74,  152 => 71,  150 => 64,  146 => 62,  135 => 60,  130 => 59,  124 => 57,  118 => 55,  116 => 54,  111 => 52,  100 => 46,  92 => 41,  88 => 40,  84 => 39,  80 => 38,  76 => 37,  72 => 36,  68 => 35,  64 => 34,  60 => 33,  56 => 32,  52 => 31,  48 => 30,  44 => 29,  38 => 28,  34 => 26,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/card_grid.html.twig", "/home/povilasbrilius/.atom-projects/prestashop-gaming/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_grid.html.twig");
    }
}

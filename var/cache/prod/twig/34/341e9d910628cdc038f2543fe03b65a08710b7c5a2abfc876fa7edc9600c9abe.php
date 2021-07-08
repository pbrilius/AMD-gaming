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

/* @Modules/ps_mbo/views/templates/admin/controllers/module_catalog/recommended-modules.html.twig */
class __TwigTemplate_9fdb65d9b118e47b678c56b6de46565537eadba74a76166d53283fdee03c49f7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 20
        return $this->loadTemplate((($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "isxmlhttprequest", [])) ? ("@Modules/ps_mbo/views/templates/admin/layout-ajax.html.twig") : ("@PrestaShop/Admin/layout.html.twig")), "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/recommended-modules.html.twig", 20);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 22
    public function block_content($context, array $blocks = [])
    {
        // line 23
        echo "  ";
        if (( !twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null)) ||  !twig_test_empty(($context["recommendedModulesInstalled"] ?? null)))) {
            // line 24
            echo "  <ul class=\"nav nav-tabs\" role=\"tablist\">
    ";
            // line 25
            if ( !twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null))) {
                // line 26
                echo "      <li class=\"nav-item active\">
        <a class=\"nav-link active\" data-toggle=\"tab\" href=\"#tab_modules_list_not_installed\" role=\"tab\">
          ";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Not Installed", []), "html", null, true);
                echo "
        </a>
      </li>
    ";
            }
            // line 32
            echo "    ";
            if ( !twig_test_empty(($context["recommendedModulesInstalled"] ?? null))) {
                // line 33
                echo "      <li class=\"nav-item";
                if (twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null))) {
                    echo " active";
                }
                echo "\">
        <a class=\"nav-link";
                // line 34
                if (twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null))) {
                    echo " active";
                }
                echo "\" data-toggle=\"tab\" href=\"#tab_modules_list_installed\" role=\"tab\">
          ";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Installed", []), "html", null, true);
                echo "
        </a>
      </li>
    ";
            }
            // line 39
            echo "  </ul>
  <div id=\"modules_list_container_content\" class=\"tab-content\">
    ";
            // line 41
            if ( !twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null))) {
                // line 42
                echo "      <div class=\"tab-pane active\" id=\"tab_modules_list_not_installed\" role=\"tabpanel\">
        <table class=\"table\">
          ";
                // line 44
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["recommendedModulesNotInstalled"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["recommendedModuleNotInstalled"]) {
                    // line 45
                    echo "            ";
                    echo twig_include($this->env, $context, "@PrestaShop/Admin/Module/Includes/tab-module-line.html.twig", ["module" => $context["recommendedModuleNotInstalled"]]);
                    echo "
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recommendedModuleNotInstalled'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 47
                echo "        </table>
      </div>
    ";
            }
            // line 50
            echo "    ";
            if ( !twig_test_empty(($context["recommendedModulesInstalled"] ?? null))) {
                // line 51
                echo "      <div class=\"tab-pane ";
                if (twig_test_empty(($context["recommendedModulesNotInstalled"] ?? null))) {
                    echo "active";
                }
                echo "\" id=\"tab_modules_list_installed\" role=\"tabpanel\">
        <table class=\"table\">
          ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["recommendedModulesInstalled"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["recommendedModuleInstalled"]) {
                    // line 54
                    echo "            ";
                    echo twig_include($this->env, $context, "@PrestaShop/Admin/Module/Includes/tab-module-line.html.twig", ["module" => $context["recommendedModuleInstalled"]]);
                    echo "
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recommendedModuleInstalled'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "        </table>
      </div>
    ";
            }
            // line 59
            echo "  </div>
  ";
        }
        // line 61
        echo "
  <div class=\"alert alert-addons row-margin-top\" role=\"alert\">
    <p class=\"alert-text\">
      <a href=\"https://addons.prestashop.com/?utm_source=back-office&amp;utm_medium=dispatch&amp;utm_campaign=back-office-";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "locale", []), "html", null, true);
        echo "&amp;utm_content=download";
        if ((isset($context["adminListFromSource"]) || array_key_exists("adminListFromSource", $context))) {
            echo "&amp;utm_term=";
            echo twig_escape_filter($this->env, ($context["adminListFromSource"] ?? null), "html", null, true);
        }
        echo "\" onclick=\"return !window.open(this.href);\">
        ";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("More modules on addons.prestashop.com", []), "html", null, true);
        echo "
      </a>
    </p>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/recommended-modules.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 65,  191 => 64,  186 => 61,  182 => 59,  177 => 56,  160 => 54,  143 => 53,  135 => 51,  132 => 50,  127 => 47,  110 => 45,  93 => 44,  89 => 42,  87 => 41,  83 => 39,  76 => 35,  70 => 34,  63 => 33,  60 => 32,  53 => 28,  49 => 26,  47 => 25,  44 => 24,  41 => 23,  38 => 22,  29 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/admin/controllers/module_catalog/recommended-modules.html.twig", "/home/povilasbrilius/.atom-projects/prestashop-gaming/modules/ps_mbo/views/templates/admin/controllers/module_catalog/recommended-modules.html.twig");
    }
}

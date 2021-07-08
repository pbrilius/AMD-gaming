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

/* @PrestaShop/Admin/layout.html.twig */
class __TwigTemplate_71b2c6ea48a3ebf852be6f030af42b287a6a33664a77fa8cc1a1d63ea0e6b44e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'javascripts' => [$this, 'block_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
            'content_header' => [$this, 'block_content_header'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return $this->loadTemplate(twig_template_from_string($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getLegacyLayout($this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
($context["app"] ?? null), "request", []), "attributes", []), "get", [0 => "_legacy_controller"], "method"), ((        // line 28
(isset($context["layoutTitle"]) || array_key_exists("layoutTitle", $context))) ? (($context["layoutTitle"] ?? null)) : ("")), ((        // line 29
(isset($context["layoutHeaderToolbarBtn"]) || array_key_exists("layoutHeaderToolbarBtn", $context))) ? (($context["layoutHeaderToolbarBtn"] ?? null)) : ([])), ((        // line 30
(isset($context["layoutDisplayType"]) || array_key_exists("layoutDisplayType", $context))) ? (($context["layoutDisplayType"] ?? null)) : ("")), ((        // line 31
(isset($context["showContentHeader"]) || array_key_exists("showContentHeader", $context))) ? (($context["showContentHeader"] ?? null)) : (true)), ((        // line 32
(isset($context["headerTabContent"]) || array_key_exists("headerTabContent", $context))) ? (($context["headerTabContent"] ?? null)) : ("")), ((        // line 33
(isset($context["enableSidebar"]) || array_key_exists("enableSidebar", $context))) ? (($context["enableSidebar"] ?? null)) : (false)), ((        // line 34
(isset($context["help_link"]) || array_key_exists("help_link", $context))) ? (($context["help_link"] ?? null)) : ("")), $this->env->getExtension('PrestaShopBundle\Twig\Extension\JsRouterMetadataExtension')->getJsRouterMetadata(), ((        // line 36
(isset($context["meta_title"]) || array_key_exists("meta_title", $context))) ? (($context["meta_title"] ?? null)) : ("")), ((        // line 37
(isset($context["use_regular_h1_structure"]) || array_key_exists("use_regular_h1_structure", $context))) ? (($context["use_regular_h1_structure"] ?? null)) : (true)))), "@PrestaShop/Admin/layout.html.twig", 25);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 41
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/layout.html.twig", 41)->unwrap();
        // line 25
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 43
    public function block_javascripts($context, array $blocks = [])
    {
        // line 44
        echo "  <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/default.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/right-sidebar.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/form_popover_error.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 49
    public function block_translate_javascripts($context, array $blocks = [])
    {
        // line 50
        echo "  <script>
    var translate_javascripts = ";
        // line 51
        echo twig_jsonencode_filter(($context["js_translatable"] ?? null));
        echo ";
    var PS_ALLOW_ACCENTED_CHARS_URL = ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\DataFormatterExtension')->intCast($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_ALLOW_ACCENTED_CHARS_URL")), "html", null, true);
        echo ";
  </script>
";
    }

    // line 56
    public function block_content_header($context, array $blocks = [])
    {
        // line 57
        echo "  ";
        // line 77
        echo "  ";
        $context["layout"] = $this;
        // line 78
        echo "
  ";
        // line 79
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "peek", [0 => "error"], "method")) > 0)) {
            // line 80
            echo "    ";
            echo $context["layout"]->getalert("danger", $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "get", [0 => "error"], "method"));
            echo "
  ";
        }
        // line 82
        echo "  ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "peek", [0 => "failure"], "method")) > 0)) {
            // line 83
            echo "    ";
            echo $context["layout"]->getalert("danger", $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "get", [0 => "failure"], "method"));
            echo "
  ";
        }
        // line 85
        echo "  ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "peek", [0 => "success"], "method")) > 0)) {
            // line 86
            echo "    ";
            echo $context["layout"]->getalert("success", $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "get", [0 => "success"], "method"));
            echo "
  ";
        }
        // line 88
        echo "  ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "peek", [0 => "warning"], "method")) > 0)) {
            // line 89
            echo "    ";
            echo $context["layout"]->getalert("warning", $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", []), "flashbag", []), "get", [0 => "warning"], "method"));
            echo "
  ";
        }
    }

    // line 93
    public function block_sidebar_right($context, array $blocks = [])
    {
        // line 94
        echo "  <nav
    id=\"right-sidebar\"
    role=\"navigation\"
    class=\"col-xs-5 col-sm-4 col-md-4 col-lg-3 sidebar sidebar-right sidebar-animate text-sm-center\"
  >
    <img
      src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/img/bundle/dashboard_loading.gif"), "html", null, true);
        echo "\"
      style=\"margin-top: 10em;\" alt=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Loading...", [], "Admin.Global"), "html", null, true);
        echo "\"
    />
  </nav>
";
    }

    // line 57
    public function getalert($__type__ = null, $__flashbagContent__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "type" => $__type__,
            "flashbagContent" => $__flashbagContent__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 58
            echo "    <div class=\"alert alert-";
            echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
            echo " d-print-none\" role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\"><i class=\"material-icons\">close</i></span>
      </button>
      ";
            // line 62
            if ((twig_length_filter($this->env, ($context["flashbagContent"] ?? null)) > 1)) {
                // line 63
                echo "        <ul class=\"alert-text\">
          ";
                // line 64
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["flashbagContent"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                    // line 65
                    echo "            <li>";
                    echo $context["flashMessage"];
                    echo "</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "        </ul>
      ";
            } else {
                // line 69
                echo "        <div class=\"alert-text\">
          ";
                // line 70
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["flashbagContent"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                    // line 71
                    echo "            <p>";
                    echo $context["flashMessage"];
                    echo "</p>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 73
                echo "        </div>
      ";
            }
            // line 75
            echo "    </div>
  ";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 75,  219 => 73,  210 => 71,  206 => 70,  203 => 69,  199 => 67,  190 => 65,  186 => 64,  183 => 63,  181 => 62,  173 => 58,  160 => 57,  152 => 101,  148 => 100,  140 => 94,  137 => 93,  129 => 89,  126 => 88,  120 => 86,  117 => 85,  111 => 83,  108 => 82,  102 => 80,  100 => 79,  97 => 78,  94 => 77,  92 => 57,  89 => 56,  82 => 52,  78 => 51,  75 => 50,  72 => 49,  66 => 46,  62 => 45,  57 => 44,  54 => 43,  50 => 25,  48 => 41,  42 => 37,  41 => 36,  40 => 34,  39 => 33,  38 => 32,  37 => 31,  36 => 30,  35 => 29,  34 => 28,  33 => 27,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/layout.html.twig", "/home/povilasbrilius/.atom-projects/prestashop-gaming/src/PrestaShopBundle/Resources/views/Admin/layout.html.twig");
    }
}

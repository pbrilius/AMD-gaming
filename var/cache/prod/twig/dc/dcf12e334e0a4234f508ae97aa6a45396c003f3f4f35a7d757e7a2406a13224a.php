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

/* @PrestaShop/Admin/macros.html.twig */
class __TwigTemplate_c504fa8a78851450029ae8fca0dde614d5b70f490f9de0a1791115f24128fcd2 extends \Twig\Template
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
        // line 28
        echo "
";
        // line 32
        echo "
";
        // line 38
        echo "
";
        // line 50
        echo "
";
        // line 58
        echo "
";
        // line 74
        echo "
";
        // line 92
        echo "
";
        // line 99
        echo "
";
        // line 129
        echo "
";
        // line 249
        echo "
 ";
        // line 292
        echo "
";
    }

    // line 25
    public function getform_label_tooltip($__name__ = null, $__tooltip__ = null, $__placement__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "tooltip" => $__tooltip__,
            "placement" => $__placement__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 26
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["name"] ?? null), 'label', ["label_attr" => ["tooltip" => ($context["tooltip"] ?? null), "tooltip_placement" => (((isset($context["placement"]) || array_key_exists("placement", $context))) ? (_twig_default_filter(($context["placement"] ?? null), "top")) : ("top"))]]);
            echo "
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

    // line 29
    public function getcheck($__variable__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "variable" => $__variable__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 30
            echo "  ";
            ((((isset($context["variable"]) || array_key_exists("variable", $context)) && (twig_length_filter($this->env, ($context["variable"] ?? null)) > 0))) ? (print (twig_escape_filter($this->env, ($context["variable"] ?? null), "html", null, true))) : (print (false)));
            echo "
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

    // line 33
    public function gettooltip($__text__ = null, $__icon__ = null, $__position__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "icon" => $__icon__,
            "position" => $__position__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 34
            echo "  <span data-toggle=\"pstooltip\" class=\"label-tooltip\" data-original-title=\"";
            echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
            echo "\" data-html=\"true\" data-placement=\"";
            echo twig_escape_filter($this->env, (((isset($context["position"]) || array_key_exists("position", $context))) ? (_twig_default_filter(($context["position"] ?? null), "top")) : ("top")), "html", null, true);
            echo "\">
    <i class=\"material-icons\">";
            // line 35
            echo twig_escape_filter($this->env, ($context["icon"] ?? null), "html", null, true);
            echo "</i>
  </span>
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

    // line 39
    public function getinfotip($__text__ = null, $__use_raw__ = false, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "use_raw" => $__use_raw__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 40
            echo "<div class=\"alert alert-info\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 42
            if (($context["use_raw"] ?? null)) {
                // line 43
                echo "      ";
                echo ($context["text"] ?? null);
                echo "
    ";
            } else {
                // line 45
                echo "      ";
                echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
                echo "
    ";
            }
            // line 47
            echo "  </p>
</div>
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

    // line 51
    public function getwarningtip($__text__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 52
            echo "<div class=\"alert alert-warning\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 54
            echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
            echo "
  </p>
</div>
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

    // line 59
    public function getlabel_with_help($__label__ = null, $__help__ = null, $__class__ = "", $__for__ = "", $__isRequired__ = false, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "help" => $__help__,
            "class" => $__class__,
            "for" => $__for__,
            "isRequired" => $__isRequired__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 60
            echo "<label";
            if ( !twig_test_empty(($context["for"] ?? null))) {
                echo " for=\"";
                echo twig_escape_filter($this->env, ($context["for"] ?? null), "html", null, true);
                echo "\"";
            }
            echo " class=\"form-control-label ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\">
  ";
            // line 61
            if (($context["isRequired"] ?? null)) {
                // line 62
                echo "    <span class=\"text-danger\">*</span>
  ";
            }
            // line 64
            echo "
  ";
            // line 65
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "
  <span
    class=\"help-box\"
    data-toggle=\"popover\"
    data-content=\"";
            // line 69
            echo twig_escape_filter($this->env, ($context["help"] ?? null), "html", null, true);
            echo "\">
  </span>
</label>
<p class=\"sr-only\">";
            // line 72
            echo twig_escape_filter($this->env, ($context["help"] ?? null), "html", null, true);
            echo "</p>
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

    // line 76
    public function getsortable_column_header($__title__ = null, $__sortColumnName__ = null, $__orderBy__ = null, $__sortOrder__ = null, $__prefix__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "title" => $__title__,
            "sortColumnName" => $__sortColumnName__,
            "orderBy" => $__orderBy__,
            "sortOrder" => $__sortOrder__,
            "prefix" => $__prefix__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 77
            echo "  ";
            list($context["sortOrder"], $context["orderBy"], $context["prefix"]) =             [(((isset($context["sortOrder"]) || array_key_exists("sortOrder", $context))) ? (_twig_default_filter(($context["sortOrder"] ?? null), "")) : ("")), (((isset($context["orderBy"]) || array_key_exists("orderBy", $context))) ? (_twig_default_filter(($context["orderBy"] ?? null))) : ("")), (((isset($context["prefix"]) || array_key_exists("prefix", $context))) ? (_twig_default_filter(($context["prefix"] ?? null), "")) : (""))];
            // line 78
            echo "  <div
      class=\"ps-sortable-column\"
      data-sort-col-name=\"";
            // line 80
            echo twig_escape_filter($this->env, ($context["sortColumnName"] ?? null), "html", null, true);
            echo "\"
      data-sort-prefix=\"";
            // line 81
            echo twig_escape_filter($this->env, ($context["prefix"] ?? null), "html", null, true);
            echo "\"
      ";
            // line 82
            if ((($context["orderBy"] ?? null) == ($context["sortColumnName"] ?? null))) {
                // line 83
                echo "        data-sort-is-current=\"true\"
        data-sort-direction=\"";
                // line 84
                echo (((($context["sortOrder"] ?? null) == "desc")) ? ("desc") : ("asc"));
                echo "\"
      ";
            }
            // line 86
            echo "    >
      <span role=\"columnheader\">";
            // line 87
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "</span>
      <span role=\"button\" class=\"ps-sort\" aria-label=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sort by", [], "Admin.Actions"), "html", null, true);
            echo "\"></span>
    </div>
  </th>
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

    // line 94
    public function getimport_file_sample($__label__ = null, $__filename__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "filename" => $__filename__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 95
            echo "    <a class=\"list-group-item list-group-item-action\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_import_sample_download", ["sampleName" => ($context["filename"] ?? null)]), "html", null, true);
            echo "\">
        ";
            // line 96
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["label"] ?? null), [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
    </a>
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

    // line 109
    public function getform_widget_with_error($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 110
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 110)->unwrap();
            // line 111
            echo "
  ";
            // line 112
            $context["vars"] = (((isset($context["vars"]) || array_key_exists("vars", $context))) ? (_twig_default_filter(($context["vars"] ?? null), [])) : ([]));
            // line 113
            echo "  ";
            $context["extraVars"] = (((isset($context["extraVars"]) || array_key_exists("extraVars", $context))) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
            // line 114
            echo "  ";
            $context["attr"] = (($this->getAttribute(($context["vars"] ?? null), "attr", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["vars"] ?? null), "attr", []), [])) : ([]));
            // line 115
            echo "  ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => (($this->getAttribute(($context["attr"] ?? null), "class", [], "any", true, true)) ? ($this->getAttribute(($context["attr"] ?? null), "class", [])) : (""))]);
            // line 116
            echo "  ";
            $context["vars"] = twig_array_merge(($context["vars"] ?? null), ["attr" => ($context["attr"] ?? null)]);
            // line 117
            echo "
  ";
            // line 118
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ($context["vars"] ?? null));
            echo "

  ";
            // line 120
            if (($this->getAttribute(($context["extraVars"] ?? null), "help", [], "any", true, true) && $this->getAttribute(($context["extraVars"] ?? null), "help", []))) {
                // line 121
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["extraVars"] ?? null), "help", []), "html", null, true);
                echo "</small>
    ";
            } elseif (($this->getAttribute($this->getAttribute(            // line 122
($context["form"] ?? null), "vars", [], "any", false, true), "help", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "help", []))) {
                // line 123
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "help", []), "html", null, true);
                echo "</small>
  ";
            }
            // line 125
            echo "
  ";
            // line 126
            echo $context["self"]->getform_error_with_popover(($context["form"] ?? null));
            echo "

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

    // line 139
    public function getform_error_with_popover($__form__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 140
            echo "  ";
            $context["errors"] = [];
            // line 141
            echo "
  ";
            // line 142
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "valid", [], "any", true, true) &&  !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "valid", []))) {
                // line 143
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "errors", []));
                foreach ($context['_seq'] as $context["_key"] => $context["parentError"]) {
                    // line 144
                    echo "      ";
                    $context["errors"] = twig_array_merge(($context["errors"] ?? null), [0 => $this->getAttribute($context["parentError"], "message", [])]);
                    // line 145
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parentError'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 146
                echo "
    ";
                // line 148
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "children", []));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 149
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["child"], "vars", []), "errors", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 150
                        echo "        ";
                        $context["errors"] = twig_array_merge(($context["errors"] ?? null), [0 => $this->getAttribute($context["error"], "message", [])]);
                        // line 151
                        echo "      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 152
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 153
                echo "  ";
            }
            // line 154
            echo "
  ";
            // line 155
            if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
                // line 156
                echo "    ";
                // line 157
                echo "    ";
                $context["errorPopover"] = null;
                // line 158
                echo "
    ";
                // line 159
                if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 1)) {
                    // line 160
                    echo "      ";
                    $context["popoverContainer"] = ("popover-error-container-" . $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "id", []));
                    // line 161
                    echo "      <div class=\"";
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                    echo "\"></div>


      ";
                    // line 164
                    if ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "errors_by_locale", [], "any", true, true)) {
                        // line 165
                        echo "          ";
                        $context["popoverErrors"] = $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "errors_by_locale", []);
                        // line 166
                        echo "
          ";
                        // line 168
                        echo "          ";
                        $context["translatableErrors"] = [];
                        // line 169
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["translatableError"]) {
                            // line 170
                            echo "            ";
                            $context["translatableErrors"] = twig_array_merge(($context["translatableErrors"] ?? null), [0 => $this->getAttribute($context["translatableError"], "error_message", [])]);
                            // line 171
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translatableError'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 172
                        echo "
          ";
                        // line 174
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 175
                            echo "            ";
                            if (!twig_in_filter($context["error"], ($context["translatableErrors"] ?? null))) {
                                // line 176
                                echo "              ";
                                $context["popoverErrors"] = twig_array_merge(($context["popoverErrors"] ?? null), [0 => $context["error"]]);
                                // line 177
                                echo "            ";
                            }
                            // line 178
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 179
                        echo "
        ";
                    } else {
                        // line 181
                        echo "          ";
                        $context["popoverErrors"] = ($context["errors"] ?? null);
                        // line 182
                        echo "      ";
                    }
                    // line 183
                    echo "
      ";
                    // line 184
                    $context["errorMessages"] = [];
                    // line 185
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 186
                        echo "        ";
                        $context["errorMessage"] = $context["popoverError"];
                        // line 187
                        echo "
        ";
                        // line 188
                        if (($this->getAttribute($context["popoverError"], "error_message", [], "any", true, true) && $this->getAttribute($context["popoverError"], "locale_name", [], "any", true, true))) {
                            // line 189
                            echo "          ";
                            $context["errorMessage"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%error_message% - Language: %language_name%", ["%error_message%" => $this->getAttribute($context["popoverError"], "error_message", []), "%language_name%" => $this->getAttribute($context["popoverError"], "locale_name", [])], "Admin.Notifications.Error");
                            // line 190
                            echo "        ";
                        }
                        // line 191
                        echo "
        ";
                        // line 192
                        $context["errorMessages"] = twig_array_merge(($context["errorMessages"] ?? null), [0 => ($context["errorMessage"] ?? null)]);
                        // line 193
                        echo "      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 194
                    echo "
      ";
                    // line 195
                    ob_start(function () { return ''; });
                    // line 196
                    echo "        <div class=\"popover-error-list\">
          <ul>
            ";
                    // line 198
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 199
                        echo "              <li class=\"text-danger\">
                ";
                        // line 200
                        echo twig_escape_filter($this->env, $context["popoverError"], "html", null, true);
                        echo "
              </li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 203
                    echo "          </ul>
        </div>
      ";
                    $context["popoverErrorContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 206
                    echo "
      <template class=\"js-popover-error-content\" data-id=\"";
                    // line 207
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "id", []), "html", null, true);
                    echo "\">
        ";
                    // line 208
                    echo twig_escape_filter($this->env, ($context["popoverErrorContent"] ?? null), "html", null, true);
                    echo "
      </template>

      ";
                    // line 211
                    ob_start(function () { return ''; });
                    // line 212
                    echo "        <span
          data-toggle=\"form-popover-error\"
          data-id=\"";
                    // line 214
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "id", []), "html", null, true);
                    echo "\"
          data-placement=\"bottom\"
          data-template='<div class=\"popover form-popover-error\" role=\"tooltip\"><h3 class=\"popover-header\"></h3><div class=\"popover-body\"></div></div>'
          data-trigger=\"hover\"
          data-container=\".";
                    // line 218
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                    echo "\"
        >
          <i class=\"material-icons form-error-icon\">error_outline</i> <u>";
                    // line 220
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->transchoice("%count% errors", twig_length_filter($this->env, ($context["popoverErrors"] ?? null)), [], "Admin.Global"), "html", null, true);
                    echo "</u>
        </span>
      ";
                    $context["errorPopover"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 223
                    echo "
    ";
                } elseif ($this->getAttribute($this->getAttribute(                // line 224
($context["form"] ?? null), "vars", [], "any", false, true), "error_by_locale", [], "any", true, true)) {
                    // line 225
                    echo "      ";
                    $context["errorByLocale"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%error_message% - Language: %language_name%", ["%error_message%" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "error_by_locale", []), "error_message", []), "%language_name%" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "error_by_locale", []), "locale_name", [])], "Admin.Notifications.Error");
                    // line 226
                    echo "      ";
                    $context["errors"] = [0 => ($context["errorByLocale"] ?? null)];
                    // line 227
                    echo "    ";
                }
                // line 228
                echo "
    <div class=\"invalid-feedback-container\">
      ";
                // line 230
                if ( !(null === ($context["errorPopover"] ?? null))) {
                    // line 231
                    echo "        <div class=\"text-danger\">
          ";
                    // line 232
                    echo twig_escape_filter($this->env, ($context["errorPopover"] ?? null), "html", null, true);
                    echo "
        </div>
      ";
                } else {
                    // line 235
                    echo "        <div class=\"d-inline-block text-danger align-top\">
          <i class=\"material-icons form-error-icon\">error_outline</i>
        </div>
        <div class=\"d-inline-block\">
          ";
                    // line 239
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 240
                        echo "            <div class=\"text-danger\">
              ";
                        // line 241
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "
            </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 244
                    echo "        </div>
      ";
                }
                // line 246
                echo "    </div>
  ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 256
    public function getform_group_row($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 257
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 257)->unwrap();
            // line 258
            echo "
  ";
            // line 259
            $context["class"] = (($this->getAttribute(($context["extraVars"] ?? null), "class", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["extraVars"] ?? null), "class", []), "")) : (""));
            // line 260
            echo "  ";
            $context["inputType"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "block_prefixes", [], "any", false, true), 1, [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "block_prefixes", [], "any", false, true), 1, []), "text")) : ("text"));
            // line 261
            echo "  ";
            $context["rowAttributes"] = (($this->getAttribute(($context["extraVars"] ?? null), "row_attr", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["extraVars"] ?? null), "row_attr", []), [])) : ([]));
            // line 262
            echo "  <div class=\"form-group row type-";
            echo twig_escape_filter($this->env, ($context["inputType"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["rowAttr"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["rowAttr"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['rowAttr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 263
            $context["extraVars"] = (((isset($context["extraVars"]) || array_key_exists("extraVars", $context))) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
            // line 264
            echo "
    ";
            // line 266
            echo "    ";
            $context["labelOnTop"] = false;
            // line 267
            echo "
    ";
            // line 268
            if ($this->getAttribute(($context["extraVars"] ?? null), "label_on_top", [], "any", true, true)) {
                // line 269
                echo "      ";
                $context["labelOnTop"] = $this->getAttribute(($context["extraVars"] ?? null), "label_on_top", []);
                // line 270
                echo "    ";
            }
            // line 271
            echo "
    ";
            // line 272
            if ($this->getAttribute(($context["extraVars"] ?? null), "label", [], "any", true, true)) {
                // line 273
                echo "      ";
                $context["isRequired"] = (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "required", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "required", []), false)) : (false));
                // line 274
                echo "
      ";
                // line 275
                if ($this->getAttribute(($context["extraVars"] ?? null), "required", [], "any", true, true)) {
                    // line 276
                    echo "        ";
                    $context["isRequired"] = $this->getAttribute(($context["extraVars"] ?? null), "required", []);
                    // line 277
                    echo "      ";
                }
                // line 278
                echo "
      <label for=\"";
                // line 279
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "id", []), "html", null, true);
                echo "\" class=\"form-control-label ";
                echo ((($context["labelOnTop"] ?? null)) ? ("label-on-top col-12") : (""));
                echo "\">
        ";
                // line 280
                if (($context["isRequired"] ?? null)) {
                    // line 281
                    echo "          <span class=\"text-danger\">*</span>
        ";
                }
                // line 283
                echo "        ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["extraVars"] ?? null), "label", []), "html", null, true);
                echo "
      </label>
    ";
            }
            // line 286
            echo "
    <div class=\"";
            // line 287
            echo ((($context["labelOnTop"] ?? null)) ? ("col-12") : ("col-sm"));
            echo "\">
      ";
            // line 288
            echo $context["self"]->getform_widget_with_error(($context["form"] ?? null), ($context["vars"] ?? null), ($context["extraVars"] ?? null));
            echo "
    </div>
  </div>
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

    // line 293
    public function getmultistore_switch($__form__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 294
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 294)->unwrap();
            // line 295
            echo "  ";
            if ($this->getAttribute(($context["form"] ?? null), "shop_restriction_switch", [], "any", true, true)) {
                // line 296
                echo "    ";
                ob_start(function () { return ''; });
                // line 297
                echo "      <strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Check / Uncheck all", [], "Admin.Actions"), "html", null, true);
                echo "</strong> <br>
      ";
                // line 298
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are editing this page for a specific shop or group. Click \"%yes_label%\" to check all fields, \"%no_label%\" to uncheck all.", ["%yes_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes", [], "Admin.Global"), "%no_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No", [], "Admin.Global")], "Admin.Design.Help"), "html", null, true);
                echo " <br>
      ";
                // line 299
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.", [], "Admin.Design.Help"), "html", null, true);
                echo "
    ";
                $context["defaultLabel"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 301
                echo "
    ";
                // line 302
                if ( !$this->getAttribute(($context["extraVars"] ?? null), "help", [], "any", true, true)) {
                    // line 303
                    echo "      ";
                    $context["extraVars"] = twig_array_merge(($context["extraVars"] ?? null), ["help" => ($context["defaultLabel"] ?? null)]);
                    // line 304
                    echo "    ";
                }
                // line 305
                echo "
    ";
                // line 306
                $context["vars"] = ["attr" => ["class" => "js-multi-store-restriction-switch"]];
                // line 307
                echo "
    ";
                // line 308
                echo $context["self"]->getform_group_row($this->getAttribute(($context["form"] ?? null), "shop_restriction_switch", []), ($context["vars"] ?? null), ($context["extraVars"] ?? null));
                echo "
  ";
            }
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
        return "@PrestaShop/Admin/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1007 => 308,  1004 => 307,  1002 => 306,  999 => 305,  996 => 304,  993 => 303,  991 => 302,  988 => 301,  983 => 299,  979 => 298,  974 => 297,  971 => 296,  968 => 295,  965 => 294,  952 => 293,  933 => 288,  929 => 287,  926 => 286,  919 => 283,  915 => 281,  913 => 280,  907 => 279,  904 => 278,  901 => 277,  898 => 276,  896 => 275,  893 => 274,  890 => 273,  888 => 272,  885 => 271,  882 => 270,  879 => 269,  877 => 268,  874 => 267,  871 => 266,  868 => 264,  866 => 263,  846 => 262,  843 => 261,  840 => 260,  838 => 259,  835 => 258,  832 => 257,  818 => 256,  801 => 246,  797 => 244,  788 => 241,  785 => 240,  781 => 239,  775 => 235,  769 => 232,  766 => 231,  764 => 230,  760 => 228,  757 => 227,  754 => 226,  751 => 225,  749 => 224,  746 => 223,  740 => 220,  735 => 218,  728 => 214,  724 => 212,  722 => 211,  716 => 208,  712 => 207,  709 => 206,  704 => 203,  695 => 200,  692 => 199,  688 => 198,  684 => 196,  682 => 195,  679 => 194,  673 => 193,  671 => 192,  668 => 191,  665 => 190,  662 => 189,  660 => 188,  657 => 187,  654 => 186,  649 => 185,  647 => 184,  644 => 183,  641 => 182,  638 => 181,  634 => 179,  628 => 178,  625 => 177,  622 => 176,  619 => 175,  614 => 174,  611 => 172,  605 => 171,  602 => 170,  597 => 169,  594 => 168,  591 => 166,  588 => 165,  586 => 164,  579 => 161,  576 => 160,  574 => 159,  571 => 158,  568 => 157,  566 => 156,  564 => 155,  561 => 154,  558 => 153,  552 => 152,  546 => 151,  543 => 150,  538 => 149,  533 => 148,  530 => 146,  524 => 145,  521 => 144,  516 => 143,  514 => 142,  511 => 141,  508 => 140,  496 => 139,  478 => 126,  475 => 125,  469 => 123,  467 => 122,  462 => 121,  460 => 120,  455 => 118,  452 => 117,  449 => 116,  446 => 115,  443 => 114,  440 => 113,  438 => 112,  435 => 111,  432 => 110,  418 => 109,  400 => 96,  395 => 95,  382 => 94,  363 => 88,  359 => 87,  356 => 86,  351 => 84,  348 => 83,  346 => 82,  342 => 81,  338 => 80,  334 => 78,  331 => 77,  315 => 76,  298 => 72,  292 => 69,  285 => 65,  282 => 64,  278 => 62,  276 => 61,  265 => 60,  249 => 59,  230 => 54,  226 => 52,  214 => 51,  197 => 47,  191 => 45,  185 => 43,  183 => 42,  179 => 40,  166 => 39,  148 => 35,  141 => 34,  127 => 33,  109 => 30,  97 => 29,  79 => 26,  65 => 25,  60 => 292,  57 => 249,  54 => 129,  51 => 99,  48 => 92,  45 => 74,  42 => 58,  39 => 50,  36 => 38,  33 => 32,  30 => 28,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/macros.html.twig", "/home/povilasbrilius/.atom-projects/prestashop-gaming/src/PrestaShopBundle/Resources/views/Admin/macros.html.twig");
    }
}

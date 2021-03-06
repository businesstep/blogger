<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_b4f06c960b30860c2dd5ed9f8a633f3cebc1bff8913f5e49ce3d32aafcf7887b extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "logs"));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute($this->getContext($context, "log"), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute($this->getContext($context, "log"), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  87 => 20,  25 => 4,  21 => 2,  89 => 20,  85 => 19,  79 => 18,  75 => 17,  72 => 16,  68 => 14,  56 => 9,  50 => 8,  24 => 3,  201 => 92,  199 => 91,  196 => 90,  187 => 84,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  123 => 47,  121 => 46,  115 => 43,  112 => 42,  105 => 40,  101 => 24,  91 => 31,  69 => 25,  66 => 15,  62 => 23,  51 => 12,  49 => 19,  39 => 6,  19 => 1,  98 => 40,  93 => 9,  88 => 6,  80 => 19,  78 => 40,  46 => 7,  32 => 12,  27 => 4,  22 => 2,  57 => 14,  54 => 21,  43 => 8,  40 => 8,  179 => 55,  172 => 49,  169 => 48,  164 => 44,  159 => 41,  153 => 36,  147 => 35,  136 => 56,  133 => 55,  126 => 51,  124 => 48,  119 => 45,  117 => 44,  113 => 42,  111 => 41,  103 => 36,  99 => 35,  94 => 22,  92 => 21,  86 => 28,  83 => 18,  77 => 12,  73 => 10,  70 => 9,  64 => 12,  58 => 56,  55 => 13,  53 => 18,  47 => 15,  44 => 10,  42 => 9,  35 => 4,  29 => 1,  48 => 10,  45 => 9,  37 => 6,  33 => 5,  30 => 3,  41 => 9,  36 => 7,  31 => 5,  28 => 3,);
    }
}

<?php

/* bloggerBloggerBundle::layout.html.twig */
class __TwigTemplate_28ddad93c59cfa716fba77040bc3e9ccdbe6322793622c3dd6b75dbbb0a24b84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'bodycontent' => array($this, 'block_bodycontent'),
            'content' => array($this, 'block_content'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_bodycontent($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Blog Application</h1>

    ";
        // line 6
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
    }

    // line 9
    public function block_sidebar($context, array $blocks = array())
    {
        // line 10
        echo "    side bar content
";
    }

    public function getTemplateName()
    {
        return "bloggerBloggerBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  45 => 9,  37 => 6,  33 => 4,  30 => 3,  41 => 6,  36 => 5,  31 => 4,  28 => 3,);
    }
}

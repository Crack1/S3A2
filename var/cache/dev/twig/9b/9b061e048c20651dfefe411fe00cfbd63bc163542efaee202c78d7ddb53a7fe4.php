<?php

/* BackendBundle:Default:index.html.twig */
class __TwigTemplate_0f9f0c6927442d084ff9531a4089ea91dfa9559ab2893992c91db279bb981fea extends Twig_Template
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
        $__internal_adb635cc5f2108599d881c450685d0f443d4dce1765ad6a59eaadd0e4d123228 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_adb635cc5f2108599d881c450685d0f443d4dce1765ad6a59eaadd0e4d123228->enter($__internal_adb635cc5f2108599d881c450685d0f443d4dce1765ad6a59eaadd0e4d123228_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendBundle:Default:index.html.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_adb635cc5f2108599d881c450685d0f443d4dce1765ad6a59eaadd0e4d123228->leave($__internal_adb635cc5f2108599d881c450685d0f443d4dce1765ad6a59eaadd0e4d123228_prof);

    }

    public function getTemplateName()
    {
        return "BackendBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("Hello World!
", "BackendBundle:Default:index.html.twig", "/home/ubuntu/workspace/s3a2/src/BackendBundle/Resources/views/Default/index.html.twig");
    }
}

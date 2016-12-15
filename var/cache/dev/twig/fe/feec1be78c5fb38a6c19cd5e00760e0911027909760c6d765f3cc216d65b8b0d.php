<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_363d13b21ba0fc78cdc819fb2e9e7e26c03da51f711cfdd28bb020ef9f855037 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_313207ec09defdc53b365fb661302c6c6e7f2fb3c83d0caf0f36dc58659c69ee = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_313207ec09defdc53b365fb661302c6c6e7f2fb3c83d0caf0f36dc58659c69ee->enter($__internal_313207ec09defdc53b365fb661302c6c6e7f2fb3c83d0caf0f36dc58659c69ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_313207ec09defdc53b365fb661302c6c6e7f2fb3c83d0caf0f36dc58659c69ee->leave($__internal_313207ec09defdc53b365fb661302c6c6e7f2fb3c83d0caf0f36dc58659c69ee_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_a79a2f7ffe3bef0436465424cc2c1d8bc20b513a9edcd9aa5d64bcab25fc980c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a79a2f7ffe3bef0436465424cc2c1d8bc20b513a9edcd9aa5d64bcab25fc980c->enter($__internal_a79a2f7ffe3bef0436465424cc2c1d8bc20b513a9edcd9aa5d64bcab25fc980c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_a79a2f7ffe3bef0436465424cc2c1d8bc20b513a9edcd9aa5d64bcab25fc980c->leave($__internal_a79a2f7ffe3bef0436465424cc2c1d8bc20b513a9edcd9aa5d64bcab25fc980c_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_4388ddfb1d2527a746b16213b3e45aa811538f79f889b9ec6267dc173181e372 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4388ddfb1d2527a746b16213b3e45aa811538f79f889b9ec6267dc173181e372->enter($__internal_4388ddfb1d2527a746b16213b3e45aa811538f79f889b9ec6267dc173181e372_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_4388ddfb1d2527a746b16213b3e45aa811538f79f889b9ec6267dc173181e372->leave($__internal_4388ddfb1d2527a746b16213b3e45aa811538f79f889b9ec6267dc173181e372_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_4f947297126f1f6b99e175e1bf4130644fd407e511bce85f474e9797b0d9f1a8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f947297126f1f6b99e175e1bf4130644fd407e511bce85f474e9797b0d9f1a8->enter($__internal_4f947297126f1f6b99e175e1bf4130644fd407e511bce85f474e9797b0d9f1a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_4f947297126f1f6b99e175e1bf4130644fd407e511bce85f474e9797b0d9f1a8->leave($__internal_4f947297126f1f6b99e175e1bf4130644fd407e511bce85f474e9797b0d9f1a8_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/home/ubuntu/workspace/s3a2/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}

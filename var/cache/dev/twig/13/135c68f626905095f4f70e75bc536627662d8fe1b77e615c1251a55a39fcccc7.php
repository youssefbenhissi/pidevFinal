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

/* @projet/gestion/modifierParents.html.twig */
class __TwigTemplate_ebff32dba848c7f09c6d08d589464471f0d5aefd101d0eb12724ec4adf4d9eb7 extends \Twig\Template
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
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@projet/gestion/modifierParents.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@projet/gestion/modifierParents.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "@projet/gestion/modifierParents.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <section class=\"hero-wrap hero-wrap-2\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/images/unnamed.jpg"), "html", null, true);
        echo "\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
            <div class=\"row no-gutters slider-text align-items-center justify-content-center\">
                <div class=\"col-md-9 ftco-animate text-center\">
                    <h1 class=\"mb-2 bread\">Modifier votre compte</h1>
                    <p class=\"breadcrumbs\"><span class=\"mr-2\"><a href=\"index.html\">Home <i class=\"ion-ios-arrow-forward\"></i></a></span> <span>Contact <i class=\"ion-ios-arrow-forward\"></i></span></p>
                </div>
            </div>
        </div>
    </section>



    <section class=\"ftco-section ftco-no-pt ftco-no-pb contact-section\">
        <div class=\"container\">
            <div class=\"row d-flex align-items-stretch no-gutters\">
                <div class=\"col-md-9 p-4 p-md-5 order-md-last bg-light\" style=\"margin: auto;
                width: 50%;
                padding: 10px;\">
                    ";
        // line 24
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["f"] ?? $this->getContext($context, "f")), 'form_start');
        echo "
                    <div class=\"form-group\">
                        ";
        // line 26
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["f"] ?? $this->getContext($context, "f")), "nom", []), 'row', ["attr" => ["class" => "form-control", "placeholder" => "nom", "disabled" => "disabled"]]);
        echo "

                    </div>
                    <div class=\"form-group\">
                        ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["f"] ?? $this->getContext($context, "f")), "prenom", []), 'row', ["attr" => ["class" => "form-control", "placeholder" => "prenom", "disabled" => "disabled"]]);
        echo "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["f"] ?? $this->getContext($context, "f")), "numTelephone", []), 'row', ["attr" => ["class" => "form-control", "placeholder" => "numtelephone"]]);
        echo "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["f"] ?? $this->getContext($context, "f")), "adressMail", []), 'row', ["attr" => ["class" => "form-control", "placeholder" => "adressMail"]]);
        echo "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["f"] ?? $this->getContext($context, "f")), "Modifier", []), 'row', ["attr" => ["class" => "btn btn-primary py-3 px-5", "value" => "modifier"]]);
        echo "
                    </div>
                    ";
        // line 41
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["f"] ?? $this->getContext($context, "f")), 'form_end');
        echo "
                </div>

            </div>
        </div>
    </section>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@projet/gestion/modifierParents.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 41,  114 => 39,  108 => 36,  102 => 33,  96 => 30,  89 => 26,  84 => 24,  60 => 4,  51 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block content %}
    <section class=\"hero-wrap hero-wrap-2\" style=\"background-image: url({{ asset ('assets/images/unnamed.jpg') }}\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
            <div class=\"row no-gutters slider-text align-items-center justify-content-center\">
                <div class=\"col-md-9 ftco-animate text-center\">
                    <h1 class=\"mb-2 bread\">Modifier votre compte</h1>
                    <p class=\"breadcrumbs\"><span class=\"mr-2\"><a href=\"index.html\">Home <i class=\"ion-ios-arrow-forward\"></i></a></span> <span>Contact <i class=\"ion-ios-arrow-forward\"></i></span></p>
                </div>
            </div>
        </div>
    </section>



    <section class=\"ftco-section ftco-no-pt ftco-no-pb contact-section\">
        <div class=\"container\">
            <div class=\"row d-flex align-items-stretch no-gutters\">
                <div class=\"col-md-9 p-4 p-md-5 order-md-last bg-light\" style=\"margin: auto;
                width: 50%;
                padding: 10px;\">
                    {{ form_start(f) }}
                    <div class=\"form-group\">
                        {{ form_row(f.nom, {'attr': {'class': 'form-control','placeholder':'nom','disabled':'disabled'} }) }}

                    </div>
                    <div class=\"form-group\">
                        {{ form_row(f.prenom, {'attr': {'class': 'form-control','placeholder':'prenom','disabled':'disabled'} }) }}
                    </div>
                    <div class=\"form-group\">
                        {{ form_row(f.numTelephone, {'attr': {'class': 'form-control','placeholder':'numtelephone'} }) }}
                    </div>
                    <div class=\"form-group\">
                        {{ form_row(f.adressMail, {'attr': {'class': 'form-control','placeholder':'adressMail'} }) }}
                    </div>
                    <div class=\"form-group\">
                        {{ form_row(f.Modifier, {'attr': {'class': 'btn btn-primary py-3 px-5','value':'modifier'}}) }}
                    </div>
                    {{ form_end(f) }}
                </div>

            </div>
        </div>
    </section>

{% endblock %}", "@projet/gestion/modifierParents.html.twig", "C:\\xampp\\htdocs\\pidev4\\src\\projetBundle\\Resources\\views\\gestion\\modifierParents.html.twig");
    }
}

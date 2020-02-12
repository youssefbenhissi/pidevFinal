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

/* @admin/Dashboard/ajouterE.html.twig */
class __TwigTemplate_bd35d3b1cf5378509d0c1989712c54edd1bc693ed371a6bc87b399836372d732 extends \Twig\Template
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
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Dashboard/ajouterE.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Dashboard/ajouterE.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "@admin/Dashboard/ajouterE.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "    <section id=\"main-content\">
        <section class=\"wrapper\">
            <h3><i class=\"fa fa-angle-right\"></i> Form Validation</h3>
            <div class=\"row mt\">
                <div class=\"col-lg-12\">
                    <h4><i class=\"fa fa-angle-right\"></i>Ajouter Club</h4>
                    <div class=\"form-panel\">
                        <div class=\" form\">
                            ";
        // line 11
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start', ["attr" => ["class" => "cmxform form-horizontal style-form"]]);
        echo "
                            <div class=\"form-group \">

                                <div class=\"col-lg-10\">
                                    ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "nom", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                                </div>
                            </div>
                            <div class=\"form-group \">
                                                               <div class=\"col-lg-10\">
                                    ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "prenom", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                                </div>
                            </div>
                            <div class=\"form-group \">

                                <div class=\"col-lg-10\">
                                    ";
        // line 26
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "adressMail", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"col-lg-offset-2 col-lg-10\">
                                    ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "Ajouter", []), 'row', ["attr" => ["class" => "btn btn-theme", "style" => "float:left;"]]);
        echo "
                                    </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"col-lg-offset-2 col-lg-10\">
                                    ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "Ajouter", []), 'row', ["attr" => ["class" => "btn btn-theme", "style" => "float:left;", "id" => "mus"]]);
        echo "
                                </div>
                            </div>
                            ";
        // line 39
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "
                        </div>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <script>
        \$(\"#mus\").hide();
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@admin/Dashboard/ajouterE.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 39,  110 => 36,  102 => 31,  94 => 26,  85 => 20,  77 => 15,  70 => 11,  60 => 3,  51 => 2,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}
{% block content %}
    <section id=\"main-content\">
        <section class=\"wrapper\">
            <h3><i class=\"fa fa-angle-right\"></i> Form Validation</h3>
            <div class=\"row mt\">
                <div class=\"col-lg-12\">
                    <h4><i class=\"fa fa-angle-right\"></i>Ajouter Club</h4>
                    <div class=\"form-panel\">
                        <div class=\" form\">
                            {{   form_start(form, {'attr': {'class': 'cmxform form-horizontal style-form'} }) }}
                            <div class=\"form-group \">

                                <div class=\"col-lg-10\">
                                    {{ form_row(form.nom, {'attr': {'class': 'form-control'} }) }}
                                </div>
                            </div>
                            <div class=\"form-group \">
                                                               <div class=\"col-lg-10\">
                                    {{ form_row(form.prenom, {'attr': {'class': 'form-control'} }) }}
                                </div>
                            </div>
                            <div class=\"form-group \">

                                <div class=\"col-lg-10\">
                                    {{ form_row(form.adressMail, {'attr': {'class': 'form-control'} }) }}
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"col-lg-offset-2 col-lg-10\">
                                    {{ form_row(form.Ajouter, {'attr': {'class': 'btn btn-theme','style':'float:left;'} }) }}
                                    </div>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"col-lg-offset-2 col-lg-10\">
                                    {{ form_row(form.Ajouter, {'attr': {'class': 'btn btn-theme','style':'float:left;','id':'mus'} }) }}
                                </div>
                            </div>
                            {{ form_end(form) }}
                        </div>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <script>
        \$(\"#mus\").hide();
    </script>
{% endblock %}", "@admin/Dashboard/ajouterE.html.twig", "C:\\xampp\\htdocs\\pidev4\\src\\adminBundle\\Resources\\views\\Dashboard\\ajouterE.html.twig");
    }
}

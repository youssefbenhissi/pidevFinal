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

/* @projet/personnel/afficher_personnel.html.twig */
class __TwigTemplate_83756823d2f2b15cbc715b2febca681c7032aee7dc3d9fc98a36da39bf772d36 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@projet/personnel/afficher_personnel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@projet/personnel/afficher_personnel.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "@projet/personnel/afficher_personnel.html.twig", 1);
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
        echo "    <section class=\"hero-wrap hero-wrap-2\" style=\"background-image: url('images/bg_2.jpg');\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
            <div class=\"row no-gutters slider-text align-items-center justify-content-center\">
                <div class=\"col-md-9 ftco-animate text-center\">
                    <h1 class=\"mb-2 bread\">Certified Teachers</h1>
                    <p class=\"breadcrumbs\"><span class=\"mr-2\"><a href=\"index.html\">Home <i class=\"ion-ios-arrow-forward\"></i></a></span> <span>Teachers <i class=\"ion-ios-arrow-forward\"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class=\"ftco-section ftco-no-pb\">
    <div class=\"container\">
    <div class=\"row\">
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["p"] ?? $this->getContext($context, "p")));
        foreach ($context['_seq'] as $context["_key"] => $context["per"]) {
            // line 19
            echo "        <div class=\"col-md-6 col-lg-3 ftco-animate\">
            <div class=\"staff\">
                <div class=\"img-wrap d-flex align-items-stretch\">
                    <div class=\"img align-self-stretch\" style=\"background-image: url(images/teacher-1.jpg);\"></div>
                </div>
                <div class=\"text pt-3 text-center\">
                    <h3>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["per"], "prenom", []), "html", null, true);
            echo "</h3>
                    <span class=\"position mb-2\">";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["per"], "nom", []), "html", null, true);
            echo "</span>
                    <div class=\"faded\">
                        <p>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["per"], "description", []), "html", null, true);
            echo "</p>
                        <ul class=\"ftco-social text-center\">
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-google-plus\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-instagram\"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['per'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </div></div></section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@projet/personnel/afficher_personnel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 40,  97 => 28,  92 => 26,  88 => 25,  80 => 19,  76 => 18,  60 => 4,  51 => 3,  29 => 1,);
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
    <section class=\"hero-wrap hero-wrap-2\" style=\"background-image: url('images/bg_2.jpg');\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
            <div class=\"row no-gutters slider-text align-items-center justify-content-center\">
                <div class=\"col-md-9 ftco-animate text-center\">
                    <h1 class=\"mb-2 bread\">Certified Teachers</h1>
                    <p class=\"breadcrumbs\"><span class=\"mr-2\"><a href=\"index.html\">Home <i class=\"ion-ios-arrow-forward\"></i></a></span> <span>Teachers <i class=\"ion-ios-arrow-forward\"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class=\"ftco-section ftco-no-pb\">
    <div class=\"container\">
    <div class=\"row\">
        {% for per in p %}
        <div class=\"col-md-6 col-lg-3 ftco-animate\">
            <div class=\"staff\">
                <div class=\"img-wrap d-flex align-items-stretch\">
                    <div class=\"img align-self-stretch\" style=\"background-image: url(images/teacher-1.jpg);\"></div>
                </div>
                <div class=\"text pt-3 text-center\">
                    <h3>{{ per.prenom }}</h3>
                    <span class=\"position mb-2\">{{ per.nom }}</span>
                    <div class=\"faded\">
                        <p>{{ per.description }}</p>
                        <ul class=\"ftco-social text-center\">
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-google-plus\"></span></a></li>
                            <li class=\"ftco-animate\"><a href=\"#\"><span class=\"icon-instagram\"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>{% endfor %}
    </div></div></section>
{% endblock %}", "@projet/personnel/afficher_personnel.html.twig", "C:\\xampp\\htdocs\\pidev4\\src\\projetBundle\\Resources\\views\\personnel\\afficher_personnel.html.twig");
    }
}

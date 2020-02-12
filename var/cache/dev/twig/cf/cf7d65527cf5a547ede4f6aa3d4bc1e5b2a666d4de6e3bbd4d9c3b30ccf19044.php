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

/* @admin/Dashboard/afficher.html.twig */
class __TwigTemplate_ed781dacf560b1bbf9f05231dcce309d6f5d1606ced2bee22d6a8fea273238b3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Dashboard/afficher.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Dashboard/afficher.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "@admin/Dashboard/afficher.html.twig", 1);
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
        echo "    <!-- row -->
    <section id=\"main-content\">
        <section class=\"wrapper\">
            <div class=\"row mt\">
                <div class=\"col-md-12\">
                    <div class=\"content-panel\">
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Eleves</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class=\"fa fa-bullhorn\"></i> ID </th>
                                <th class=\"hidden-phone\">Nom </th>
                                <th><i class=\" fa fa-edit\"></i> prenom</th>
                                <th><i class=\" aa-edit\"></i> Adresse Mail</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["e"] ?? $this->getContext($context, "e")));
        foreach ($context['_seq'] as $context["_key"] => $context["ee"]) {
            // line 23
            echo "                                <tr>
                                    <td>
                                        <a href=\"basic_table.html#\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["ee"], "id", []), "html", null, true);
            echo "</a>
                                    </td>
                                    <td class=\"hidden-phone\">";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["ee"], "nom", []), "html", null, true);
            echo "</td>
                                    <th><i class=\" fa fa-edit\"></i> ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["ee"], "prenom", []), "html", null, true);
            echo "</th>
                                    <th><i class=\" aa-edit\"></i> ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["ee"], "adressMail", []), "html", null, true);
            echo "</th>
                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td>
                                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("modifierE", ["id" => $this->getAttribute($context["ee"], "id", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                                        <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("supprimerE", ["id" => $this->getAttribute($context["ee"], "id", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a>                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ee'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                            </tbody>
                        </table>
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Parents</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class=\"fa fa-bullhorn\"></i> ID </th>
                                <th class=\"hidden-phone\">Nom</th>
                                <th class=\"hidden-phone\">Prenom</th>
                                <th class=\"hidden-phone\">NumTelephone</th>
                                <th class=\"hidden-phone\">AdresseMail</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["pa"]);
        foreach ($context['_seq'] as $context["_key"] => $context["pa"]) {
            // line 54
            echo "                                <tr>
                                    <td>
                                        <a href=\"basic_table.html#\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "id", []), "html", null, true);
            echo "</a>
                                    </td>
                                    <td class=\"hidden-phone\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "nom", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "prenom", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "numTelephone", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "adressMail", []), "html", null, true);
            echo "</td>

                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td>
                                        <a href=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("modifierP", ["id" => $this->getAttribute($context["pa"], "id", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                                        <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("supprimerP", ["id" => $this->getAttribute($context["pa"], "id", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a>
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pa'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                            </tbody>
                        </table>
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Personnels</h4>
                            <hr>
                            <thead>
                            <tr>

                                <th class=\"hidden-phone\">Matricule</th>
                                <th class=\"hidden-phone\">Nom</th>
                                <th class=\"hidden-phone\">Prenom</th>
                                <th class=\"hidden-phone\">Date Debut Travail</th>
                                <th class=\"hidden-phone\">Solde de Conge</th>
                                <th><i class=\" fa fa-edit\"></i> type</th>
                                <th><i class=\" fa fa-edit\"></i> description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["p"] ?? $this->getContext($context, "p")));
        foreach ($context['_seq'] as $context["_key"] => $context["pp"]) {
            // line 90
            echo "                                <tr>

                                    <td class=\"hidden-phone\">";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "matricule", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "nom", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "prenom", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 95
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["pp"], "dateDebTravail", [])), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "soldeConge", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "type", []), "html", null, true);
            echo "</td>
                                    <td class=\"hidden-phone\">";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($context["pp"], "description", []), "html", null, true);
            echo "</td>
                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td><a href=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("modifierPer", ["id" => $this->getAttribute($context["pp"], "matricule", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a></td>
                                    <td><a href=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("supprimerPer", ["id" => $this->getAttribute($context["pp"], "matricule", [])]), "html", null, true);
            echo "\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "                            </tbody>
                        </table>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@admin/Dashboard/afficher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 104,  248 => 101,  244 => 100,  239 => 98,  235 => 97,  231 => 96,  227 => 95,  223 => 94,  219 => 93,  215 => 92,  211 => 90,  207 => 89,  186 => 70,  176 => 66,  172 => 65,  165 => 61,  161 => 60,  157 => 59,  153 => 58,  148 => 56,  144 => 54,  140 => 53,  121 => 36,  112 => 33,  108 => 32,  102 => 29,  98 => 28,  94 => 27,  89 => 25,  85 => 23,  81 => 22,  60 => 3,  51 => 2,  29 => 1,);
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
    <!-- row -->
    <section id=\"main-content\">
        <section class=\"wrapper\">
            <div class=\"row mt\">
                <div class=\"col-md-12\">
                    <div class=\"content-panel\">
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Eleves</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class=\"fa fa-bullhorn\"></i> ID </th>
                                <th class=\"hidden-phone\">Nom </th>
                                <th><i class=\" fa fa-edit\"></i> prenom</th>
                                <th><i class=\" aa-edit\"></i> Adresse Mail</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for ee in e %}
                                <tr>
                                    <td>
                                        <a href=\"basic_table.html#\">{{ ee.id }}</a>
                                    </td>
                                    <td class=\"hidden-phone\">{{ ee.nom }}</td>
                                    <th><i class=\" fa fa-edit\"></i> {{ ee.prenom  }}</th>
                                    <th><i class=\" aa-edit\"></i> {{ ee.adressMail  }}</th>
                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td>
                                        <a href=\"{{ path('modifierE',{'id':ee.id}) }}\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                                        <a href=\"{{ path('supprimerE',{'id':ee.id}) }}\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a>                                    </td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Parents</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class=\"fa fa-bullhorn\"></i> ID </th>
                                <th class=\"hidden-phone\">Nom</th>
                                <th class=\"hidden-phone\">Prenom</th>
                                <th class=\"hidden-phone\">NumTelephone</th>
                                <th class=\"hidden-phone\">AdresseMail</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for pa in pa %}
                                <tr>
                                    <td>
                                        <a href=\"basic_table.html#\">{{ pa.id }}</a>
                                    </td>
                                    <td class=\"hidden-phone\">{{ pa.nom }}</td>
                                    <td class=\"hidden-phone\">{{ pa.prenom }}</td>
                                    <td class=\"hidden-phone\">{{ pa.numTelephone}}</td>
                                    <td class=\"hidden-phone\">{{ pa.adressMail}}</td>

                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td>
                                        <a href=\"{{ path('modifierP',{'id':pa.id}) }}\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                                        <a href=\"{{ path('supprimerP',{'id':pa.id}) }}\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a>
                                    </td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                        <table class=\"table table-striped table-advance table-hover\">
                            <h4><i class=\"fa fa-angle-right\"></i> Table des Personnels</h4>
                            <hr>
                            <thead>
                            <tr>

                                <th class=\"hidden-phone\">Matricule</th>
                                <th class=\"hidden-phone\">Nom</th>
                                <th class=\"hidden-phone\">Prenom</th>
                                <th class=\"hidden-phone\">Date Debut Travail</th>
                                <th class=\"hidden-phone\">Solde de Conge</th>
                                <th><i class=\" fa fa-edit\"></i> type</th>
                                <th><i class=\" fa fa-edit\"></i> description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for pp in p %}
                                <tr>

                                    <td class=\"hidden-phone\">{{ pp.matricule }}</td>
                                    <td class=\"hidden-phone\">{{ pp.nom }}</td>
                                    <td class=\"hidden-phone\">{{ pp.prenom }}</td>
                                    <td class=\"hidden-phone\">{{ pp.dateDebTravail |date}}</td>
                                    <td class=\"hidden-phone\">{{ pp.soldeConge }}</td>
                                    <td class=\"hidden-phone\">{{ pp.type }}</td>
                                    <td class=\"hidden-phone\">{{ pp.description }}</td>
                                    <td><span class=\"label label-info label-mini\">Due</span></td>
                                    <td><a href=\"{{ path('modifierPer',{'id':pp.matricule}) }}\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a></td>
                                    <td><a href=\"{{ path('supprimerPer',{'id':pp.matricule}) }}\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o \"></i></button></a></td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
{% endblock %}", "@admin/Dashboard/afficher.html.twig", "C:\\xampp\\htdocs\\pidev4\\src\\adminBundle\\Resources\\views\\Dashboard\\afficher.html.twig");
    }
}

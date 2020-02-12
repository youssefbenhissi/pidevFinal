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

/* layout.html.twig */
class __TwigTemplate_8ccb6f269472ddb696ae93465d330e2141559b01387d73119291d7b518a31843 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"Dashboard\">
    <meta name=\"keyword\" content=\"Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina\">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link rel=\"icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/img/favicon.png "), "html", null, true);
        echo "\" >
    <link rel=\"apple-touch-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/img/apple-touch-icon.png "), "html", null, true);
        echo "\" >

    <!-- Bootstrap core CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/bootstrap/css/bootstrap.min.css "), "html", null, true);
        echo "\" >
    <!--external css-->
    <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/font-awesome/css/font-awesome.css "), "html", null, true);
        echo "\" >
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/css/zabuto_calendar.css "), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/gritter/css/jquery.gritter.css "), "html", null, true);
        echo "\" />
    <!-- Custom styles for this template -->
    <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/css/style.css "), "html", null, true);
        echo "\" >
    <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/css/style-responsive.css "), "html", null, true);
        echo "\" >
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/chart-master/Chart.js "), "html", null, true);
        echo "\"></script>
</head>

<body>
<section id=\"container\">
    <!-- ****************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        ***************************************************** -->
    <!--header start-->
    <header class=\"header black-bg\">
        <div class=\"sidebar-toggle-box\">
            <div class=\"fa fa-bars tooltips\" data-placement=\"right\" data-original-title=\"Toggle Navigation\"></div>
        </div>
        <!--logo start-->
        <a href=\"";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_homepage");
        echo "\" class=\"logo\"><b>DASH<span>IO</span></b></a>
        <!--logo end-->
        <div class=\"nav notify-row\" id=\"top_menu\">
            <!--  notification start -->
            <ul class=\"nav top-menu\">
                <!-- settings start -->
                <li class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_homepage");
        echo "\">
                        <i class=\"fa fa-tasks\"></i>
                        <span class=\"badge bg-theme\">4</span>
                    </a>
                    <ul class=\"dropdown-menu extended tasks-bar\">
                        <div class=\"notify-arrow notify-arrow-green\"></div>
                        <li>
                            <p class=\"green\">You have 4 pending tasks</p>
                        </li>
                        <li>
                            <a href=\"";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_homepage");
        echo "\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Dashio Admin Panel</div>
                                    <div class=\"percent\">40%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                                        <span class=\"sr-only\">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Database Update</div>
                                    <div class=\"percent\">60%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"60\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%\">
                                        <span class=\"sr-only\">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Product Development</div>
                                    <div class=\"percent\">80%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\"
                                         aria-valuemax=\"100\" style=\"width: 80%\">
                                        <span class=\"sr-only\">80% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Payments Sent</div>
                                    <div class=\"percent\">70%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"70\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 70%\">
                                        <span class=\"sr-only\">70% Complete (Important)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"external\">
                            <a href=\"#\">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id=\"header_inbox_bar\" class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"index.html#\">
                        <i class=\"fa fa-envelope-o\"></i>
                        <span class=\"badge bg-theme\">5</span>
                    </a>
                    <ul class=\"dropdown-menu extended inbox\">
                        <div class=\"notify-arrow notify-arrow-green\"></div>
                        <li>
                            <p class=\"green\">You have 5 new messages</p>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-zac.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Zac Snider</span>
                    <span class=\"time\">Just now</span>
                  </span>
                                <span class=\"message\">
                    Hi mate, how is everything?
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-divya.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Divya Manian</span>
                    <span class=\"time\">40 mins.</span>
                  </span>
                                <span class=\"message\">
                    Hi, I need your help with this.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-danro.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Dan Rogers</span>
                    <span class=\"time\">2 hrs.</span>
                  </span>
                                <span class=\"message\">
                    Love your new Dashboard.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-sherman.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Dj Sherman</span>
                    <span class=\"time\">4 hrs.</span>
                  </span>
                                <span class=\"message\">
                    Please, answer asap.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id=\"header_notification_bar\" class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"index.html#\">
                        <i class=\"fa fa-bell-o\"></i>
                        <span class=\"badge bg-warning\">7</span>
                    </a>
                    <ul class=\"dropdown-menu extended notification\">
                        <div class=\"notify-arrow notify-arrow-yellow\"></div>
                        <li>
                            <p class=\"yellow\">You have 7 new notifications</p>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-danger\"><i class=\"fa fa-bolt\"></i></span>
                                Server Overloaded.
                                <span class=\"small italic\">4 mins.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-warning\"><i class=\"fa fa-bell\"></i></span>
                                Memory #2 Not Responding.
                                <span class=\"small italic\">30 mins.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-danger\"><i class=\"fa fa-bolt\"></i></span>
                                Disk Space Reached 85%.
                                <span class=\"small italic\">2 hrs.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-success\"><i class=\"fa fa-plus\"></i></span>
                                New User Registered.
                                <span class=\"small italic\">3 hrs.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">See all notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class=\"top-menu\">
            <ul class=\"nav pull-right top-menu\">
                <li><a class=\"logout\" href=\"login.html\">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- ****************************************************
        MAIN SIDEBAR MENU
        ***************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id=\"sidebar\" class=\"nav-collapse \">
            <!-- sidebar menu start-->
            <ul class=\"sidebar-menu\" id=\"nav-accordion\">
                <li class=\"mt\">
                    <a class=\"active\" href=\"";
        // line 246
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_homepage");
        echo "\">
                        <i class=\"fa fa-dashboard\"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class=\"sub-menu\">
                    <a href=\"javascript:;\">
                        <i class=\"fa fa-th\"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class=\"sub\">
                        <li><a href=\"";
        // line 257
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("afficher_per");
        echo "\">gerer catégorie des clubs</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    ";
        // line 265
        $this->displayBlock('content', $context, $blocks);
        // line 266
        echo "    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<link rel=\"stylesheet\" href=\"";
        // line 269
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/bootstrap/css/bootstrap.min.css "), "html", null, true);
        echo "\" >
<script src=\"";
        // line 270
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 272
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script class=\"include\" type=\"text/javascript\" src=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/jquery.dcjqaccordion.2.7.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 274
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/jquery.scrollTo.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 275
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/jquery.nicescroll.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 276
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/jquery.sparkline.js"), "html", null, true);
        echo "\"></script>
<!--common script for all pages-->
<script src=\"";
        // line 278
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/common-scripts.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 279
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/gritter/js/jquery.gritter.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 280
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/gritter-conf.js"), "html", null, true);
        echo "\"></script>
<!--script for this page-->
<script src=\"";
        // line 282
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/sparkline-chart.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 283
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assetsDashio/lib/zabuto_calendar.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    \$(document).ready(function () {

        return false;
    });
</script>
<script type=\"application/javascript\">
    \$(document).ready(function () {
        \$(\"#date-popover\").popover({
            html: true,
            trigger: \"manual\"
        });
        \$(\"#date-popover\").hide();
        \$(\"#date-popover\").click(function (e) {
            \$(this).hide();
        });

        \$(\"#my-calendar\").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: \"show_data.php?action=1\",
                modal: true
            },
            legend: [{
                type: \"text\",
                label: \"Special event\",
                badge: \"00\"
            },
                {
                    type: \"block\",
                    label: \"Regular event\",
                }
            ]
        });
    });

    function myNavFunction(id) {
        \$(\"#date-popover\").hide();
        var nav = \$(\"#\" + id).data(\"navigation\");
        var to = \$(\"#\" + id).data(\"to\");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
</body>

</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 265
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  461 => 265,  399 => 283,  395 => 282,  390 => 280,  386 => 279,  382 => 278,  377 => 276,  373 => 275,  369 => 274,  365 => 273,  361 => 272,  356 => 270,  352 => 269,  347 => 266,  345 => 265,  334 => 257,  320 => 246,  127 => 56,  114 => 46,  104 => 39,  87 => 25,  83 => 24,  79 => 23,  74 => 21,  70 => 20,  66 => 19,  61 => 17,  55 => 14,  51 => 13,  37 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"Dashboard\">
    <meta name=\"keyword\" content=\"Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina\">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link rel=\"icon\" href=\"{{ asset('assetsDashio/img/favicon.png ') }}\" >
    <link rel=\"apple-touch-icon\" href=\"{{ asset('assetsDashio/img/apple-touch-icon.png ') }}\" >

    <!-- Bootstrap core CSS -->
    <link rel=\"stylesheet\" href=\"{{ asset ('assetsDashio/lib/bootstrap/css/bootstrap.min.css ') }}\" >
    <!--external css-->
    <link rel=\"stylesheet\" href=\"{{ asset ('assetsDashio/lib/font-awesome/css/font-awesome.css ') }}\" >
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset ('assetsDashio/css/zabuto_calendar.css ') }}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset ('assetsDashio/lib/gritter/css/jquery.gritter.css ') }}\" />
    <!-- Custom styles for this template -->
    <link rel=\"stylesheet\" href=\"{{ asset ('assetsDashio/css/style.css ') }}\" >
    <link rel=\"stylesheet\" href=\"{{ asset ('assetsDashio/css/style-responsive.css ') }}\" >
    <script src=\"{{ asset ('assetsDashio/lib/chart-master/Chart.js ') }}\"></script>
</head>

<body>
<section id=\"container\">
    <!-- ****************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        ***************************************************** -->
    <!--header start-->
    <header class=\"header black-bg\">
        <div class=\"sidebar-toggle-box\">
            <div class=\"fa fa-bars tooltips\" data-placement=\"right\" data-original-title=\"Toggle Navigation\"></div>
        </div>
        <!--logo start-->
        <a href=\"{{ path('admin_homepage') }}\" class=\"logo\"><b>DASH<span>IO</span></b></a>
        <!--logo end-->
        <div class=\"nav notify-row\" id=\"top_menu\">
            <!--  notification start -->
            <ul class=\"nav top-menu\">
                <!-- settings start -->
                <li class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"{{ path('admin_homepage') }}\">
                        <i class=\"fa fa-tasks\"></i>
                        <span class=\"badge bg-theme\">4</span>
                    </a>
                    <ul class=\"dropdown-menu extended tasks-bar\">
                        <div class=\"notify-arrow notify-arrow-green\"></div>
                        <li>
                            <p class=\"green\">You have 4 pending tasks</p>
                        </li>
                        <li>
                            <a href=\"{{ path('admin_homepage') }}\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Dashio Admin Panel</div>
                                    <div class=\"percent\">40%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                                        <span class=\"sr-only\">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Database Update</div>
                                    <div class=\"percent\">60%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"60\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%\">
                                        <span class=\"sr-only\">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Product Development</div>
                                    <div class=\"percent\">80%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\"
                                         aria-valuemax=\"100\" style=\"width: 80%\">
                                        <span class=\"sr-only\">80% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <div class=\"task-info\">
                                    <div class=\"desc\">Payments Sent</div>
                                    <div class=\"percent\">70%</div>
                                </div>
                                <div class=\"progress progress-striped\">
                                    <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"70\"
                                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 70%\">
                                        <span class=\"sr-only\">70% Complete (Important)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class=\"external\">
                            <a href=\"#\">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id=\"header_inbox_bar\" class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"index.html#\">
                        <i class=\"fa fa-envelope-o\"></i>
                        <span class=\"badge bg-theme\">5</span>
                    </a>
                    <ul class=\"dropdown-menu extended inbox\">
                        <div class=\"notify-arrow notify-arrow-green\"></div>
                        <li>
                            <p class=\"green\">You have 5 new messages</p>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-zac.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Zac Snider</span>
                    <span class=\"time\">Just now</span>
                  </span>
                                <span class=\"message\">
                    Hi mate, how is everything?
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-divya.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Divya Manian</span>
                    <span class=\"time\">40 mins.</span>
                  </span>
                                <span class=\"message\">
                    Hi, I need your help with this.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-danro.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Dan Rogers</span>
                    <span class=\"time\">2 hrs.</span>
                  </span>
                                <span class=\"message\">
                    Love your new Dashboard.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"photo\"><img alt=\"avatar\" src=\"img/ui-sherman.jpg\"></span>
                                <span class=\"subject\">
                    <span class=\"from\">Dj Sherman</span>
                    <span class=\"time\">4 hrs.</span>
                  </span>
                                <span class=\"message\">
                    Please, answer asap.
                  </span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id=\"header_notification_bar\" class=\"dropdown\">
                    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"index.html#\">
                        <i class=\"fa fa-bell-o\"></i>
                        <span class=\"badge bg-warning\">7</span>
                    </a>
                    <ul class=\"dropdown-menu extended notification\">
                        <div class=\"notify-arrow notify-arrow-yellow\"></div>
                        <li>
                            <p class=\"yellow\">You have 7 new notifications</p>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-danger\"><i class=\"fa fa-bolt\"></i></span>
                                Server Overloaded.
                                <span class=\"small italic\">4 mins.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-warning\"><i class=\"fa fa-bell\"></i></span>
                                Memory #2 Not Responding.
                                <span class=\"small italic\">30 mins.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-danger\"><i class=\"fa fa-bolt\"></i></span>
                                Disk Space Reached 85%.
                                <span class=\"small italic\">2 hrs.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">
                                <span class=\"label label-success\"><i class=\"fa fa-plus\"></i></span>
                                New User Registered.
                                <span class=\"small italic\">3 hrs.</span>
                            </a>
                        </li>
                        <li>
                            <a href=\"index.html#\">See all notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class=\"top-menu\">
            <ul class=\"nav pull-right top-menu\">
                <li><a class=\"logout\" href=\"login.html\">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- ****************************************************
        MAIN SIDEBAR MENU
        ***************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id=\"sidebar\" class=\"nav-collapse \">
            <!-- sidebar menu start-->
            <ul class=\"sidebar-menu\" id=\"nav-accordion\">
                <li class=\"mt\">
                    <a class=\"active\" href=\"{{ path('admin_homepage') }}\">
                        <i class=\"fa fa-dashboard\"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class=\"sub-menu\">
                    <a href=\"javascript:;\">
                        <i class=\"fa fa-th\"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class=\"sub\">
                        <li><a href=\"{{ path('afficher_per') }}\">gerer catégorie des clubs</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    {% block content %}{% endblock %}
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<link rel=\"stylesheet\" href=\"{{ asset ('assetsDashio/lib/bootstrap/css/bootstrap.min.css ') }}\" >
<script src=\"{{ asset ('assetsDashio/lib/jquery/jquery.min.js') }}\"></script>

<script src=\"{{ asset('assetsDashio/lib/bootstrap/js/bootstrap.min.js') }}\"></script>
<script class=\"include\" type=\"text/javascript\" src=\"{{ asset ('assetsDashio/lib/jquery.dcjqaccordion.2.7.js') }}\"></script>
<script src=\"{{ asset ('assetsDashio/lib/jquery.scrollTo.min.js') }}\"></script>
<script src=\"{{ asset ('assetsDashio/lib/jquery.nicescroll.js') }}\" type=\"text/javascript\"></script>
<script src=\"{{ asset ('assetsDashio/lib/jquery.sparkline.js') }}\"></script>
<!--common script for all pages-->
<script src=\"{{ asset ('assetsDashio/lib/common-scripts.js') }}\"></script>
<script type=\"text/javascript\" src=\"{{ asset ('assetsDashio/lib/gritter/js/jquery.gritter.js') }}\"></script>
<script type=\"text/javascript\" src=\"{{ asset ('assetsDashio/lib/gritter-conf.js') }}\"></script>
<!--script for this page-->
<script src=\"{{ asset ('assetsDashio/lib/sparkline-chart.js') }}\"></script>
<script src=\"{{ asset ('assetsDashio/lib/zabuto_calendar.js') }}\"></script>
<script type=\"text/javascript\">
    \$(document).ready(function () {

        return false;
    });
</script>
<script type=\"application/javascript\">
    \$(document).ready(function () {
        \$(\"#date-popover\").popover({
            html: true,
            trigger: \"manual\"
        });
        \$(\"#date-popover\").hide();
        \$(\"#date-popover\").click(function (e) {
            \$(this).hide();
        });

        \$(\"#my-calendar\").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: \"show_data.php?action=1\",
                modal: true
            },
            legend: [{
                type: \"text\",
                label: \"Special event\",
                badge: \"00\"
            },
                {
                    type: \"block\",
                    label: \"Regular event\",
                }
            ]
        });
    });

    function myNavFunction(id) {
        \$(\"#date-popover\").hide();
        var nav = \$(\"#\" + id).data(\"navigation\");
        var to = \$(\"#\" + id).data(\"to\");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
</body>

</html>", "layout.html.twig", "C:\\xampp\\htdocs\\pidev4\\app\\Resources\\views\\layout.html.twig");
    }
}

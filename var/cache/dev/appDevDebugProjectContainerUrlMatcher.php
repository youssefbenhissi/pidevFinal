<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/a')) {
            // admin_homepage
            if ('/admin' === $pathinfo) {
                return array (  '_controller' => 'adminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_homepage',);
            }

            if (0 === strpos($pathinfo, '/afficher')) {
                // afficher_per
                if ('/afficher' === $pathinfo) {
                    return array (  '_controller' => 'adminBundle\\Controller\\DashboardController::afficherAction',  '_route' => 'afficher_per',);
                }

                // afficher
                if ('/afficher' === $pathinfo) {
                    return array (  '_controller' => 'projetBundle\\Controller\\gestionController::afficherAction',  '_route' => 'afficher',);
                }

                // afficherEleve
                if ('/afficherEleve' === $pathinfo) {
                    return array (  '_controller' => 'projetBundle\\Controller\\eleveController::afficherEleveAction',  '_route' => 'afficherEleve',);
                }

                // afficherPersonnel
                if ('/afficherPersonnel' === $pathinfo) {
                    return array (  '_controller' => 'projetBundle\\Controller\\personnelController::afficherPersonnelAction',  '_route' => 'afficherPersonnel',);
                }

            }

            // ajouterE
            if ('/ajouterE' === $pathinfo) {
                return array (  '_controller' => 'adminBundle\\Controller\\DashboardController::ajouterEAction',  '_route' => 'ajouterE',);
            }

            // ajouterParents
            if ('/ajouterParents' === $pathinfo) {
                return array (  '_controller' => 'projetBundle\\Controller\\gestionController::ajouterParentsAction',  '_route' => 'ajouterParents',);
            }

        }

        elseif (0 === strpos($pathinfo, '/supprimerE')) {
            // supprimerE
            if (preg_match('#^/supprimerE/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimerE']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::supprimerEAction',));
            }

            // supprimerEleve
            if (0 === strpos($pathinfo, '/supprimerEleve') && preg_match('#^/supprimerEleve/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimerEleve']), array (  '_controller' => 'projetBundle\\Controller\\eleveController::supprimerEleveAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/supprimerP')) {
            // supprimerP
            if (preg_match('#^/supprimerP/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimerP']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::supprimerPAction',));
            }

            // supprimerPer
            if (0 === strpos($pathinfo, '/supprimerPer') && preg_match('#^/supprimerPer/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimerPer']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::supprimerPerAction',));
            }

            // supprimerParents
            if (0 === strpos($pathinfo, '/supprimerParents') && preg_match('#^/supprimerParents/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimerParents']), array (  '_controller' => 'projetBundle\\Controller\\gestionController::supprimerParentsAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/modifierE')) {
            // modifierE
            if (preg_match('#^/modifierE/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifierE']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::modifierEAction',));
            }

            // modifierEleve
            if (0 === strpos($pathinfo, '/modifierEleve') && preg_match('#^/modifierEleve/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifierEleve']), array (  '_controller' => 'projetBundle\\Controller\\eleveController::modifierEleveAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/modifierP')) {
            // modifierP
            if (preg_match('#^/modifierP/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifierP']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::modifierPAction',));
            }

            // modifierPer
            if (0 === strpos($pathinfo, '/modifierPer') && preg_match('#^/modifierPer/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifierPer']), array (  '_controller' => 'adminBundle\\Controller\\DashboardController::modifierPersonnelAction',));
            }

            // modifierParents
            if (0 === strpos($pathinfo, '/modifierParents') && preg_match('#^/modifierParents/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifierParents']), array (  '_controller' => 'projetBundle\\Controller\\gestionController::modifierParentsAction',));
            }

        }

        // projet_homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'projetBundle\\Controller\\DefaultController::indexAction',  '_route' => 'projet_homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_projet_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'projet_homepage'));
            }

            return $ret;
        }
        not_projet_homepage:

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

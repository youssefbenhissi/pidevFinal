<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new gererClubBundle\gererClubBundle(),
            new adminBundle\adminBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new UserBundle\UserBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new Mgilet\NotificationBundle\MgiletNotificationBundle(),
            new Egyg33k\CsvBundle\Egyg33kCsvBundle(),
            new EvenementBundle\EvenementBundle(),
            new BibliothequebackBundle\BibliothequebackBundle(),
            new Vresh\TwilioBundle\VreshTwilioBundle(),
            new projetBundle\projetBundle(),
            new Artgris\Bundle\FileManagerBundle\ArtgrisFileManagerBundle(),
            new Gestion_BlogBundle\Gestion_BlogBundle(),
            new BlogBundle\BlogBundle(),
            new Gestion_CoursBundle\Gestion_CoursBundle(),
            //new Nzo\FileDownloaderBundle\NzoFileDownloaderBundle(),
            new Cour_Bundle\Cour_Bundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new EtablissementBundle\EtablissementBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
            }
        }
        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->setParameter('container.autowiring.strict_mode', true);
            $container->setParameter('container.dumper.inline_class_loader', true);

            $container->addObjectResource($this);
        });
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
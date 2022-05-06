<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use phpDocumentor\Reflection\Types\Boolean;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    /**/
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('createdAt', 'Date de  création')
                ->hideOnIndex()
                ->setColumns(2),
            DateTimeField::new('updatedAt')
                ->onlyOnDetail()
                ->hideOnForm(),
            BooleanField::new('isPromo', 'En Promotion')
                ->setColumns(2),
            FormField::addPanel('Promotion', 'name'),
            FormField::addPanel('Identitée')->collapsible(),
            TextField::new('name', 'Nom du produit')
                ->setColumns(12),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->onlyOnForms()
                ->setColumns(12),
            ImageField::new('imageName', 'Image')
                ->setBasePath('images/produits')
                ->setUploadDir('public/images/produits')
                ->setRequired(false)
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setColumns(12),
            TextField::new('socGest', 'Société de gestion')
                ->setColumns(11),
            AssociationField::new('categorie', 'Catégorie')
                ->setColumns(11),
            TextField::new('capital', 'Captital')
                ->setColumns(11),
            TextField::new('thematique', 'Thématique')
                ->setColumns(11),
            NumberField::new('capitalisation', 'Capitalisation en Mds €')
                ->setColumns(11),
            IntegerField::new('nbAssoc', 'Nombre d\'associés')
                ->setColumns(11),
            FormField::addPanel('Informations')
                ->collapsible(),
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/new', '/bundles/EasyAdminBundle/custom/produit_new.html.twig')
            ->overrideTemplate('crud/edit', '/bundles/EasyAdminBundle/custom/produit_edit.html.twig')
            ->setDefaultSort(['id' => 'DESC'])
            ->showEntityActionsInlined()
            ->setPaginatorPageSize(10)
            ->renderContentMaximized();
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}

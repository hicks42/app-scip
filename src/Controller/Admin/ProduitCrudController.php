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
            DateTimeField::new('updatedAt')
            ->onlyOnDetail()
            ->hideOnForm(),
            FormField::addPanel('Identitée')->collapsible(),
            ImageField::new('imageName', 'Image')
            ->setBasePath('images/produits')
            ->setUploadDir('public/images/produits')
            ->setRequired(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setColumns(12),
            TextField::new('name', 'Nom du produit')
            ->setColumns(2),
            SlugField::new('slug')
            ->setTargetFieldName('name')
            ->onlyOnForms()
            ->setColumns(2),
            TextField::new('socGest', 'Société de gestion')
            ->setColumns(2),

            AssociationField::new('categorie', 'Catégorie')
            ->setColumns(2),

            TextField::new('capital', 'Captital')
            ->setColumns(2),
            TextField::new('thematique', 'Thématique')
            ->setColumns(2),
            DateField::new('createdAt')
            ->hideOnIndex()
            ->setColumns(2),
            NumberField::new('capitalisation', 'Capitalisation en Mds €')
            ->setColumns(2),
            IntegerField::new('nbAssoc', 'Nombre d\'associés')
            ->setColumns(2),
            FormField::addPanel('Informations')->collapsible(),
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->renderContentMaximized()
            ;
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}

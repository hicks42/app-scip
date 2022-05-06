<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actu::class;
    }

    /**/
    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('updatedAt')
                ->onlyOnDetail()
                ->hideOnForm(),
            FormField::addPanel('Publié', 'name'),
            BooleanField::new('isOnline', 'En ligne')
                ->setColumns(2),
            FormField::addPanel('Identitée')->collapsible(),
            TextField::new('title', 'Titre')
                ->setColumns(6),
            SlugField::new('slug')
                ->setTargetFieldName('title')
                ->onlyOnForms()
                ->setColumns(6),
            TextEditorField::new('content', 'Contenu')
                // ->setFormType(CKEditorType::class)
                ->setColumns(12),
        ];
    }
}

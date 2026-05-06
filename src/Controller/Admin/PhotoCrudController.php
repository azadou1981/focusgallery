<?php

namespace App\Controller\Admin;

use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Vich\UploaderBundle\Form\Type\VichImageType;
class PhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Photo::class;
    }

    
public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->hideOnForm(),

        TextField::new('title'),
        TextEditorField::new('description'),

        AssociationField::new('category'),

        Field::new('imageFile')
            ->setFormType(\Vich\UploaderBundle\Form\Type\VichImageType::class)
            ->onlyOnForms(),

        ImageField::new('imageName')
            ->setBasePath('/uploads/photos')
            ->onlyOnIndex(),
    ];
}
}
<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Form\CommentFormType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('author'),
            TextField::new('text'),
            TextField::new('email'),
            AssociationField::new('conference'),
            DateField::new('createdAt'),
            ImageField::new('photoFilename', 'Photo')->setBasePath('/uploads/photos')->onlyOnIndex(),
            ImageField::new('photoFilename', 'Photo')->setUploadDir('/public/uploads/photos')->onlyOnForms(),
        ];
    }
}

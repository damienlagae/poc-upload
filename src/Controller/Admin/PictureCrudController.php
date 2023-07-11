<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Picture;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PictureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Picture::class;
    }

    /**
     * @return iterable<FieldInterface>
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', '#')
                ->hideOnForm(),
            TextField::new('name', 'Name'),
            TextField::new('pictureFile', 'File')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('pictureName', 'Picture')
                ->setFormType(VichImageType::class)
                ->setBasePath('/uploads/pictures')
                ->hideOnForm(),
        ];
    }
}

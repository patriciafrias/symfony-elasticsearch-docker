<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class MilestoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('height', NumberType::class, [
                'required' => true,
            ])
            ->add('save', SubmitType::class
            );
    }
}

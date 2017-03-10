<?php

declare(strict_types=1);

namespace steevanb\SymfonyFormOptionsBuilder\Type;

use Doctrine\Common\Persistence\ObjectManager;
use steevanb\SymfonyFormOptionsBuilder\QueryBuilderLoader\EditableQueryBuilderConfigInterface;
use steevanb\SymfonyFormOptionsBuilder\QueryBuilderLoader\OrmEditableQueryBuilderLoader;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityEditableQueryBuilderType extends EntityType implements EditableQueryBuilderConfigInterface
{
    /** @var callable|null */
    protected $queryCallBack;

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefault('query_call_back', null)
            ->setAllowedTypes('query_call_back', ['callable', 'null']);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->queryCallBack = $options['query_call_back'];

        parent::buildForm($builder, $options);
    }

    public function getLoader(ObjectManager $manager, $queryBuilder, $class)
    {
        return new OrmEditableQueryBuilderLoader($queryBuilder, $this);
    }

    public function getQueryCallBack(): ?callable
    {
        return $this->queryCallBack;
    }
}

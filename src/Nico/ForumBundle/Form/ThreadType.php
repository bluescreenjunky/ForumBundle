<?
namespace Nico\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ThreadType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('title');
        $builder->add('firstpost', new PostType());
    }


    public function getDefaultOptions(array $options)
    {
        return array(
        'data_class' => 'Nico\ForumBundle\Entity\Thread',
        );
    }


    public function getName()
    {
        return 'thread';
    }
}
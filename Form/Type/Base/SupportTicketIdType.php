<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace SupportTicket\Form\Type\Base;

use Thelia\Core\Form\Type\Field\AbstractIdType;
use SupportTicket\Model\SupportTicketQuery;

/**
 * Class SupportTicket
 * @package SupportTicket\Form\Base
 * @author TheliaStudio
 */
class SupportTicketIdType extends AbstractIdType
{
    const TYPE_NAME = "support_ticket_id";

    protected function getQuery()
    {
        return new SupportTicketQuery();
    }

    public function getName()
    {
        return static::TYPE_NAME;
    }
}
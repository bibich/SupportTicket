<?php
/**
 * This class has been generated by TheliaStudio
 * For more information, see https://github.com/thelia-modules/TheliaStudio
 */

namespace SupportTicket\Controller;

use SupportTicket\Controller\Base\SupportTicketController as BaseSupportTicketController;
use SupportTicket\Event\SupportTicketEvent;
use SupportTicket\Model\SupportTicket;

/**
 * Class SupportTicketController
 * @package SupportTicket\Controller
 */
class SupportTicketController extends BaseSupportTicketController
{
    protected function getUpdateEvent($formData)
    {
        $event = new SupportTicketEvent();

        $event->setId($formData["id"]);
        $event->setAdminId($formData["admin_id"]);
        $event->setSubject($formData["subject"]);
        $event->setMessage($formData["message"]);
        $event->setResponse($formData["response"]);
        $event->setComment($formData["comment"]);

        $event->setStatus(SupportTicket::STATUS_REPLIED);
        $event->setRepliedAt(new \DateTime('now'));

        return $event;
    }
}

<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace SupportTicket\Loop\Base;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Type\BooleanOrBothType;
use SupportTicket\Model\SupportTicketQuery;

/**
 * Class SupportTicket
 * @package SupportTicket\Loop\Base
 * @author TheliaStudio
 */
class SupportTicket extends BaseLoop implements PropelSearchLoopInterface
{

    /**
     * @param LoopResult $loopResult
     *
     * @return LoopResult
     */
    public function parseResults(LoopResult $loopResult)
    {
        /** @var \SupportTicket\Model\SupportTicket $entry */
        foreach ($loopResult->getResultDataCollection() as $entry) {
            $row = new LoopResultRow($entry);

            $row
                ->set("ID", $entry->getId())
                ->set("STATUS", $entry->getStatus())
                ->set("CUSTOMER_ID", $entry->getCustomerId())
                ->set("ADMIN_ID", $entry->getAdminId())
                ->set("ORDER_ID", $entry->getOrderId())
                ->set("ORDER_PRODUCT_ID", $entry->getOrderProductId())
                ->set("SUBJECT", $entry->getSubject())
                ->set("MESSAGE", $entry->getMessage())
                ->set("RESPONSE", $entry->getResponse())
                ->set("COMMENT", $entry->getComment())
            ;

            $this->addMoreResults($row, $entry);

            $loopResult->addRow($row);
        }

        return $loopResult;
    }

    /**
     * Definition of loop arguments
     *
     * example :
     *
     * public function getArgDefinitions()
     * {
     *  return new ArgumentCollection(
     *
     *       Argument::createIntListTypeArgument('id'),
     *           new Argument(
     *           'ref',
     *           new TypeCollection(
     *               new Type\AlphaNumStringListType()
     *           )
     *       ),
     *       Argument::createIntListTypeArgument('category'),
     *       Argument::createBooleanTypeArgument('new'),
     *       ...
     *   );
     * }
     *
     * @return \Thelia\Core\Template\Loop\Argument\ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument("id"),
            Argument::createBooleanOrBothTypeArgument("status", BooleanOrBothType::ANY),
            Argument::createIntListTypeArgument("customer_id"),
            Argument::createIntListTypeArgument("admin_id"),
            Argument::createIntListTypeArgument("order_id"),
            Argument::createIntListTypeArgument("order_product_id"),
            Argument::createAnyTypeArgument("subject"),
            Argument::createEnumListTypeArgument(
                "order",
                [
                    "id",
                    "id-reverse",
                    "status",
                    "status-reverse",
                    "customer_id",
                    "customer_id-reverse",
                    "admin_id",
                    "admin_id-reverse",
                    "order_id",
                    "order_id-reverse",
                    "order_product_id",
                    "order_product_id-reverse",
                    "subject",
                    "subject-reverse",
                    "message",
                    "message-reverse",
                    "response",
                    "response-reverse",
                    "comment",
                    "comment-reverse",
                ],
                "id"
            )
        );
    }

    /**
     * this method returns a Propel ModelCriteria
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function buildModelCriteria()
    {
        $query = new SupportTicketQuery();

        if (null !== $id = $this->getId()) {
            $query->filterById($id);
        }

        if (BooleanOrBothType::ANY !== $status = $this->getStatus()) {
            $query->filterByStatus($status);
        }

        if (null !== $customer_id = $this->getCustomerId()) {
            $query->filterByCustomerId($customer_id);
        }

        if (null !== $admin_id = $this->getAdminId()) {
            $query->filterByAdminId($admin_id);
        }

        if (null !== $order_id = $this->getOrderId()) {
            $query->filterByOrderId($order_id);
        }

        if (null !== $order_product_id = $this->getOrderProductId()) {
            $query->filterByOrderProductId($order_product_id);
        }

        if (null !== $subject = $this->getSubject()) {
            $subject = array_map("trim", explode(",", $subject));
            $query->filterBySubject($subject);
        }

        foreach ($this->getOrder() as $order) {
            switch ($order) {
                case "id":
                    $query->orderById();
                    break;
                case "id-reverse":
                    $query->orderById(Criteria::DESC);
                    break;
                case "status":
                    $query->orderByStatus();
                    break;
                case "status-reverse":
                    $query->orderByStatus(Criteria::DESC);
                    break;
                case "customer_id":
                    $query->orderByCustomerId();
                    break;
                case "customer_id-reverse":
                    $query->orderByCustomerId(Criteria::DESC);
                    break;
                case "admin_id":
                    $query->orderByAdminId();
                    break;
                case "admin_id-reverse":
                    $query->orderByAdminId(Criteria::DESC);
                    break;
                case "order_id":
                    $query->orderByOrderId();
                    break;
                case "order_id-reverse":
                    $query->orderByOrderId(Criteria::DESC);
                    break;
                case "order_product_id":
                    $query->orderByOrderProductId();
                    break;
                case "order_product_id-reverse":
                    $query->orderByOrderProductId(Criteria::DESC);
                    break;
                case "subject":
                    $query->orderBySubject();
                    break;
                case "subject-reverse":
                    $query->orderBySubject(Criteria::DESC);
                    break;
                case "message":
                    $query->orderByMessage();
                    break;
                case "message-reverse":
                    $query->orderByMessage(Criteria::DESC);
                    break;
                case "response":
                    $query->orderByResponse();
                    break;
                case "response-reverse":
                    $query->orderByResponse(Criteria::DESC);
                    break;
                case "comment":
                    $query->orderByComment();
                    break;
                case "comment-reverse":
                    $query->orderByComment(Criteria::DESC);
                    break;
            }
        }

        return $query;
    }

    protected function addMoreResults(LoopResultRow $row, $entryObject)
    {
    }
}

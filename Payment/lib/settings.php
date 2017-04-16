<?php
use Df\Payment\Method as M;
use Df\Payment\Settings as S;
use Magento\Payment\Model\InfoInterface as II;
use Magento\Quote\Model\Quote as Q;
use Magento\Quote\Model\Quote\Payment as QP;
use Magento\Sales\Model\Order as O;
use Magento\Sales\Model\Order\Payment as OP;
use Magento\Sales\Model\Order\Payment\Transaction as T;
/**              
 * 2017-03-27       
 * @used-by dfpex_from_doc()
 * @used-by \Df\Payment\Action::s()
 * @used-by \Df\Payment\Source\Testable::ss()
 * @used-by \Df\Payment\TestCase::s()
 * @used-by \Df\PaypalClone\Signer::s()
 * @used-by \Df\PaypalClone\Source\Identification::id()
 * @used-by \Dfe\AllPay\Total\Quote::collect()
 * @used-by \Dfe\CheckoutCom\Response::__construct()
 * @used-by \Dfe\CheckoutCom\Response::getCaptureCharge()
 * @used-by \Dfe\CheckoutCom\Handler\Charge::ss()
 * @used-by \Dfe\CheckoutCom\Handler\CustomerReturn::p()
 * @used-by \Dfe\Klarna\Api\Checkout::html()
 * @used-by \Dfe\Omise\T\TestCase
 * @used-by \Dfe\TwoCheckout\Handler::p()
 * @param M|II|OP|QP|O|Q|T|object|string|null $m
 * @param string|null $k [optional]
 * @return S|mixed
 */
function dfps($m, $k = null) {return dfpm($m)->s($k);}
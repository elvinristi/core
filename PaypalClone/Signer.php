<?php
namespace Df\PaypalClone;
use Df\Payment\IMA;
/**
 * 2016-07-10
 * @see \Dfe\AllPay\Signer
 * @see \Dfe\SecurePay\Signer
 */
abstract class Signer {
	/**
	 * 2016-07-10
	 * @used-by _sign()
	 * @see \Dfe\AllPay\Signer::sign()
	 * @see \Dfe\SecurePay\Signer::sign()
	 * @return string
	 */
	abstract protected function sign();

	/**
	 * 2017-03-13            
	 * @used-by \Dfe\AllPay\Signer::sign()         
	 * @used-by \Dfe\SecurePay\Signer\Request::values()
	 * @used-by \Dfe\SecurePay\Signer\Response::values()
	 * @param string|null $k [optional]
	 * @param mixed|null $d [optional]
	 * @return array(string => mixed)|mixed|null
	 */
	final protected function v($k = null, $d = null) {return dfak($this->_v, $k, $d);}

	/**
	 * 2017-03-13   
	 * @used-by _sign()
	 * @used-by v()
	 * @var array(string => mixed)
	 */
	private $_v;

	/**
	 * 2016-08-27
	 * @used-by \Df\PaypalClone\Charge::p()
	 * @param IMA $caller
	 * @param array(string => mixed) $p
	 * @return string
	 */
	final static function signRequest(IMA $caller, array $p) {return self::_sign($caller, $p);}

	/**
	 * 2016-08-27
	 * @used-by \Df\PaypalClone\W\Handler::validate()
	 * @param IMA $caller
	 * @param array(string => mixed) $p
	 * @return string
	 */
	final static function signResponse(IMA $caller, array $p) {return self::_sign($caller, $p);}

	/**
	 * 2016-08-27
	 * @used-by signRequest()
	 * @used-by signResponse()
	 * @param IMA $caller
	 * @param array(string => mixed) $v
	 * @return string
	 */
	private static function _sign(IMA $caller, array $v) {
		/** @var self $i */
		$i = df_new(df_con_hier_suf_ta($caller->m(), 'Signer', df_trim_text_left(df_caller_f(), 'sign')));
		$i->_v = $v;
		return $i->sign();
	}
}
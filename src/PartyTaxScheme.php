<?php
/**
 * Created by PhpStorm.
 * User: baselbers
 * Date: 26-10-2017
 * Time: 20:28
 */

namespace CleverIt\UBL\Invoice;


use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class PartyTaxScheme implements XmlSerializable {
    private $companyId;
    private $exemptionReason;
    private $taxScheme;

    /**
     * @return mixed
     */
    public function getCompanyId() {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     * @return PartyTaxScheme
     */
    public function setCompanyId($companyId) {
        $this->companyId = $companyId;
        return $this;
    }

	/**
	 * @return mixed
	 */
    public function getExemptionReason() {
    	return $this->exemptionReason;
    }

	/**
	 * @param $exemptionReason
	 */
	public function setExemptionReason($exemptionReason) {
		$this->exemptionReason = $exemptionReason;
		return $this;
	}

	public function getTaxScheme() {
    	return $this->taxScheme;
	}

	public function setTaxScheme($taxScheme) {
    	$this->taxScheme = $taxScheme;
    	return $this;
	}

    function xmlSerialize(Writer $writer) {
        $writer->write([
            Schema::CBC.'CompanyID' => $this->companyId,
            Schema::CBC.'ExemptionReason' => $this->exemptionReason,
	        Schema::CAC.'TaxScheme' => $this->taxScheme
        ]);
    }
}
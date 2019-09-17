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

class OrderReference implements XmlSerializable {
	private $id;
	private $salesOrderID;
	private $issueDate;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return string
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSalesOrderID() {
		return $this->salesOrderID;
	}

	/**
	 * @param mixed $salesOrderID
	 *
	 * @return string
	 */
	public function setSalesOrderID( $salesOrderID ) {
		$this->salesOrderID = $salesOrderID;

		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getIssueDate() {
		return $this->issueDate;
	}

	/**
	 * @param \DateTime $issueDate
	 *
	 * @return Invoice
	 */
	public function setIssueDate( $issueDate ) {
		$this->issueDate = $issueDate;

		return $this;
	}

	function xmlSerialize( Writer $writer ) {
		$writer->write( [
			Schema::CBC . 'ID'           => $this->id,
			Schema::CBC . 'SalesOrderID' => $this->salesOrderID,
			Schema::CBC . 'IssueDate'    => $this->issueDate->format( 'Y-m-d' ),
		] );
	}
}
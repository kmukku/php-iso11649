<?php

namespace kmukku\phpIso11649\Test;

use kmukku\phpIso11649\phpIso11649;

class ValidateRfReferenceTest extends TestCase
{
	/**
	* Test successful validation of the ISO 11649 reference
	* 
	*/
	public function test_validate_reference_success()
	{
		// reference validator
		$validator = new phpIso11649;

		// eg: input 'RF18539007547034' should give true
		$isValid = $validator->validateRfReference('RF18539007547034');
		$this->assertTrue($isValid);
	}

	/**
	* Test failed validation of the ISO 11649 reference
	* 
	*/
	public function test_validate_reference_failed()
	{
		// reference validator
		$validator = new phpIso11649;

		// eg: input 'RF19539007547034' should give false
		$isValid = $validator->validateRfReference('RF19539007547034');
		$this->assertFalse($isValid);
	}
}
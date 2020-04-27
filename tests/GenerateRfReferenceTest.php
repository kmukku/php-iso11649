<?php

namespace kmukku\phpIso11649\Test;

use kmukku\phpIso11649\phpIso11649;

class GenerateRfReferenceTest extends TestCase
{
	/**
	 * Test successful generation of the ISO 11649 reference
	 * 
	 */
	public function test_generate_reference_chunked()
	{
		// reference generator
		$generator = new phpIso11649;

		// eg: input '5390 0754 7034' should give 'RF18 5390 0754 7034'
		$reference = $generator->generateRfReference('5390 0754 7034', true);
		$this->assertEquals('RF18 5390 0754 7034', $reference);

		// eg: input 'RF18000000000539007547034' should give 'RF18 0000 0000 0539 0075 4703 4'
		$reference = $generator->generateRfReference('000000000539007547034', true);
		$this->assertEquals('RF18 0000 0000 0539 0075 4703 4', $reference);
	}
	
	/**
	 * Test successful generation of the ISO 11649 reference without chunks
	 * 
	 */
	public function test_generate_reference()
	{
		// reference generator
		$generator = new phpIso11649;

		// eg: input '5390 0754 7034' should give 'RF18539007547034'
		$reference = $generator->generateRfReference('5390 0754 7034', false);
		$this->assertEquals('RF18539007547034', $reference);

		// eg: input 'RF18000000000539007547034' should give 'RF18000000000539007547034'
		$reference = $generator->generateRfReference('000000000539007547034', false);
		$this->assertEquals('RF18000000000539007547034', $reference);
	}
}
<?php 

namespace kmukku\phpIso11649;

class phpIso11649 { 

	var $charTable = array(
		"A" => 10, 
		"B" => 11, 
		"C" => 12, 
		"D" => 13, 
		"E" => 14, 
		"F" => 15, 
		"G" => 16, 
		"H" => 17, 
		"I" => 18, 
		"J" => 19, 
		"K" => 20, 
		"L" => 21, 
		"M" => 22, 
		"N" => 23, 
		"O" => 24, 
		"P" => 25, 
		"Q" => 26, 
		"R" => 27, 
		"S" => 28, 
		"T" => 29, 
		"U" => 30, 
		"V" => 31, 
		"W" => 32, 
		"X" => 33, 
		"Y" => 34, 
		"Z" => 35
		);

	private function normalizeRef($ref) {
		return strtoupper(preg_replace('/\s+/','', $ref));
	}

	private function replaceChars($string) {
		return str_replace(array_keys($this->charTable), array_values($this->charTable), $string);
	}

	public function calculateRfChecksum($ref) {
		$preResult = $ref."RF00"; // add 'RF00' to the end of ref
		$preResult = $this->replaceChars($preResult); // Replace characters
		$checksum = 98 - ((int)$preResult % 97); // Calculate checksum
		$checksum = sprintf("%02d", $checksum); // pad to 2 digits if under 10
		return $checksum;
	}

	public function generateRfReference($ref, $chunksplit = true) {
		$normalizedRef = $this->normalizeRef($ref);
		$checksum = $this->calculateRFChecksum($normalizedRef);
		$rfReference = "RF".$checksum.$normalizedRef;
		return ($chunksplit) ? chunk_split($rfReference,4,' ') : $rfReference;
	}

}
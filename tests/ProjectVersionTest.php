<?php

use CJAN\Models\ProjectVersion;

class ProjectVersionTest extends TestCase {

	public function testIsSnapshot()
	{
		$snapshots = array(
			'1.0-SNAPSHOT',
			'SNAPSHOT',
			'SNAPSHOT-1.0',
			'2-snapshot',
			'-snapshot',
			'1000000x-xxx0.001-RC2-SNAPSHOT',
			'V1.00-SNAPSHOT'
		);

		$notSnapshots = array(
			'1.0',
			'2.3-RC3',
			'V1.33-2',
			NULL,
			"",
			FALSE,
			" "
		);

		foreach ($snapshots as $snapshot)
		{
			$this->assertTrue(ProjectVersion::isSnapshot($snapshot), sprintf("Failed to detect snapshot for %s", $snapshot));
		}

		foreach ($notSnapshots as $notSnapshot)
		{
			$this->assertFalse(ProjectVersion::isSnapshot($notSnapshot), sprintf("Incorrectly detected snapshot for %s", $notSnapshot));
		}
	}

}

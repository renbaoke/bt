<?php
class File {
	public function index($path) {
		$scans = scandir ( $path );
		$files = array ();
		foreach ( $scans as $key => $scan )
			if ("." == $scan or ".." == $scan)
				continue;
			else {
				$files [$key] ["name"] = $scan;
				$files [$key] ["ctime"] = filectime ( $path . $scan );
				$files [$key] ["size"] = filesize ( $path . $scan );
				$files [$key] ["is_dir"] = is_dir ( $path . $scan );
			}
		return $files;
	}
	public function mkdir($path, $name) {
		if (file_exists ( $path . $name ))
			return false;
		else
			return mkdir ( $path . $name );
	}
	public function rmdir($path, $drop) {
		$scans = scandir ( $path );
		if (! $drop)
			foreach ( $scans as $scan )
				if ("." == $scan or ".." == $scan)
					continue;
				else
					rename ( $path . $scan, $path . "../" . $scan );
		else
			foreach ( $scans as $scan )
				if ("." == $scan or ".." == $scan)
					continue;
				else if (is_dir ( $path . $scan ))
					$this->rmdir ( $path . $scan . "/", true );
				else
					unlink ( $path . $scan );
		rmdir ( $path );
	}
}

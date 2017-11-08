<?php
namespace Sellastica\Utils;

class MemoryCalculator
{
	/** @var int */
	private static $memoryPeak = 0;


	public static function log()
	{
		self::$memoryPeak = memory_get_usage();
	}

	/**
	 * @param bool $die
	 * @return void
	 */
	public static function dump($die = true)
	{
		f(self::getSize(($peak = memory_get_usage()) - self::$memoryPeak), 'Memory usage');
		self::$memoryPeak = $peak;
		if ($die) {
			die();
		}
	}

	/**
	 * @param int $size
	 * @return string
	 */
	private static function getSize(int $size): string
	{
		return round($size / 1024, 1) . ' kB (' . $size . ' B)';
	}
}
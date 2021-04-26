<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\SlugLevel;

class SlugLevelTest extends TestCase
{
    /**
     * @param int $remainingCount
     * @param string $expectedSlug
     * @dataProvider dataSlug
     */
    public function testSlug(int $remainingCount, string $expectedSlug)
    {
        $level = new SlugLevel($remainingCount);
        $this->assertSame($expectedSlug, $level->slug());
    }

    public function dataSlug()
    {
        return [
            "空きなし" => [
                "remainingCount" => 0,
                "expectedSlug" => '✕',
            ],
            "残りわずか" => [
                "remainingCount" => 4,
                "expectedSlug" => '△',
            ],
            "空き十分" => [
                "remainingCount" => 5,
                "expectedSlug" => '◎',
            ],
        ];
    }
}

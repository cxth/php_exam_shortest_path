<?php declare(strict_types=1);

require('shortest_path.php');

use PHPUnit\Framework\TestCase;
//use function shortestPath;

final class ShortestPathTest extends TestCase
{
    public function testIsShortestPathA(): void
    {
        $myArr = ["4","A","B","C","D","A-B","B-D","B-C","D"];
        $this->assertEquals(shortestPath($myArr),'A-B-D');
    }

    public function testIsShortestPathB(): void
    {
        $myArr = ["7","A","B","C","D","E","F","G","A-B","A-E","B-C","C-D","D-F","E-D","F-G"];
        $this->assertEquals(shortestPath($myArr),'A-E-D-F-G');
    }

    public function testIsShortestPathC(): void
    {
        $myArr = ["5","A","B","C","D","F","A-B","A-C","B-C","C-D","D-F"];
        $this->assertEquals(shortestPath($myArr),'A-C-D-F');
    }

    public function testIsShortestPathD(): void
    {
        $myArr = ["5","A","W","X","Y","Z","A-W","W-X","W-Y","X-Y","Y-Z","X-Z"];
        $this->assertEquals(shortestPath($myArr),'A-W-Y-Z');
    }
}
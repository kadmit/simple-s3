<?php

use SimpleS3\Helpers\File;

class FileTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function test_load_file()
    {
        $url = 'https://jsonplaceholder.typicode.com/photos';
        $content = json_decode(File::loadFile($url));

        $this->assertTrue(is_array($content));
        $this->assertCount(5000, $content);
    }

    /**
     * @test
     */
    public function get_file_info()
    {
        $path = '/usr/path/to/file.txt';

        $this->assertEquals(File::getPathInfo($path)['dirname'], '/usr/path/to');
        $this->assertEquals(File::getPathInfo($path)['basename'], 'file.txt');
        $this->assertEquals(File::getPathInfo($path)['extension'], 'txt');
        $this->assertEquals(File::getPathInfo($path)['filename'], 'file');
    }

    /**
     * @test
     */
    public function convert_to_hex_and_back()
    {
        $origs = [
            '[en-GB][2] hello world',
            '仿宋人笔意.txt',
        ];

        foreach ($origs as $orig){
            $converted = File::strToHex($orig);
            $original = File::hexToStr($converted);

            $this->assertEquals($original, $orig);
        }
    }
}

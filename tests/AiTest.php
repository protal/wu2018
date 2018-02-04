<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Female(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Unknown(): void
    {
        $result = AI::getGender('สวัสดีโว้ย');
        $expected_result = 'Unknown';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Positive():void
    {
        $result=AI::getSentiment('วันนี้ได้ไปเที่ยวดีใจจัง');
        $expected_result='Positive';
        $this->assertEquals($expected_result,$result);
    }
    public function testSentiment_Negative():void
    {
        $result=AI::getSentiment('มาอบรมวันนี้เหนื่อยมาก');
        $expected_result='Negative';
        $this->assertEquals($expected_result,$result);
    }
    public function testRudeWords_hear():void
    {
        $result=AI::getRudeWords('ไอสัสเอ้ยเหี้ยไรมึงเนี้ยะ');
        $expected_result='เหี้ย';
        $this->assertContains($expected_result,$result);
    }
    public function testRudeWords_kuyy():void
    {
        $result=AI::getRudeWords('ไอเปรตฟัคยูควย');
        $expected_result='ควย';
        $this->assertContains($expected_result,$result);
    }
    public function testLanguages_TH():void
    {
        $result=AI::getLanguages('กขคงจ');
        $expected_result='TH';
        $this->assertContains($expected_result,$result);
    }
    public function testLanguages_EN():void
    {
        $result=AI::getLanguages('ABCDEFGH');
        $expected_result='EN';
        $this->assertContains($expected_result,$result);
    }
    public function testLanguages_ENg():void
    {
        $result=AI::getLanguages('cat');
        $expected_result='EN';
        $this->assertContains($expected_result,$result);
    }
    public function testRudeWords_rudeeeeeeee():void
    {
        $result=AI::getRudeWords('ไอแม่เย็ด หัวควย มึงถอดชุดมาเดี่ยวกับกูอะป่าว ไอ้สาสส');
        $expected_result='หน้าหี';
        $this->assertContains($expected_result,$result);
    }


}

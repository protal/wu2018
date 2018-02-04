<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    private function findWithArray($word,$array,$return)
    {

       for($i = 0 ; $i < sizeof($array) ; $i++)
       {
            if(strpos($word, $array[$i]) !== false )
                return $return;
       }
       return NULL;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $genders = [
            'Male' => ["ครับ","ผม","กระผม"],
            'Female' => ["ค่ะ","หนู"],
        ];
        foreach($genders as $k => $v)
        {
            $result = self::findWithArray($text,$v,$k);
            if(isset($result))
                return $result;
        }

        return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $genders = [
            'Positive' => ["ดีใจจัง","ดีมาก","อารมณ์ดี"],
            'Negative' => ["เหนื่อย","ท้อ","อยากตาย"],
        ];
        foreach($genders as $k => $v)
        {
            $result = self::findWithArray($text,$v,$k);
            if(isset($result))
                return $result;
        }

        return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $result = [];
        $rude = ["สัส","เอ้ย","ควย","เหี้ย","kuy","หน้าหี"];
        for($i = 0 ; $i < sizeof($rude) ; $i++)
        {
            if(strpos($text, $rude[$i]) !== false )
                array_push($result,$rude[$i]);
        }

        return $result;
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $result = [];
        $re = '/[ก-๛]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }
        $re = '/[a-zA-Z]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'EN');
        }
        return $result;
    }
}
